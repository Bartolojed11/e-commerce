<template>
    <div>
        <search-box
            @updateSearchQ="setSearchQ($event)"
        ></search-box>
        <table-content :filtered="data" :fields="fields" :actions="actions"></table-content>
        <pagination 
            :filtered="data"
            :links="links"
            @paginate="setCurrentPage($event)"></pagination>
    </div>
</template>

<script>
import Search from './Search';
import Pagination from './Pagination';
import TableContent from './Table.vue';

export default {
    props: ['data', 'fields', 'actions', 'links'],
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
            page: 1,
            searchQ: ''
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
        },
        
        setCurrentPage: function(page) {
            this.page = page;
        },

        setSearchQ: function(searchQ) {
            this.searchQ = searchQ;
        }

    }
}
</script>
