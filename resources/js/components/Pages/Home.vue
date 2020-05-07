<template>
<div class="Home-wrapper">
     <Barcode v-if="Barcode" />
    <div class="page-loader" v-if="loading">

      <v-sheet  :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="px-3 pt-3 pb-3">
    <v-list-item two-line v-for="n of 7" :key="n" class="items-list">
       
      <v-list-item-content>
        <v-list-item-title>
             <v-skeleton-loader   max-width="150" type="card" height="18px" ></v-skeleton-loader>
        </v-list-item-title>
        <v-list-item-subtitle>
          <v-skeleton-loader   max-width="300" type="card" height="16px" ></v-skeleton-loader>   
        </v-list-item-subtitle>
      
      </v-list-item-content>
    </v-list-item>
       
        
      </v-sheet>

    </div><!--page-loader-->
    <div class="content-wrapper" v-else>
   <v-sheet  :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="px-3 pt-3 pb-3">
     <v-list-item two-line v-for="n of 7" :key="n" class="items-list">
          
      <v-list-item-content>
        <v-list-item-title>Three-line item</v-list-item-title>
        <v-list-item-subtitle>
          Secondary line text Lorem ipsum dolor sit amet,
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
       </v-sheet>
    </div><!--content-wrapper-->
    
  </div><!--home-wrapper-->
</template>

<script>
import Barcode from '../ParticalsComponents/BarCode';
import EventBus from '../../EventBus';
  export default {
    name:"Home",
    components:{Barcode},
    mounted(){
        setInterval(()=>{
             this.loading=false;
        },3000),
         EventBus.$on('barcode', function (payLoad) {
           this.Barcode=!this.Barcode;
           alert('fcx');  
         });
    },
    data:function(){
         return{
             loading:true,
             Barcode:false
         }
    },
    inject: ['theme'],
  }
</script>

<style scoped>
.items-list{
   border-bottom: 1px solid rgba(0,0,0,.12);
}

</style>