<template>
    <div id="product">
        <div class="row">
            <div class="col-md-4 col-sm-6 product-container mb-5 d-flex flex-column"
            v-for="(product, index) in outputProducts.data" :key="index"
            >
                <img v-bind:src="'./uploads/' + product.image" 
                v-bind:alt="product.brand + ' ' + product.category + ' ' + product.model" class="img-fluid">
                <h5 class="mt-2 text-center">{{ product.brand + ' ' + product.category + ' ' + product.model  }}</h5>
                <div class="price d-flex flex-row justify-content-center mt-2">
                    <p class="mr-4 text-success"><strong>{{ '$ ' + product.discount_price }}</strong></p>
                    <p class="discount" v-if="product.price !== product.discount_price">
                        {{ '$ ' + product.price }}
                    </p>
                </div>
                <span class="mt-2 d-flex justify-content-center">
                    <star-rating 
                        :increment="0.1"
                        :read-only="true"
                        :rating="product.rating"
                        :star-size="14"
                        :show-rating="false"
                        :border-width="3"
                        border-color="#666"
                        active-color="gold"
                    />
                </span>
                <span class="discount-percent" v-if="product.price !== product.discount_price">
                    <p>{{ '-' + product.discount + '%' }}</p>
                </span>
            </div>
        </div>
    </div>
</template>

<script>

    import StarRating from 'vue-star-rating'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        components : {
            StarRating,
        },

        methods : {
            ...mapActions(['getProducts']),
        },

        created() {
            this.getProducts();
        },

        computed : {
            ...mapGetters(['outputProducts'])
        }
    }
</script>