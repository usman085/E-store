<template>
<div class="form-product-wrapper">
    <h2 class="add-product">Add Products</h2>
    <p style="text-align:center">Choose Tab according Product</p>
   
         <formComponent></formComponent>
   
    
</div><!--form-product-wrapper-->
</template>
    
<script>
import formComponent from '../ParticalsComponents/Form';
export default {
    name:'addProduct',
    components:{formComponent}
    
}
</script>
<style scoped>
.add-product{
    text-align: center;
    margin: 14px 0;
}
.form-product-wrapper{
    padding: 15px;
    margin-bottom:20px;
}
</style>