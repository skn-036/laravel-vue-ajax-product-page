<template>
    <div class="rating">
        <h4 class="mt-3 mb-2">Rating</h4>
        <div class="checkbox-item">
            <input
                type="radio"
                name="rating"
                v-bind:value="'1'"
                v-model="rating"
                @change="checked"
                class="sorting"
            />
            <span>
                <star-rating
                    :inline="true"
                    :increment="1"
                    :read-only="true"
                    :rating="1"
                    :star-size="14"
                    :show-rating="false"
                    :border-width="3"
                    border-color="#666"
                    active-color="gold"
                />
                Or More
            </span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="rating"
                v-bind:value="'2'"
                v-model="rating"
                @change="checked"
                class="sorting"
            />
            <span>
                <star-rating
                    :inline="true"
                    :increment="1"
                    :read-only="true"
                    :rating="2"
                    :star-size="14"
                    :show-rating="false"
                    :border-width="3"
                    border-color="#666"
                    active-color="gold"
                />
                Or More
            </span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="rating"
                v-bind:value="'3'"
                v-model="rating"
                @change="checked"
                class="sorting"
            />
            <span>
                <star-rating
                    :inline="true"
                    :increment="1"
                    :read-only="true"
                    :rating="3"
                    :star-size="14"
                    :show-rating="false"
                    :border-width="3"
                    border-color="#666"
                    active-color="gold"
                />
                Or More
            </span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="rating"
                v-bind:value="'4'"
                v-model="rating"
                @change="checked"
                class="sorting"
            />
            <span>
                <star-rating
                    :inline="true"
                    :increment="1"
                    :read-only="true"
                    :rating="4"
                    :star-size="14"
                    :show-rating="false"
                    :border-width="3"
                    border-color="#666"
                    active-color="gold"
                />
                Or More
            </span>
        </div>
        <div class="checkbox-item">
            <input
                type="radio"
                name="rating"
                v-bind:value="'5'"
                v-model="rating"
                @change="checked"
                class="sorting"
            />
            <span>
                <star-rating
                    :inline="true"
                    :increment="1"
                    :read-only="true"
                    :rating="5"
                    :star-size="14"
                    :show-rating="false"
                    :border-width="3"
                    border-color="#666"
                    active-color="gold"
                />
            </span>
        </div>
    </div>
</template>

<script>

import { mapActions } from 'vuex'
import StarRating from 'vue-star-rating'

    export default {

        components : {
            StarRating,
        },

        data : function() {
            return {
                rating : '',
            }
        },

        methods : {
            ...mapActions(['getProducts']),

            checked() {
                let previousInputs = JSON.parse(sessionStorage.getItem('sortingInputs'))

                previousInputs.sortIndex = true
                previousInputs.sortingInput.rating = this.rating

                sessionStorage.setItem('sortingInputs', JSON.stringify(previousInputs))
                this.getProducts();
            }
        }
    }
</script>
