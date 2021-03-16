<template>
    <div class="search-box search-box__right">
        <div class="input-group mb-3">
            <input v-model="query" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-primary" v-on:click="setSearchQ()" type="button">Search</button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            query: ''
        }
    },
    methods: {
        setSearchQ: function(keyword) {
            this.$emit('updateSearchQ', this.query)
        }
    }
}
</script>
