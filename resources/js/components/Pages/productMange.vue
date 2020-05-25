<template>
<div class="wrapper-data-tables">
  <v-card>
    <v-card-title>
      Cartons
      <v-spacer></v-spacer>
      <v-text-field
        v-model="CartonSearch"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table :headers="cartonHeaders" :items="cartonProducts" :search="CartonSearch">
       <template v-slot:item="row">
          <tr>
            <td>{{row.item.pro_name | capitalize }}</td>
            <td>{{row.item.pro_brand | capitalize }}</td>
            <td>{{row.item.pro_purchase_price_per_piece}}</td>
            <td>{{ row.item.pro_purchase_price_carton }}</td>
            <td>{{ row.item.pro_retail_price_per_piece }}</td>
             <td>{{ row.item.pro_retail_price_carton }}</td>
             <td>{{ row.item.pro_whole_sale_price_per_piece }}</td>
             <td>{{ row.item.pro_whole_sale_price_carton }}</td>
             <td>{{ row.item.pro_total_piece_in_carton }}</td>
            <td>
               <v-btn class="mx-2"  dark small color="blue"  @click="UpdateModel(row.item.id)" >
                    <v-icon dark>mdi-table-edit</v-icon>
                </v-btn>
                <v-btn class="mx-2"  dark small color="pink" @click="delModel(row.item.id,row.item.pro_type)" >
                    <v-icon dark>mdi-delete</v-icon>
                </v-btn>
            </td>
          </tr>
      </template>
    </v-data-table>

    <v-card-title>
       Bags
      <v-spacer></v-spacer>
      <v-text-field
        v-model="bagSearch"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table :headers="bagHeaders" :items="bagProducts" :search="bagSearch">
       <template v-slot:item="row">
          <tr>
            <td>{{row.item.pro_name | capitalize }}</td>
            <td>{{row.item.pro_brand | capitalize }}</td>
            <td>{{row.item.pro_purchase_price_per_kg}}</td>
            <td>{{ row.item.pro_purchase_price_bag }}</td>
            <td>{{ row.item.pro_retail_price_per_kg }}</td>
             <td>{{ row.item.pro_retail_price_bag }}</td>
             <td>{{ row.item.pro_whole_sale_price_per_kg }}</td>
             <td>{{ row.item.pro_whole_sale_price_bag }}</td>
             <td>{{ row.item.pro_total_weight_in_bag }}</td>
            <td>
               <v-btn class="mx-2"  dark small color="blue"  @click="UpdateModelBag(row.item.id)" >
                    <v-icon dark>mdi-table-edit</v-icon>
                </v-btn>
                <v-btn class="mx-2"  dark small color="pink" @click="delModel(row.item.id,row.item.pro_type)" >
                    <v-icon dark >mdi-delete</v-icon>
                </v-btn>
            </td>
          </tr>
      </template>
    </v-data-table>
  </v-card>
<!-- modal container -->
<updateCartonProduct :dialog="updateCartonModel" :updateCartonData="updateCartonData"></updateCartonProduct>

<updateBagProduct :dialog="updateBagModel" :updateBagData="updateBagData"></updateBagProduct>

<!-- modal conatainer -->

  <!-- modal -->
    <v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="headline">Are You Sure to Delete this Product ? </v-card-title>

        <v-card-text>
         Select Yes / NO .If You Select Yes this Product is remove. If you select No then Product would not be 
         remove    
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="YesDelBag()"
          >
            Yes
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="NoDelBag"
          >
            No
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  



  </div>
</template>

