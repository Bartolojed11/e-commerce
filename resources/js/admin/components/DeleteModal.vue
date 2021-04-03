<template>
<div  style="display: inline">
  <button class="btn btn-danger" @click="deleteData(itemId)">Delete {{ itemId }}</button>
  <div class="modal-wrapper" v-if="showDelete">
      <div class="modal-transparent"></div>
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header modal-danger">
                    <p>Modal Header</p>
                    <button class="btn btn-danger btn-close"  @click="cancelDelete">
                      <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger">Yes</button>
                    <button class="btn btn-info" @click="cancelDelete">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

export default {
    props: ['itemId'],
    data() {
        return {
            showDelete: 0
        }
    },
    methods: {
      deleteData: function(id) {
        this.showDelete = true
        document.querySelector('body').style.overflow = "hidden"
      },
      cancelDelete: function() {
        this.showDelete = false 
        document.querySelector('body').style.overflow = "auto"
      }
    }
}
</script>
