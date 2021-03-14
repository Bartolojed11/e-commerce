'use strict';

import { ValidationProvider, ValidationObserver } from 'vee-validate';
import { extend } from 'vee-validate';

export default {
    components: {
        ValidationProvider,
        ValidationObserver
    },

    mounted() {
        if (JSON.parse(this.$refs.inventory.innerHTML)) {
            this.rotator = JSON.parse(this.$refs.inventory.innerHTML);
        }
    },

    created() {

    },

    data() {
        return {
            product_id: 0,
            quantity: 0,
            low_stock: 0,
            track_inventory: 1,
            active: 1,
        }
    },

    methods: {


        validateBeforeSubmit(passed) {
            if (passed) {
                $('#productInventory').submit();
            }
        }
    }
}