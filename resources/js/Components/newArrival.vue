<template>
    <div class="arrival">
        <h4 class="mt-3 mb-2">Lastest Arrival</h4>
        <div class="checkbox-item">
            <input
                type="radio"
                name="latest"
                v-model="date"
                v-bind:value="'7'"
                @change="checked"
                class="sorting"
            />
            <span>Last Week</span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="latest"
                v-model="date"
                v-bind:value="'30'"
                @change="checked"
                class="sorting"
            />
            <span>Last Month</span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="latest"
                v-model="date"
                v-bind:value="'90'"
                @change="checked"
                class="sorting"
            />
            <span>Last 3 Months</span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="latest"
                v-model="date"
                v-bind:value="'180'"
                @change="checked"
                class="sorting"
            />
            <span>Last 6 Months</span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="latest"
                v-model="date"
                v-bind:value="'old'"
                @change="checked"
                class="sorting"
            />
            <span>Older</span>
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex'

    export default {

        data : function() {
            return {
                date : '',
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            checked() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortingInput.date = this.date

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            }
        }
    }
</script>
