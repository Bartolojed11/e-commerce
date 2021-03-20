'use strict';

import Datatable from '../components/DataTable';

export default {

    components: {
        'admin-table' : Datatable
    },

    mounted() {
        console.log("UserIndex.js mounted")
    }
}