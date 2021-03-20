'use strict';

import UserIndex from './UserIndex.js';
import UserDescription from './UserDescription.js';

export default {

    components : {
        'user-index' : UserIndex,
        'user-description' : UserDescription
    },

    mounted() {
        console.log('User template mounted');
    }
}