<product-template inline-template>
    <product-description inline-template>
      <div>
    <validation-observer ref="observer">
        <form id="productDescription" method="POST" slot-scope="{ validate }" @submit.prevent="validate().then(validateBeforeSubmit)"
          @if(isset($product->product_id))
            action="{{ route('admin.product.update', ['product' => $product->product_id]) }}">
            @method('PUT')
          @else
            action="{{ route('admin.product.store') }}">
          @endif
        @csrf

        <input type="hidden" name="product_id" :value="product.product_id">

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group row">
              <label for="name" class="col-sm-12 col-form-label">
                  Name
              </label>
              <div class="col-sm-12">
                <validation-provider name="name" rules="required" v-slot="{ errors, validate }">
                  <input type="text" name="name" v-on:keyup="setPermalink" class="form-control" v-model="product.name">
                  <span class="error__prompt">@{{ errors[0] }}</span>
                </validation-provider>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group row">
              <label for="name" class="col-sm-12 col-form-label">
                  Permalink
              </label>
              <div class="col-sm-12">
                <validation-provider name="permalink" rules="required" v-slot="{ errors, validate }">
                  <input type="text" name="permalink" class="form-control" v-model="product.permalink">
                  <span class="error__prompt">@{{ errors[0] }}</span>
                </validation-provider>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group row">
              <label for="name" class="col-sm-12 col-form-label">
                  Price
              </label>
              <div class="col-sm-12">
                <validation-provider name="price" rules="required" v-slot="{ errors, validate }">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">PHP</span>
                    </div>

                    <input type="text" name="price" class="form-control" v-model="product.price">
                  </div>
                 
                  <span class="error__prompt">@{{ errors[0] }}</span>
                </validation-provider>
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
                      <input class="form-check-input" type="radio" value="1" name="active" id="active" v-model="product.active" checked>
                      <label class="form-check-label" for="yes">
                        Yes
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" value="0" name="active" id="not_active" v-model="product.active">
                      <label class="form-check-label" for="no">
                         No
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12">
            <div class="form-group row">
              <label for="keywords" class="col-sm-12 col-form-label">
                  Keywords
              </label>
              <div class="col-sm-12">
                <validation-provider name="keywords" v-slot="{ errors, validate }">
                  <textarea class="form-control" id="keywords" v-model="product.keywords" rows="3"></textarea>
                  <span class="error__prompt">@{{ errors[0] }}</span>
                </validation-provider>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group row">
              <label for="description" class="col-sm-12 col-form-label">
                  Description
              </label>
              <div class="col-sm-12">
                <validation-provider name="description" v-slot="{ errors, validate }">
                  <textarea class="form-control" id="description" v-model="product.description" rows="3"></textarea>
                  <span class="error__prompt">@{{ errors[0] }}</span>
                </validation-provider>
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
    <script type="application/json" ref="product">
      {!! json_encode($product ?? '') !!}
    </script>
    </div>
</product-description>
</product-template>