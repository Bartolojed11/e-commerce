'use strict';

import ProductIndex from './ProductIndex.js';
import ProductDescription from './ProductDescription.js';
import ProductInventory from './ProductInventory.js';
import ProductImages from './ProductImage.js';

export default {

    components : {
        'product-index' : ProductIndex,
        'product-description' : ProductDescription,
        'product-inventory' : ProductInventory,
        'product-images' : ProductImages,
    },

    mounted() {
        console.log('Product template mounted');
    }
}