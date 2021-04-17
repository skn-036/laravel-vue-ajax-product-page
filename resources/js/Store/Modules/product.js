import axios from 'axios'

const state = {
    products : {},
}

const getters = {
    outputProducts : (state) => state.products,
}

const actions = {
    getProducts({commit}, page) {

        let sortingInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))
        
        if(typeof page == 'undefined') {
            page = 1
        }

        axios.post('api/products?page=' + page, {
            data : sortingInputs
        })
        .then(response => {
            if(response.status == 200) {
                commit('fetchProducts', response.data);
            }
        })
        .catch(error => {
            console.log(error)
        })
    },
}

const mutations = {
    fetchProducts : (state, payload) => state.products = payload
}

export default {
    state,
    getters,
    actions,
    mutations
}
