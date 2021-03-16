<template>
    <div>
        <table class="table table__bordered">
            <thead class="table__center">
                <td v-for="header in fields.header">
                    {{ header }}
                </td>
            </thead>
            <tbody>
                <tr v-for="(row, index) in filtered.data">
                   <td v-for="header in fields.header">
                        <span v-if="header != 'actions'">{{ row[header] }}</span>

                        <a v-if="header == 'actions' && row[header]['view'] != null"
                            :href="row[header]['view']" class="btn btn-primary">View</a>
                        
                        <a  v-if="header == 'actions' && row[header]['edit'] != null"
                            :href="row[header]['edit']" class="btn btn-info">Edit</a>
                        
                        <button  v-if="header == 'actions' && row[header]['delete'] != null"
                            class="btn btn-danger">Delete</button>
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    props: ['filtered', 'fields', 'actions'],
    data() {
        return {

        }
    }
}
</script>