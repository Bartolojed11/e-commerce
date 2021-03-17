<template>
    <div class="vue-pagination vue-pagination__right"  v-if="allPages > 1">
        <ul class="pagination">
            <li class="page-item" :class="page == 1 ? 'isDisabled' : ''">
                <a class="page-link" href="#" v-on:click="getPage(prev)">Previous</a>
            </li>
            <li class="page-item" v-for="(n, ndx) in allPages">
                <a class="page-link" :class="page == (ndx + 1) ? 'active' : ''" v-on:click="getPage(ndx + 1)" href="#">
                    {{ ndx + 1 }}
                </a>
            </li>
            <li class="page-item" :class="page == allPages ? 'isDisabled' : ''">
                <a class="page-link" href="#" v-on:click="getPage(next)">Next</a>
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    props: ['filtered', 'perPage', 'total', 'allPages'],
    data() {
        return {
            page: 1,
            next: 2,
            prev: 1,
            max: 3
        }
    },
    watch: {
        page : function(val) {
            this.prev = val - 1
            this.next = val + 1
            
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