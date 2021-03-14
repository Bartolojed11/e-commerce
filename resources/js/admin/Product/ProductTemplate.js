'use strict';

import ProductIndex from './ProductIndex.js';
import ProductDescription from './ProductDescription.js';
import ProductInventory from './ProductInventory.js';

export default {

    components : {
        'product-index' : ProductIndex,
        'product-description' : ProductDescription,
        'product-inventory' : ProductInventory
    },

    mounted() {
        console.log('Product template mounted');
    }
}