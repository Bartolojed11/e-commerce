@if(isset($product->product_id))
  <product-template inline-template>
    <product-inventory inline-template>
      <div>
      <validation-observer ref="observer">
        <form id="productInventory" method="POST" slot-scope="{ validate }" @submit.prevent="validate().then(validateBeforeSubmit)"
          @if(isset($product->product_id))
            action="{{ route('admin.product.inventory.update',
            ['product' => $product->product_id,
            'inventory' => $inventory->product_inventory_id
            ]) }}">
            @method('PUT')
          @else
            action="{{ route('admin.product.inventory.store', ['product' => $product->product_id]) }}">
          @endif
        @csrf

        <div class="row fnt-1pt6-em">
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="name" class="col-sm-12 col-form-label">
                    Quantity
                </label>
                <div class="col-sm-12">
                  <validation-provider name="quantity" :rules="{ required : inventory.track_inventory == 1 ? true : false } " v-slot="{ errors, validate }">
                    <input type="text" name="quantity" class="form-control" v-model="inventory.quantity">
                    <span class="error__prompt">@{{ errors[0] }}</span>
                  </validation-provider>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group row">
                  <label for="name" class="col-sm-12 col-form-label">
                      Low Stock
                  </label>
                  <div class="col-sm-12">
                    <validation-provider name="low_stock" v-slot="{ errors, validate }">
                      <input type="text" name="low_stock" class="form-control" v-model="inventory.low_stock">
                      <span class="error__prompt">@{{ errors[0] }}</span>
                    </validation-provider>
                  </div>
                </div>
              </div>


              <div class="col-lg-6">
                <div class="form-group row">
                  <label for="name" class="col-sm-12 col-form-label">
                      Track Inventory
                  </label>
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="1" name="track_inventory" id="track_inventory" v-model="inventory.track_inventory" checked>
                          <label class="form-check-label" for="yes">
                            Yes
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="0" name="track_inventory" id="no_track_inventory" v-model="inventory.track_inventory">
                          <label class="form-check-label" for="no">
                              No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group row">
                  <label for="name" class="col-sm-12 col-form-label">
                      Active
                  </label>
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="1" name="iactive" id="iactive" v-model="inventory.active" checked>
                          <label class="form-check-label" for="yes">
                            Yes
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="0" name="iactive" id="inot_active" v-model="inventory.active">
                          <label class="form-check-label" for="no">
                              No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
        </div>

        <div class="d-flex justify-content-center">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              Save                                
            </button>
          </div>
        </div>

        </form>
      </validation-observer>
      <script type="application/json" ref="inventory">
        {!! json_encode($inventory ?? '') !!}
      </script>
      </div>
    </product-inventory>
  </product-form>
@else
  empty
@endif