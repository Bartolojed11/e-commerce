<template>
    <div>
        <table class="table table__bordered">
            <thead class="table__center">
                <td v-for="header in fields.header">
                    {{ header }}
                </td>
            </thead>
            <tbody>
                <tr v-for="(row, index) in filtered">
                   <td v-for="column in fields.columns">
                        <span v-if="column != 'actions'">{{ row[column] }}</span>
                        <a v-if="column == 'actions' && row[column]['view'] != null"
                            :href="row[column]['view']" class="btn btn-primary">View</a>
                        
                        <a  v-if="column == 'actions' && row[column]['edit'] != null"
                            :href="row[column]['edit']" class="btn btn-info">Edit</a>
                        
                        <button  v-if="column == 'actions' && row[column]['delete'] != null"
                            class="btn btn-danger">Delete</button>
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    props: ['filtered', 'fields'],
    data() {
        return {

        }
    }
}
</script>