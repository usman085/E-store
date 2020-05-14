<template>
  <div class="nav-bar-wrapper">
    <v-app-bar color="deep-purple accent-4" dense dark>
      <v-toolbar-title id="title">Rana Brothers</v-toolbar-title>
      
      <v-spacer></v-spacer>
    
      <v-btn icon v-if="$route.path == '/dash-borad'"  @click="searchToggle()">
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
            <v-list-item-title><router-link to="/productMange" class="links">Mange Products</router-link></v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
    <div id="search-bar">
         <v-app-bar color="deep-purple accent-4" dense dark flat>
      <v-text-field placeholder="Enter Product Name" v-model="searchfield" @keydown="searchData()"></v-text-field>
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
          searchfield:'',
            iconName:true
        }
    },
     methods:{
         searchToggle:function(){
              $('#search-bar').toggle();
              this.iconName = !this.iconName;
         },
         searchData:function(){
               if(this.searchfield.length > 1 ){
                 EventBus.$emit('searchTrigger',this.searchfield);
               }
         }
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