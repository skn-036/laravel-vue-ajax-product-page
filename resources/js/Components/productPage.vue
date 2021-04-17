<template>
    <div>
        <!-- Top Section -->
        <top-section />
        <!-- !Top Section -->

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <section id="sidebar">
                        <!-- brand -->
                        <brand />
                        <!-- !brand -->

                        <!-- Category -->
                        <category />
                        <!-- !Category -->

                        <!-- Price -->
                        <price />
                        <!-- !Price -->

                        <!-- Discount -->
                        <discount />
                        <!-- !Discount -->

                        <!-- Rating -->
                        <rating />
                        <!-- !Rating -->

                        <!-- New Arrival -->
                        <new-arrival />
                        <!-- New Arrival -->
                    </section>
                </div>

                <div class="col-md-9">
                    <!-- Display Product -->
                    <product />
                    <!-- !Display Product -->

                    <!-- Pagination -->                 
                    <pagination-container />
                    <!-- !Pagination --> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import TopSection from './topSection'
    import Product from './product'
    import paginationContainer from './paginationContainer'

    import Brand from './brand'
    import Category from './category'
    import Price from './price'
    import Discount from './discount'
    import Rating from './rating'
    import NewArrival from './newArrival'

    export default {

        components : {
            TopSection,
            Product,
            paginationContainer,
            Brand,
            Category,
            Price,
            Discount,
            Rating,
            NewArrival
        },

        methods : {
            resetSortInputs() {
                window.onunload = function() {
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
                }
            }
        },

        created() {
            this.resetSortInputs()
        }
    }
</script>