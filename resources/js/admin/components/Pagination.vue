<template>
<div>
    <div class="vue-pagination"  v-if="allPages > 1">
        <div class="vue-pagination__left pagination-info">
            <span class="v-text-center">Showing {{ from }} - {{ pageDisplay }} of {{ total }}</span>
        </div>
        <div class="vue-pagination__right">
            <ul class="pagination">
                <li class="page-item" :class="page == 1 ? 'isDisabled' : ''">
                    <a class="page-link" href="#" v-on:click="getPage(prev)">Previous</a>
                </li>
                <li class="page-item" v-for="(n, ndx) in pageDisplay">
                    <a v-if="ndx >= (firstIndex - 1)"
                        class="page-link"
                        :class="page == (ndx + 1) ? 'active' : ''"
                        v-on:click="getPage(ndx + 1)" href="#">
                            {{ ndx + 1}}
                    </a>
                </li>
                <li class="page-item" :class="page == allPages ? 'isDisabled' : ''">
                    <a class="page-link" href="#" v-on:click="getPage(next)">Next</a>
                </li>
            </ul>
        </div>
    </div>

    
</div>
</template>

<script>

export default {
    props: ['total', 'allPages', 'maxPagination'],
    data() {
        return {
            page: 1,
            next: 2,
            prev: 1,
            from: 0
        }
    },
    computed: {
        pageDisplay: function(val) {
            let pageDisplay = this.firstIndex + this.maxPagination
            
            if (pageDisplay > this.allPages) {
                return this.allPages
            }

            return pageDisplay
        },
        firstIndex: function() {
            let ndx = Math.floor(this.page / this.maxPagination) * this.maxPagination;

            this.from = (ndx == 0) ? 1 : ndx;

            return ndx;
        },
    },
    watch: {
        page : function(val) {
            this.prev = val - 1
            this.next = val + 1
        },
    },
    methods: {
        getPage: function(page) {
            this.$emit('paginate', page);
            this.page = page;
        }
    }
}
</script>