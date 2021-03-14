'use strict';

import { ValidationProvider, ValidationObserver } from 'vee-validate';
import { extend } from 'vee-validate';

export default {
    components: {
        ValidationProvider,
        ValidationObserver
    },

    mounted() {
        if (JSON.parse(this.$refs.product.innerHTML)) {
            this.rotator = JSON.parse(this.$refs.product.innerHTML);
        }
    },

    created() {

    },

    data() {
        return {
            product: {
                name: '',
                product_id: 0,
                price: 0,
                description: '',
                keywords: '',
                permalink: '',
                active: 1,
            }
        }
    },

    methods: {
        setPermalink() {

            // Source: https://user-images.githubusercontent.com/3807458/54867887-fa7d1000-4d85-11e9-8fba-23b34bb83fe5.png
            let toKebabCase = str =>
            str &&
            str
            .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
            .map(x => x.toLowerCase())
            .join('-');

            // Removes Space
            if (this.product.name.replace(/ /g,'') != '') {
                this.product.permalink = toKebabCase(this.product.name);
            }
        },

        editProduct() {

        },

        validateBeforeSubmit(passed) {
            if (passed) {
                $('#productDescription').submit();
            }
        }
    }
}