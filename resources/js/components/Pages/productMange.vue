<template>
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
               <v-btn class="mx-2"  dark small color="blue" >
                    <v-icon dark>mdi-table-edit</v-icon>
                </v-btn>
                <v-btn class="mx-2"  dark small color="pink" >
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
    <v-data-table :headers="bagHeaders" :items="bagProduct" :search="bagSearch">
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
               <v-btn class="mx-2"  dark small color="blue" >
                    <v-icon dark>mdi-table-edit</v-icon>
                </v-btn>
                <v-btn class="mx-2"  dark small color="pink" >
                    <v-icon dark>mdi-delete</v-icon>
                </v-btn>
            </td>
          </tr>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
export default {
    name:'productMange',
    mounted(){
      axios.get('http://localhost:8000/api/all-carton').then(res=>{
        console.log(res);
        this.cartonProducts=res.data;
      }).catch(err=>console.log(err));
    },
  data() {
    return {
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
        { text: "Total Per Carton", value: "pro_total_piece_in_carton" },
        { text: "Action", value: "pro_total_piece_in_carton" }
      ],
      cartonProducts: [],
      bagHeaders: [
        {
          text: "Product Name",
          align: "start",
          sortable: false,
          value: "name"
        },
        { text: "Purchase Price Per Thala", value: "protein" },
        { text: "Purchase Price Per Carton", value: "iron" },
        { text: "Sale Price Per Piece", value: "calories" },
        { text: "Sala Price Per Carton", value: "fat" },
        { text: "Whole Sale Price Per Carton", value: "carbs" },
        { text: "Total Per Carton", value: "carbs" }
      ],
      bagProducts: []
    };
  }
};
</script>