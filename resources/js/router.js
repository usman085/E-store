import Home from './components/Pages/Home';
import addProduct from './components/Pages/addProduct';
import productMange from './components/Pages/productMange';
const routes = [
    { path: '/dash-borad', component: Home },
    { path: '/addProduct', component: addProduct },
    { path: '/productMange', component: productMange },
    { path: '/', redirect: '/dash-borad' }
];


export default routes;