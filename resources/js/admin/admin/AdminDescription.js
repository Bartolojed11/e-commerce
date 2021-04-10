'use strict';

import { ValidationProvider, ValidationObserver } from 'vee-validate';
import { extend } from 'vee-validate';

export default {
    components: {
        ValidationProvider,
        ValidationObserver
    },

    mounted() {
        if (JSON.parse(this.$refs.admin.innerHTML)) {
            Object.assign(this.admin, JSON.parse(this.$refs.admin.innerHTML))
        }
    },

    created() {

    },

    data() {
        return {
            admin: {
                email: '',
                firstname: '',
                lastname: '',
                middlename: ''
            }
        }
    },

    methods: {
        validateBeforeSubmit(passed) {
            if (passed) {
                $('#adminDescription').submit();
            }
        }
    }
}