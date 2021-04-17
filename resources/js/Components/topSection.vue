<template>
    <div>
        <section id="top-section" class="mb-3">
            <div class="container">
                <div class="row top-row">
                    <div class="col-sm-3 query-result d-flex align-items-center">
                        <h6>{{ 'Showing ' + outputProducts.from + '-' + outputProducts.to + ' of ' + outputProducts.total + ' results' }}</h6>
                    </div>
                    <div class="col-sm-6 search d-flex align-items-center flex-row ">
                        <input type="text" class="w-100" @keyup="search" v-model="searchInput">
                        <button class="btn btn-warning" @click="clear">Clear</button>
                    </div>
                    <div class="col-sm-3 d-flex align-items-center justify-content-sm-end">
                        <select v-model="sort" @change="sortBy">
                            <option value="latest">Latest</option>
                            <option value="price-decend">Price: Hight To Low</option>
                            <option value="price-ascend">Price: Low to High</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <section id="mobile-search" class="d-flex flex-row">
            <input type="text" class="w-100" @keyup="search" v-model="searchInput">
            <button class="btn btn-warning" @click="clear">Clear</button>
        </section>
    </div>
</template>

<script>

import {mapActions, mapGetters} from 'vuex'

    export default {

        data : function() {
            return {
                sort : 'latest',
                searchInput : '',
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            sortBy() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortBy = this.sort

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            },

            search() {
                let inputs = {
                    sortIndex : true,
                    searchIndex : true,
                    sortingInput : {
                        brands : [],
                        categories : [],
                        prices : [],
                        discounts : [],
                        rating : '',
                        date : ''
                    },
                    sortBy : 'latest',
                    searchInput : this.searchInput,
                }
                sessionStorage.setItem('sortingInputs', JSON.stringify(inputs))
                this.getProducts();
            },

            clear() {
                let inputs = {
                    sortIndex : false,
                    searchIndex : false,
                    sortingInput : {
                        brands : [],
                        categories : [],
                        prices : [],
                        discounts : [],
                        rating : '',
                        date : ''
                    },
                    sortBy : 'latest',
                    searchInput : '',
                }

                sessionStorage.setItem('sortingInputs', JSON.stringify(inputs))
                this.searchInput = ''

                document.querySelectorAll('.sorting').forEach(clearChecked)
                function clearChecked(item) {
                    item.checked = false
                }
                this.getProducts();
            }
        },

        computed : {
            ...mapGetters(['outputProducts'])
        }
    }
</script>