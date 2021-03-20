<template>
    <div>
        <search-box
            @updateSearchQ="setSearchQ($event)"
        ></search-box>
        <table-content :filtered="items" :fields="fields"></table-content>
        <pagination
            :total="total"
            :allPages="allPages"
            :maxPagination="maxPagination"
            @paginate="setCurrentPage($event)"></pagination>
    </div>
</template>

<script>
import Search from './Search';
import Pagination from './Pagination';
import TableContent from './Table.vue';

export default {
    props: ['module', 'fields'],
    created() {
        this.getList()
    },
    data() {
        return {
            items: {},
            perPage: '',
            total: '',
            page: 1,
            searchQ: '',
            allPages: 1,
            maxPagination: 3
        }
    },
    components: {
        'search-box' : Search,
        'pagination' : Pagination,
        'table-content' : TableContent
    },

    methods: {

        getList: function() {
            let self = this
            let baseUrl = `${this.module}/list/get?`
            let page = `page=${this.page}`
            let searchParam = '&searchQ='
            let requestUrl = baseUrl + page + '&fields=' + this.fields.columns

            if (this.searchQ != '') {
               requestUrl = requestUrl + searchParam + this.searchQ
            }

            axios.get(requestUrl).then(({ data }) => (
                this.items = data[this.module],
                this.allPages = data.allPages,
                this.perPage = data.perPage,
                this.total = data.total
            ));
        },
        
        setCurrentPage: function(page) {
            this.page = page;
            this.getList();
        },

        setSearchQ: function(searchQ) {
            this.searchQ = searchQ;
            this.getList();
        }

    }
}
</script>
