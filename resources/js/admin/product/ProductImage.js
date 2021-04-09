'use strict';

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import imgMixin from '../mixins/img';
import DeleteModal from '../components/DeleteModal';

export default {
    data() {
        return {
            productId: 0,
            fileAdded: false,
            dropzoneOptions: {
                acceptedFiles: 'image/*',
                uploadMultiple: true,
                autoProcessQueue: true,
				url: '/index.php/admin/product/image/upload',
                thumbnailWidth: 100,
                thumbnailHeight: 100,
                resizeWidth: 1000,
				dictDefaultMessage: "<i class='bx bx-cloud-upload fs-100 color-primary mb-20 text-dark'></i><span class='text-dark font-weight-bold fs-14 color-black d-block'>Select or Drop photos here.</span>",
				headers:  { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
			},
        }
    },

    mounted() {
        if (JSON.parse(this.$refs.productId.innerHTML)) {
            this.productId = JSON.parse(this.$refs.productId.innerHTML)
        }
    },

    mixins: [imgMixin],

    components: {
        'vue-dropzone': vue2Dropzone,
        ValidationProvider,
        ValidationObserver,
        'delete-modal': DeleteModal
    },

    methods: { 
        sendingEvent (file, xhr, formData) {
            var id = this.productId;
            formData.append('object_id', id);
            console.log("appended")
        }
    },
}