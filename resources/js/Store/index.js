import Vuex from 'vuex'
import Vue from 'vue'
import Product from './Modules/product'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules : {
        Product,
    }
})

export default store;