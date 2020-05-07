<template>
      <div class="wrapper">
         <HeaderComponent @barcodeToggle="test()"/>
        <router-view></router-view>
      </div><!-- Root-Div -->
</template>

<script>
import HeaderComponent from './CommonComponents/HeaderComponent';
export default {
     name:"App",
     components:{HeaderComponent},
     methods:{
           
     }
}
</script>

<style scoped>

</style>