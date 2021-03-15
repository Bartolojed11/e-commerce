<template>
    <div>
        <search-box></search-box>
        <table-content :filtered="data" :fields="fields" :actions="actions"></table-content>
        <pagination></pagination>
    </div>
</template>

<script>
import Search from './Search';
import Pagination from './Pagination';
import TableContent from './Table.vue';

export default {
    props: ['data', 'fields', 'actions'],
    mounted() {

    },
    data() {
        return {
            items: {},
            filter: '',
            perPage: '',
            currentPage: '',
            total: '',
            lastPage: '',
        }
    },
    components: {
        'search-box' : Search,
        'pagination' : Pagination,
        'table-content' : TableContent
    },

    methods: {
        getList: function() {
            this.items = [];
        }
    }
}
</script>
