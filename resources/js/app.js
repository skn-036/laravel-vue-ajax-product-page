require('./bootstrap');

import Vue from 'vue'
import Store from './Store'


Vue.use(require('vue-resource'));
Vue.component('Pagination', require('laravel-vue-pagination'));

import ProductPage from './Components/productPage'

const app = new Vue({
    el: '#app',

    components : {
        ProductPage,
    },

    store : Store, 
});
