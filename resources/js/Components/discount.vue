<template>
    <div class="discount">
        <h4 class="mt-3 mb-2">Discount</h4>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'1-10'" @change="checked" v-model="discounts" class="sorting" />
            <span>Less than 10%</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'11-25'" @change="checked" v-model="discounts" class="sorting" />
            <span>11% -25%</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'26-40'" @change="checked" v-model="discounts" class="sorting" />
            <span>26% -40%</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'41-60'" @change="checked" v-model="discounts" class="sorting" />
            <span>41% -60%</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'61-100'" @change="checked" v-model="discounts" class="sorting" />
            <span>More Than 60%</span>
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex'

    export default {

        data : function() {
            return {
                discounts : [],
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            checked() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortingInput.discounts = this.discounts

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            }
        }
    }
</script>