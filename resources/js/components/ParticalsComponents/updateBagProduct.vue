<template>
    <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
                <v-card-title>
                    <span class="headline">Edit Bag</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <!-- form container -->
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field
                                    label="Product Name*"
                                    required
                                    v-model="updateBagData.pro_name"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Company Name"
                            
                                   v-model="updateBagData.pro_brand"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Total Weight in Bag"
                                    required
                                      type="number" min="0"
                                    v-model="updateBagData.pro_total_weight_in_bag"
                                ></v-text-field>
                            </v-col>


                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Purchase Price Per Kg"
                                    required
                                   type="number" min="0"
                                    v-model="updateBagData.pro_purchase_price_per_kg"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                type="number" min="0"
                                    label="Purchase Price Bag"
                                   v-model="updateBagData.pro_purchase_price_bag"
                                   
                                ></v-text-field>
                            </v-col>


                             <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Whole Sale Price Per Kg"
                                    required
                                    type="number" min="0"
                                    v-model="updateBagData.pro_whole_sale_price_per_kg"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Whole Sale Price Bag"
                                    type="number" min="0"
                                   v-model="updateBagData.pro_whole_sale_price_bag"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Retail Price Per Kg"
                                    required
                                    type="number" min="0"
                                    v-model="updateBagData.pro_retail_price_per_kg"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Retail Price Bag"
                                    type="number" min="0"
                                     v-model="updateBagData.pro_retail_price_bag"
                                                                  ></v-text-field>
                            </v-col>

                             
                           
                           <!-- form container -->
                        </v-row>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="close()"
                        >Close</v-btn
                    >
                    <v-btn color="blue darken-1" text @click="save()"
                        >Save</v-btn
                    >
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
import EventBus from '../../EventBus';
export default {
    props: ["dialog", "updateBagData"],
    name: "updateBagProduct",
    data(){
       return{}
    },
    methods:{
        save(){
            axios.post('/api/update-bag', this.updateBagData).then(res=>{
                
             EventBus.$emit('dialogBag');
            }).catch(err=>console.log(err))
        },
         close:function(){
             EventBus.$emit('dialogBag');
        }
    }
};
</script>
