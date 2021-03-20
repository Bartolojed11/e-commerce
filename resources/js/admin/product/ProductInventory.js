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
            Object.assign(this.inventory, JSON.parse(this.$refs.inventory.innerHTML));
        }
    },

    created() {

    },

    data() {
        return {
            inventory : {
                product_id: 0,
                quantity: 0,
                low_stock: 0,
                track_inventory: 1,
                active: 1,
                product_inventory_id: 0
            }
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