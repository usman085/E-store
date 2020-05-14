<template>
<div class="form-wrapper">
 
  <v-form ref="form" v-model="valid" lazy-validation>

    <v-text-field v-model="proName"  :rules="nameRules" label="Product Name" required></v-text-field>
     <v-text-field v-model="cartonTotalPiece"   label="Total Piece In carton"   ></v-text-field>
    
    <v-text-field v-model="salePricePerPiece" @blur="priceCalRetailSale()" label="Sale Price Per Piece"   ></v-text-field>
    <v-text-field v-model="salePricecarton" @blur="priceCalRetailSale()"  label="Sale Price Carton"   ></v-text-field>

     <v-text-field v-model="wholeSalePricePerPiece" @blur="priceCalWholeSale()" label="Whole Sale Price Per Piece"   ></v-text-field>
    <v-text-field v-model="wholeSalePricecarton"  label="Whole Sale Price Carton" @blur="priceCalWholeSale()"   ></v-text-field>
 
  <v-text-field v-model="buyPricePerPiece" @blur="priceCalBuy()"  label="Purched Price Per Piece"   ></v-text-field>
    <v-text-field v-model="buyPricecarton"  @blur="priceCalBuy()" label="Purched Price Carton"  required ></v-text-field>

 <v-btn color="warning" @click="submitData()"> Submit Product</v-btn>
<v-btn  color="error" class="mr-4" @click="reset">Reset Form</v-btn>
  </v-form>
  </div>
</template>
<script>

  export default {
      name:'addcartonForm',
    data: () => ({
      valid: true,
      proName: '',
      buyPricePerPiece:'',
      buyPricecarton:'',
      wholeSalePricecarton:'',
      wholeSalePricePerPiece:'',
      cartonTotalPiece:'',
      salePricecarton:'',
      salePricePerPiece:'',
      proBrandName:'',
      nameRules: [v => !!v || 'Field is required',]
    }),

    methods: {
        submitData:function(){
              var body = {
                proName:this.proName,
                buyPricePerPiece:this.buyPricePerPiece,
                buyPricecarton:this.buyPricecarton,
                 wholeSalePricecarton:this.wholeSalePricecarton,
                 wholeSalePricePerPiece:this.wholeSalePricePerPiece,
                 cartonTotalPiece:this.cartonTotalPiece,
                salePricecarton:this.salePricecarton,
                 salePricePerPiece:this.salePricePerPiece,
                 proBrandName:this.proBrandName
                }
                 axios({
                    method: 'post',
                    url: '/api/add-Carton-Product',
                     data: body
                  })
                 .then(function (response) {
                   console.log(response);
                    })
                     .catch(function (error) {
                        console.log(error);
                    });
        },
        priceCalBuy:function(){
            if(this.cartonTotalPiece != ''){  
                if(this.buyPricePerPiece != '' && this.buyPricecarton ==''){
                    this.buyPricecarton=this.buyPricePerPiece * this.cartonTotalPiece;
                }
                if(this.buyPricePerPiece == '' && this.buyPricecarton !=''){
                    this.buyPricePerPiece = this.buyPricecarton / this.cartonTotalPiece;
                }
            }
        },
        priceCalWholeSale:function(){
            if(this.cartonTotalPiece != ''){  
                if(this.wholeSalePricePerPiece != '' && this.wholeSalePricecarton ==''){
                    this.wholeSalePricecarton=this.wholeSalePricePerPiece * this.cartonTotalPiece;
                }
                if(this.wholeSalePricePerPiece == '' && this.wholeSalePricecarton !=''){
                    this.wholeSalePricePerPiece = this.wholeSalePricecarton / this.cartonTotalPiece;
                }
            }
        },
        priceCalRetailSale:function(){
             if(this.cartonTotalPiece != ''){  
                if(this.salePricePerPiece != '' && this.salePricecarton ==''){
                    this.salePricecarton=this.salePricePerPiece * this.cartonTotalPiece;
                }
                if(this.salePricePerPiece == '' && this.salePricecarton !=''){
                    this.salePricePerPiece = this.salePricecarton / this.cartonTotalPiece;
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
    padding:20px;
}
</style>