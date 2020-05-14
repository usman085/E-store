<template>
<v-card>
    <v-tabs centered="" v-model="tab" background-color="primary" dark>
      <v-tab v-for="item in items" :key="item.tab">
        {{ item.tab }}
      </v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <v-card flat>
         
           <addCartonForm></addCartonForm>

        </v-card>

      </v-tab-item>

       <v-tab-item>
        <v-card flat>
         
           <addBagForm></addBagForm>

        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>

<script>
import addCartonForm from './addCartonForm';
import addBagForm from './addBagForm';
  export default {
    name:'formComponent',
    components:{addCartonForm,addBagForm},
    data () {
      return {
        tab: null,
        items: [
          { tab: 'Add Carton' },{tab:'Add Bag'}
          
        ],
      }
    },
  }
</script>