<script>
import updateCartonProduct from '../ParticalsComponents/updateCartonProduct';
import updateBagProduct from '../ParticalsComponents/updateBagProduct'
import EventBus from '../../EventBus';
export default {
    name:'productMange',
    components:{updateCartonProduct,updateBagProduct},
    mounted(){
         this.getAllCarton();
         this.getAllBags();

         EventBus.$on('dialogBag',()=>{
          this.updateBagModel=  !this.updateBagModel;
         });
         EventBus.$on('dialogCarton',()=>{
          this.updateCartonModel=!this.updateCartonModel;
         });
    },
    methods:{
      UpdateModel:function(id){   
            this.updateCartonModel=true;
            this.updateCartonData = this.cartonProducts.find(data => data.id === id);
      },
      UpdateModelBag:function(id){   
            this.updateBagModel=true;
            this.updateBagData = this.bagProducts.find(data => data.id === id);
      },
      YesDelBag:function(){
          this.delProduct(this.delId);
           this.dialog=false;
           this.pro_type=null;
      },
      NoDelBag:function(){
               this.delBagId=null;
               this.dialog=false;
               this.pro_type=null;
      },
      delModel:function(id,pro_type){
             this.dialog=true;
             this.pro_type=parseInt(pro_type);
            this.delId=id; 
      },
      delProduct:function(id){
      
        if(this.pro_type == 1){
            axios.get('http://localhost:8000/api/del-carton/'+id).then(res=>{
               console.log(res);
                  this.getAllCarton();
          }).catch(err=>console.log(err));
      }else{
         
           axios.get('http://localhost:8000/api/del-bag/'+id).then(res=>{
               console.log(res);
                  this.getAllBags();
          }).catch(err=>console.log(err));

      }

        
        },
      getAllCarton:function(){
              axios.get('http://localhost:8000/api/all-carton').then(res=>{
              console.log(res);
              this.cartonProducts=res.data;
            }).catch(err=>console.log(err));
      },
        getAllBags:function(){
          axios.get('http://localhost:8000/api/all-bag').then(res=>{
        console.log(res);
        this.bagProducts=res.data;
      }).catch(err=>console.log(err));
        }
    },
  data() {
    return {
      delId:null,
      updateCartonData:{},
      updateBagData:{},
      updateBagModel:false,
      updateCartonModel:false,
      pro_type:'',
      dialog:false,
      CartonSearch: "",
      bagSearch:'',
      cartonHeaders: [
        {
          text: "Product Name",
          align: "start",
          sortable: false,
          value: "pro_name"
        },
        { text: "Company Name", value: "pro_brand" },
        { text: "Purchase Price Per Piece", value: "pro_purchase_price_per_piece" },
        { text: "Purchase Price Per Carton", value: "pro_purchase_price_carton" },
        { text: "Sale Price Per Piece", value: "pro_retail_price_per_piece" },
        { text: "Sala Price Per Carton", value: "pro_retail_price_carton" },
        { text: "Whole Sale Price Per Piece", value: "pro_whole_sale_price_per_piece" },
        { text: "Whole Sale Price Per Carton", value: "pro_whole_sale_price_carton" },
        { text: "Total Piece Per Carton", value: "pro_total_piece_in_carton" },
        { text: "Action", value: "",sortable: false, }
      ],
      cartonProducts: [],
      bagHeaders: [
        {
          text: "Product Name",
          align: "start",
          sortable: false,
          value: "pro_name"
        },
        { text: "Company Name", value: "pro_brand" },
        { text: "Purchase Price Per Kg", value: "pro_purchase_price_per_kg" },
        { text: "Purchase Price Per Bag", value: "pro_purchase_price_bag" },
        { text: "Sale Price Per Kg", value: "pro_retail_price_per_kg" },
        { text: "Sala Price Per Bag", value: "pro_retail_price_bag" },
        { text: "Whole Sale Price Per Kg", value: "pro_whole_sale_price_per_kg" },
        { text: "Whole Sale Price Per Bag", value: "pro_whole_sale_price_bag" },
        { text: "Total Weight in Bag", value: "pro_total_weight_in_bag" },
        { text: "Action", value: "" ,sortable: false,}
      ],
      bagProducts: []
    };
  }
};
</script>