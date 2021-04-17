<template>
    <div class="category">
        <h4 class="mt-3 mb-2">Categories</h4>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Mobile'" @change="checked" v-model="categories" class="sorting">
            <span>Mobile</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Tab'" @change="checked" v-model="categories" class="sorting">
            <span>Tab</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Smart Watch'" @change="checked" v-model="categories" class="sorting">
            <span>Smart Watch</span>
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex'

    export default {

        data : function() {
            return {
                categories : [],
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            checked() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortingInput.categories = this.categories

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            }
        }
    }
</script>