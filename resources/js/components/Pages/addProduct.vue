<template>
<div class="form-product-wrapper">
    <h2 class="add-product">Add Products</h2>
   
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
    padding: 0 20px;
}
</style>