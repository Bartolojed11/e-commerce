'use strict';

require('./bootstrap');

import ProductTemplate from './product/ProductTemplate.js';
import UserTemplate from './user/UserTemplate.js';
import AdminTemplate from './admin/AdminTemplate.js';
import OrderTemplate from './order/OrderTemplate.js';
import ShippingTemplate from './shipping/ShippingTemplate.js';
import CategoryTemplate from './category/CategoryTemplate.js';


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
        'product-template' : ProductTemplate,
        'user-template' : UserTemplate,
        'admin-template' : AdminTemplate,
        'order-template' : OrderTemplate,
        'shipping-template' : ShippingTemplate,
        'category-template' : CategoryTemplate,
    }
});