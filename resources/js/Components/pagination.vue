<template>
    <pagination 
        :data="outputProducts" 
        @pagination-change-page="getProducts"
        :show-disabled="true"
        :limit="2"
    />
</template>

<script>

    import {mapActions, mapGetters} from 'vuex'

    export default {

        methods : {
            ...mapActions(['getProducts'])
        },

        computed : {
            ...mapGetters(['outputProducts'])
        }
    }
</script>