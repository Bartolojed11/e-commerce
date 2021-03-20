'use strict';

import ShippingIndex from './ShippingIndex.js';
import ShippingDescription from './ShippingDescription.js';

export default {

    components : {
        'shipping-index' : ShippingIndex,
        'shipping-description' : ShippingDescription
    },

    mounted() {
        console.log('Shipping template mounted');
    }
}