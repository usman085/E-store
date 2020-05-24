/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import vuetify from './plugins/vuetify' // path to vuetify export
import VueRouter from 'vue-router';
import routes from './router';
Vue.component('App', require('./components/AppComponent').default); //Root Component

Vue.use(VueRouter);

Vue.filter('capitalize', function(value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

const router = new VueRouter({
    routes
});
const app = new Vue({
    el: '#root-app',
    vuetify,
    router

});