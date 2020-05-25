<template>
    <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
                <v-card-title>
                    <span class="headline">Edit Carton</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <!-- form container -->
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field
                                    label="Product Name*"
                                    required
                                    v-model="updateCartonData.pro_name"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Company Name"
                            
                                   v-model="updateCartonData.pro_brand"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                type="number" min="0"
                                    label="Total Piece Per Carton"
                                    required
                                     
                                    v-model="updateCartonData.pro_total_piece_in_carton"
                                ></v-text-field>
                            </v-col>


                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Purchase Price Per Piece"
                                    required
                                   type="number" min="0"

                                    v-model="updateCartonData.pro_purchase_price_per_piece"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Purchase Price Carton"
                                   v-model="updateCartonData.pro_purchase_price_carton"
                                   type="number" min="0"
                                ></v-text-field>
                            </v-col>


                             <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Whole Sale Price Per Piece"
                                    required
                                    type="number" min="0"
                                    v-model="updateCartonData.pro_whole_sale_price_per_piece"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Whole Sale Price Carton"
                                   type="number" min="0"
                                   v-model="updateCartonData.pro_whole_sale_price_carton"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Retail Price Per Piece"
                                    required
                                    type="number" min="0"

                                    v-model="updateCartonData.pro_retail_price_per_piece"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                    label="Retail Price Carton"
                                     v-model="updateCartonData.pro_retail_price_carton"
                                     type="number" min="0"
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
    props: ["dialog", "updateCartonData"],
    name: "updateCartonProduct",
    data(){
       return{}
    },
    methods:{
        save(){
            axios.post('/api/update-carton', this.updateCartonData).then(res=>{
                 EventBus.$emit('dialogCarton');
            }).catch(err=>console.log(err))
            console.log(this.updateCartonData);
        },
        close:function(){
             EventBus.$emit('dialogCarton');
        }
    }
};
</script>
