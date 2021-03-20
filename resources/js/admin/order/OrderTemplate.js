'use strict';

import OrderIndex from './OrderIndex.js';
import OrderDescription from './OrderDescription.js';

export default {

    components : {
        'order-index' : OrderIndex,
        'order-description' : OrderDescription,
    },

    mounted() {
        console.log('Order template mounted');
    }
}