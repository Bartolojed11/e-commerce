'use strict';

require('./bootstrap');

import ProductTemplate from './Product/ProductTemplate.js';


import { extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';

let vm = new Vue({
    el: '#app',
    
    created() {
        extend('required', {
            ...required,
            message: 'The {_field_} is required.'
        })
    },

    components: {
        'product-template' : ProductTemplate
    }
});