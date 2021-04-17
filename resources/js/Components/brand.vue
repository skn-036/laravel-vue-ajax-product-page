<template>
    <div class="brand">
        <h4 class="mt-3 mb-2">Brands</h4>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Apple'" @change="checked" v-model="brands" class="sorting">
            <span>Apple</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Samsung'" @change="checked" v-model="brands" class="sorting">
            <span>Samsung</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Huawei'" @change="checked" v-model="brands" class="sorting">
            <span>Huawei</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Xiaomi'" @change="checked" v-model="brands" class="sorting">
            <span>Xiaomi</span>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" v-bind:value="'Oppo'" @change="checked" v-model="brands" class="sorting">
            <span>Oppo</span>
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex'

    export default {

        data : function() {
            return {
                brands : [],
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            checked() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortingInput.brands = this.brands

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            }
        },
    }
</script>