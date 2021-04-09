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
                        <span v-if="column != 'actions'">{{ getPropertyValue(column, row) }}</span>
                        <a v-if="column == 'actions' && row[column]['show'] != null"
                            :href="row[column]['show']" class="btn btn-primary">View</a>
                        
                        <a  v-if="column == 'actions' && row[column]['edit'] != null"
                            :href="row[column]['edit']" class="btn btn-info">Edit</a>
                        
                        <delete-modal
                            v-if="column == 'actions' && row[column]['destroy'] != null"
                            :itemId="row[mkey]"
                            :route="row[column]['delete']">
                                <template v-slot:btn-slot>
                                Delete
                                </template>
                            </delete-modal>
                   </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
import DeleteModal from './DeleteModal.vue';

export default {
    props: ['filtered', 'fields', 'mkey'],
    data() {
        return {
            delete: 0
        }
    },
    components: {
        'delete-modal' : DeleteModal
    },
    methods: {
        setColVal(row, column) {
            return _.get(row, column )

            return column.values(ndx);
        },
        getPropertyValue(path, obj, separator='.') {
            var properties = Array.isArray(path) ? path : path.split(separator)
            return properties.reduce((prev, curr) => prev && prev[curr], obj)
        },

        showDelete: function(event) {
            console.table(event)
            // this.delete = show;
        },

    }
}
</script>