<template>
<div class="form-wrapper">
 
  <v-form ref="form" v-model="valid" lazy-validation>

    <v-text-field v-model="proName"  :rules="nameRules" label="Product Name" required></v-text-field>
     <v-text-field v-model="proBrand"  :rules="nameRules" label="Company Name" required></v-text-field>
     <v-text-field v-model="cartonTotalPiece" type="number"  label="Total Piece In carton \ Dozen"   ></v-text-field>
    
    <v-text-field v-model="salePricePerPiece" type="number"  @blur="priceCalRetailSale()" label="Sale Price Per Piece"   ></v-text-field>
    <v-text-field v-model="salePricecarton" type="number"  @blur="priceCalRetailSale()"  label="Sale Price Carton"   ></v-text-field>

     <v-text-field v-model="wholeSalePricePerPiece" type="number"  @blur="priceCalWholeSale()" label="Whole Sale Price Per Piece"   ></v-text-field>
    <v-text-field v-model="wholeSalePricecarton" type="number"  label="Whole Sale Price Carton" @blur="priceCalWholeSale()"   ></v-text-field>
 
  <v-text-field v-model="buyPricePerPiece" type="number"  @blur="priceCalBuy()"  label="Purched Price Per Piece"   ></v-text-field>
    <v-text-field v-model="buyPricecarton" type="number"   @blur="priceCalBuy()" label="Purched Price Carton"  required ></v-text-field>

 <v-btn color="warning" @click="submitData()"> Submit Product</v-btn>
<v-btn  color="error" class="mr-4" @click="resetForm">Reset Form</v-btn>
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
      proBrand:'',
      nameRules: [v => !!v || 'Field is required',]
    }),

    methods: {
      resetForm :function() {
        this.$refs.form.reset()
      },
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
                proBrandName:this.proBrand,
               
                }
                axios({
                    method: 'post',
                    url: '/api/add-Carton-Product',
                     data: body
                  })
                 .then(response=>{
                   this.resetForm();
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
       
    },
  }
</script>
<style scoped>
.v-form{
    padding:20px;
}
</style>