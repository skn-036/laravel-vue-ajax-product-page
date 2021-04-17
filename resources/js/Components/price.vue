<template>
    <div class="price">
        <h4 class="mt-3 mb-2">Price Range</h4>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'0-100'" @change="checked" v-model="priceRanges" class="sorting" >
            <span>Less than $100</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'101-500'" @change="checked" v-model="priceRanges" class="sorting" >
            <span>$100 - $500</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'501-1000'" @change="checked" v-model="priceRanges" class="sorting" >
            <span>$501 - $1000</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'1001-2000'" @change="checked" v-model="priceRanges" class="sorting" >
            <span>$1001 - $2000</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'2001-9999'" @change="checked" v-model="priceRanges" class="sorting" >
            <span>More Than $2000</span>
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex'

    export default {

        data : function() {
            return {
                priceRanges : [],
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            checked() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortingInput.prices = this.priceRanges

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            }
        },
    }
</script>