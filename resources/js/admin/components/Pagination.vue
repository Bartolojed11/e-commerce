<template>
    <div class="vue-pagination vue-pagination__right">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" v-on:click="getPage(1)" href="#">1</a></li>
            <li class="page-item"><a class="page-link" v-on:click="getPage(2)" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</template>

<script>

export default {
    props: ['filtered', 'links'],
    data() {
        return {
            page: 1
        }
    },
    methods: {
        getPage: function(page) {
            this.$emit('paginate', page);
            this.page = page;
        }
    }
}
</script>