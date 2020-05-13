<template>
  <div class="nav-bar-wrapper">
    <v-app-bar color="deep-purple accent-4" dense dark>
      <v-toolbar-title id="title">Rana Brothers</v-toolbar-title>
      
      <v-spacer></v-spacer>
    
      <v-btn icon  @click="searchToggle()">
        <v-icon v-if="iconName">mdi-magnify</v-icon>
        <v-icon v-else icon>mdi-close</v-icon>
      </v-btn>
     <v-btn icon style="display:none" @click="barcodeToggle()">
        <v-icon icon> mdi-barcode</v-icon>
      </v-btn>
      
      <v-menu left bottom>
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>

        <v-list>
          <!-- <v-list-item>
            <v-list-item-title><router-link to="/Dashborad" class="links">Go To shop</router-link></v-list-item-title>
          </v-list-item> -->
          <v-list-item>
            <v-list-item-title><router-link to="/dash-borad" class="links">Home</router-link></v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title><router-link to="/addProduct" class="links">Add Products</router-link></v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title><router-link to="/MangeProduct" class="links">Mange Products</router-link></v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
    <div id="search-bar">
         <v-app-bar color="deep-purple accent-4" dense dark flat>
        <v-autocomplete 
        v-model="model"
        :items="items"
        :loading="isLoading"
        :search-input.sync="search"
        color="white"
        hide-no-data
        hide-selected
        item-text="Description"
        item-value="API"
       
        placeholder="Product Name e.g (Liptan)"
        prepend-icon="mdi-magnify"
        return-object
      ></v-autocomplete>
       </v-app-bar>
      </div>
       
  </div>
</template>

<script>
import EventBus from '../../EventBus';
export default {
  name: "HeaderComponent",
     mounted(){
         $('#search-bar').hide();
     },
    data:function(){
        return{
      descriptionLimit: 60,
      entries: [],
      isLoading: false,
      model: null,
      search: null,
      iconName:true
        }
    },
     methods:{
         searchToggle:function(){
              $('#search-bar').toggle();
              this.iconName = !this.iconName;
         },
         barcodeToggle:function(){ 
            EventBus.$emit('barcode');
         }
     },
    computed: {
      fields () {
        if (!this.model) return []

        return Object.keys(this.model).map(key => {
          return {
            key,
            value: this.model[key] || 'n/a',
          }
        })
      },
      items () {
        return this.entries.map(entry => {
          const Description = entry.Description.length > this.descriptionLimit
            ? entry.Description.slice(0, this.descriptionLimit) + '...'
            : entry.Description

          return Object.assign({}, entry, { Description })
        })
      },
    },

    watch: {
      search (val) {
        // Items have already been loaded
        if (this.items.length > 0) return

        // Items have already been requested
        if (this.isLoading) return

        this.isLoading = true

        // Lazily load input items
        fetch('https://api.publicapis.org/entries')
          .then(res => res.json())
          .then(res => {
            const { count, entries } = res
            this.count = count
            this.entries = entries
          })
          .catch(err => {
            console.log(err)
          })
          .finally(() => (this.isLoading = false))
      },
    },
  
};
</script>

<style scoped>
.nav-bar-wrapper{
    position: relative;
}
.links{
  display: block;
  text-decoration: none;
  color: black;
  width: 100%;
}

</style>