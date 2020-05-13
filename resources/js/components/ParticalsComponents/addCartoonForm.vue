<template>
<div class="form-wrapper">
 
  <v-form ref="form" v-model="valid" lazy-validation>

    <v-text-field v-model="proName"  :rules="nameRules" label="Product Name" required></v-text-field>
     <v-text-field v-model="cartonTotalPiece"  :rules="nameRules" required label="Total Piece In Cartoon"   ></v-text-field>
    
    <v-text-field v-model="salePricePerPiece" @blur="priceCalRetailSale()" label="Sale Price Per Piece"   ></v-text-field>
    <v-text-field v-model="salePriceCartoon" @blur="priceCalRetailSale()"  label="Sale Price Carton"   ></v-text-field>

     <v-text-field v-model="wholeSalePricePerPiece" @blur="priceCalWholeSale()" label="Whole Sale Price Per Piece"   ></v-text-field>
    <v-text-field v-model="wholeSalePriceCartoon"  label="Whole Sale Price Carton" @blur="priceCalWholeSale()"   ></v-text-field>
 
  <v-text-field v-model="buyPricePerPiece" @blur="priceCalBuy()"  label="Purched Price Per Piece"   ></v-text-field>
    <v-text-field v-model="buyPriceCartoon"  @blur="priceCalBuy()" label="Purched Price Carton"  required ></v-text-field>

    

  

  
 <v-btn
      color="warning"
     
    >
      Submit Product
    </v-btn>
    <v-btn
      color="error"
      class="mr-4"
      @click="reset"
    >
      Reset Form
    </v-btn>

   
  </v-form>
  </div>
</template>
<script>

  export default {
      name:'addCartoonForm',
    data: () => ({
      valid: true,
      proName: '',
      buyPricePerPiece:'',
      buyPriceCartoon:'',
      wholeSalePriceCartoon:'',
      wholeSalePricePerPiece:'',
      cartonTotalPiece:'',
      salePriceCartoon:'',
      salePricePerPiece:'',
      nameRules: [v => !!v || 'Field is required',],
      select: null,
      items: [
        'Carton',
        'Thala'
      ],
      
    }),

    methods: {
        priceCalBuy:function(){
            if(this.cartonTotalPiece != ''){  
                if(this.buyPricePerPiece != '' && this.buyPriceCartoon ==''){
                    this.buyPriceCartoon=this.buyPricePerPiece * this.cartonTotalPiece;
                }
                if(this.buyPricePerPiece == '' && this.buyPriceCartoon !=''){
                    this.buyPricePerPiece = this.buyPriceCartoon / this.cartonTotalPiece;
                }
            }
        },
        priceCalWholeSale:function(){
            if(this.cartonTotalPiece != ''){  
                if(this.wholeSalePricePerPiece != '' && this.wholeSalePriceCartoon ==''){
                    this.wholeSalePriceCartoon=this.wholeSalePricePerPiece * this.cartonTotalPiece;
                }
                if(this.wholeSalePricePerPiece == '' && this.wholeSalePriceCartoon !=''){
                    this.wholeSalePricePerPiece = this.wholeSalePriceCartoon / this.cartonTotalPiece;
                }
            }
        },
        priceCalRetailSale:function(){
             if(this.cartonTotalPiece != ''){  
                if(this.salePricePerPiece != '' && this.salePriceCartoon ==''){
                    this.salePriceCartoon=this.salePricePerPiece * this.cartonTotalPiece;
                }
                if(this.salePricePerPiece == '' && this.salePriceCartoon !=''){
                    this.salePricePerPiece = this.salePriceCartoon / this.cartonTotalPiece;
                }
            }

        },
      reset () {
        this.$refs.form.reset()
      },
    },
  }
</script>
<style scoped>
.v-form{
    padding:0 20px;
}
</style>