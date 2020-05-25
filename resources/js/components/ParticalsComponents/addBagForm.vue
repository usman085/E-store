<template>
<div class="form-wrapper">
 
  <v-form ref="form" v-model="valid" lazy-validation>
    <v-text-field v-model="proName"  :rules="nameRules" label="Product Name" ></v-text-field>
    <v-text-field v-model="proBrand"    label="Company Name" ></v-text-field>
     <v-text-field v-model="totalWeight" type="number" label="Total Weight In Bag (KG)"   ></v-text-field>
    
    <v-text-field v-model="salePricePerKg" type="number" @blur="priceCalRetail()"  label="Sale Price Per KG"   ></v-text-field>
    <v-text-field v-model="salePriceBag" type="number" @blur="priceCalRetail()"  label="Sale Price Bag"   ></v-text-field>

     <v-text-field v-model="wholeSalePricePerKg" type="number" @blur="priceCalWholeSale()" label="Whole Sale Price Per KG" ></v-text-field>
    <v-text-field v-model="wholeSalePriceBag" type="number" @blur="priceCalWholeSale()" label="Whole Sale Price Bag"  ></v-text-field>
 
  <v-text-field v-model="buyPricePerKg" type="number" @blur="priceCalBuySale()"  label="Purched Price Per Piece"   ></v-text-field>
    <v-text-field v-model="buyPriceBag" type="number" @blur="priceCalBuySale()" label="Purched Price Bag"   ></v-text-field>

 <v-btn color="warning" @click="submitData()">Submit Product</v-btn>
    <v-btn color="error" class="mr-4" @click="resetForm">
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
      proBrand:'',
      nameRules: [v => !!v || 'Field is required',],
    }),

    methods: {
       submitData:function(){
              var body = {
                proName:this.proName,
                buyPricePerKg:this.buyPricePerKg,
                buyPriceBag:this.buyPriceBag,
                wholeSalePriceBag:this.wholeSalePriceBag,
                wholeSalePricePerKg:this.wholeSalePricePerKg,
                totalWeight:this.totalWeight,
                salePriceBag:this.salePriceBag,
                salePricePerKg:this.salePricePerKg,
                proBrandName:this.proBrand
                }
                axios({
                    method: 'post',
                    url: '/api/add-Bag-Product',
                     data: body
                  })
                 .then(response=>{
                 
                   this.resetForm();
                    })
                     .catch(function (error) {
                        console.log(error);
                    });
        },
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
      resetForm () {
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