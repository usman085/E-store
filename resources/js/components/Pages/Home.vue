<template>
  <div class="Home-wrapper">
    <div class="page-loader" v-if="loading">
      <v-sheet :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="px-3 pt-3 pb-3">
        <v-list-item two-line v-for="n of 7" :key="n" class="items-list">
          <v-list-item-content>
            <v-list-item-title>
              <v-skeleton-loader max-width="150" type="card" height="18px"></v-skeleton-loader>
            </v-list-item-title>
            <v-list-item-subtitle>
              <v-skeleton-loader max-width="300" type="card" height="16px"></v-skeleton-loader>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-sheet>
    </div>
    <!--page-loader-->
    <div class="content-wrapper" v-else>
      <v-sheet :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="px-3 pt-3 pb-3">
        <v-list-item two-line v-for="(item,index) in items" :key="index" class="items-list">
          <!--  -->
      <v-expansion-panels>
         <h3>{{ item.pro_name | capitalize }}</h3>

      <v-expansion-panel>
          <v-expansion-panel-header>Sale Price</v-expansion-panel-header>
          <v-expansion-panel-content>
               <p>
                    <span class="rate rate-left" v-if="item.pro_type">Sale Rate: Rs {{ item.pro_retail_price_per_piece }}</span>
                    <span class="rate rate-left" v-else>Sale Rate: Rs {{ item.pro_retail_price_per_kg }}</span>
               </p>
               <p>
                    <span class="rate rate-right" v-if="item.pro_type">Carton Rate ({{ item.pro_total_piece_in_carton }}p): Rs {{ item.pro_retail_price_carton }}</span>
                    <span class="rate rate-right"  v-else>Bag Rate ({{ item.pro_total_weight_in_bag }}KG): Rs {{ item.pro_retail_price_bag }}</span>
              </p>
          </v-expansion-panel-content>
      </v-expansion-panel>

      <v-expansion-panel>
          <v-expansion-panel-header>Whole Sale Price</v-expansion-panel-header>
          <v-expansion-panel-content>
            <p>
                   <span class="rate rate-left" v-if="item.pro_type">Sale Rate: Rs {{ item.pro_whole_sale_price_per_piece }}</span>
                   <span class="rate rate-left" v-else>Sale Rate: Rs {{ item.pro_whole_sale_price_per_kg }}</span>
            </p>
            <p>
                   <span class="rate rate-right" v-if="item.pro_type">Carton Rate ({{ item.pro_total_piece_in_carton }}p): Rs {{ item.pro_whole_sale_price_carton }}</span>
                  <span class="rate rate-right"  v-else>Bag Rate ({{ item.pro_total_weight_in_bag }}KG): Rs {{ item.pro_whole_sale_price_bag }}</span>
            </p>
          </v-expansion-panel-content>
      </v-expansion-panel>

      <v-expansion-panel>
          <v-expansion-panel-header>Purchase Price</v-expansion-panel-header>
          <v-expansion-panel-content>
              <p>
                   <span class="rate rate-right" v-if="item.pro_type">Sale Rate : Rs {{ item.pro_purchase_price_per_piece }}</span>
                   <span class="rate rate-right"  v-else>Sale Rate : Rs {{ item.pro_purchase_price_per_kg }}</span>
              </p>
              <p>
                  <span class="rate rate-right" v-if="item.pro_type">Carton Rate ({{ item.pro_total_piece_in_carton }}p): Rs {{ item.pro_purchase_price_carton }}</span>
                  <span class="rate rate-right"  v-else>Bag Rate ({{ item.pro_total_weight_in_bag }}KG): Rs {{ item.pro_purchase_price_bag }}</span>
              </p>
         </v-expansion-panel-content>
      </v-expansion-panel>
      



<!-- panel content -->

    
  </v-expansion-panels>


</v-list-item>
          <!--  -->
          
      </v-sheet>
    </div>
    <!--content-wrapper-->
  </div>
  <!--home-wrapper-->
</template>

<script>
import EventBus from "../../EventBus";
export default {
  name: "Home",
  mounted() { 
   
    axios.get('http://localhost:8000/api/random-product').then((data)=>{
      this.items=data.data;
      this.loading = false;
         console.log(data);
    }).catch(()=>console.log('Error In serve'));
    EventBus.$on('searchRefresh',(searchRefresh)=>{
        if(searchRefresh !=' ' && searchRefresh.length > 2 ){
          axios.get('http://localhost:8000/api/search-product/'+searchRefresh).then((data)=>{
          this.items=data.data;
          this.loading = false;
         console.log(data);
    }).catch(()=>console.log('Error In serve'));
        }else{

           axios.get('http://localhost:8000/api/random-product').then((data)=>{
      this.items=data.data;
      this.loading = false;
         console.log(data);
    }).catch(()=>console.log('Error In serve'));

        }

    });
    EventBus.$on('searchTrigger',(searchQuery)=>{
      this.loading=true;
      axios.get('http://localhost:8000/api/search-product/'+searchQuery).then((data)=>{
      this.items=data.data;
      this.loading = false;
         console.log(data);
    }).catch(()=>console.log('Error In serve'));
    });
  },
  data: function() {
    return {
      items:[],
      loading: true
    };
  },
  inject: ["theme"]
};
</script>

<style scoped>

.rate-right {
  text-align: right;
}
.rate-left {
  text-align: left;
}
.v-expansion-panel-header{
  font-weight: bold;
}

h4 {
  padding-bottom: 8px;
  font-size: 0.9rem;
  text-align: center;
  text-decoration: underline;
  color: #1e1e1e;
}
p{
  font-size: 14px;
}
h3{
  width: 100%;
  background: white;
  margin-top: 10px;
  padding: 5px;
  border-bottom: 1px dotted #ccc7c7;
}
.items-list{
  padding: 0;
}

</style>