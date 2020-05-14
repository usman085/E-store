<template>
  <v-card>
    <v-card-title>
      Carton
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table :headers="headers" :items="products" :search="search"></v-data-table>

    <v-card-title>
      Thala
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table :headers="header" :items="product" :search="search"></v-data-table>
  </v-card>
</template>

<script>
export default {
    name:'productMange',
  data() {
    return {
      search: "",
      headers: [
        {
          text: "Product Name",
          align: "start",
          sortable: false,
          value: "name"
        },
        { text: "Purchase Price Per Piece", value: "protein" },
        { text: "Purchase Price Per Carton", value: "iron" },
        { text: "Sale Price Per Piece", value: "calories" },
        { text: "Sala Price Per Carton", value: "fat" },
        { text: "Whole Sale Price Per Carton", value: "carbs" },
        { text: "Total Per Carton", value: "carbs" }
      ],
      products: [
        {
          name: "KitKat",
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: "6%"
        }
      ],
      header: [
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
      product: [
        {
          name: "KitKat",
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: "6%"
        }
      ]
    };
  }
};
</script>