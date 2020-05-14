<template>
<div class="form-wrapper">
 
  <v-form ref="form" v-model="valid" lazy-validation>
    <v-text-field v-model="proName"  :rules="nameRules" label="Product Name" ></v-text-field>
     <v-text-field v-model="totalWeight" :rules="nameRules" label="Total Weight In Bag (KG)"   ></v-text-field>
    
    <v-text-field v-model="salePricePerKg" @blur="priceCalRetail()" :rules="nameRules" label="Sale Price Per KG"   ></v-text-field>
    <v-text-field v-model="salePriceBag" @blur="priceCalRetail()" :rules="nameRules" label="Sale Price Bag"   ></v-text-field>

     <v-text-field v-model="wholeSalePricePerKg" @blur="priceCalWholeSale()" label="Whole Sale Price Per KG" ></v-text-field>
    <v-text-field v-model="wholeSalePriceBag" @blur="priceCalWholeSale()" label="Whole Sale Price Bag"  ></v-text-field>
 
  <v-text-field v-model="buyPricePerKg" @blur="priceCalBuySale()"  label="Purched Price Per Piece"   ></v-text-field>
    <v-text-field v-model="buyPriceBag" @blur="priceCalBuySale()" label="Purched Price Bag"   ></v-text-field>

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
      name:'addBagForm',
    data: () => ({
      valid: true,
      totalWeight:'',
      buyPriceBag:'',
      wholeSalePricePerKg:'',
      buyPricePerKg:'',
      wholeSalePriceBag:'',
      salePriceBag:'',
      salePricePerKg:'',
      proName: '',

      nameRules: [v => !!v || 'Field is required',],
      select: null,
      items: [
        'Carton',
        'Thala'
      ],
      
    }),

    methods: {
        priceCalRetail:function(){
            if(this.totalWeight != ''){
                if(this.salePricePerKg != '' && this.salePriceBag ==''){
                    this.salePriceBag=this.salePricePerKg * this.totalWeight;
                }
                if(this.salePricePerKg == '' && this.salePriceBag !=''){
                    this.salePricePerKg = this.salePriceBag / this.totalWeight;
                }
            }
        },
            priceCalWholeSale:function(){
            if(this.totalWeight != ''){
                if(this.wholeSalePricePerKg != '' && this.wholeSalePriceBag ==''){
                    this.wholeSalePriceBag=this.wholeSalePricePerKg * this.totalWeight;
                }
                if(this.wholeSalePricePerKg == '' && this.wholeSalePriceBag !=''){
                    this.wholeSalePricePerKg = this.wholeSalePriceBag / this.totalWeight;
                }
            }

        },
        priceCalBuySale:function(){
               if(this.totalWeight != ''){
                if(this.buyPricePerKg != '' && this.buyPriceBag ==''){
                    this.buyPriceBag=this.buyPricePerKg * this.totalWeight;
                }
                if(this.buyPricePerKg == '' && this.buyPriceBag !=''){
                    this.buyPricePerKg = this.buyPriceBag / this.totalWeight;
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
    padding: 20px;
}
</style>