'use strict';

import CategoryIndex from './CategoryIndex.js';
import CategoryDescription from './CategoryDescription.js';

export default {

    components : {
        'category-index' : CategoryIndex,
        'category-description' : CategoryDescription,
    },

    mounted() {
        console.log('Category template mounted');
    }
}