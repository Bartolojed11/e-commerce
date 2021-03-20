'use strict';

import AdminIndex from './AdminIndex.js';
import AdminDescription from './AdminDescription.js';

export default {

    components : {
        'admin-index' : AdminIndex,
        'admin-description' : AdminDescription
    },

    mounted() {
        console.log('admins template mounted');
    }
}