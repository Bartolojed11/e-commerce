<div>
  <div class="row fnt-1pt6-em">
    <div class="col-lg-6">
      <div class="form-group row">
        <label for="name" class="col-sm-12 col-form-label">
            Quantity
        </label>
        <div class="col-sm-12">
            <input type="text" name="quantity" class="form-control view-only" disabled value="{{ $inventory->quantity}}">
        </div>
      </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group row">
          <label for="name" class="col-sm-12 col-form-label">
              Low Stock
          </label>
          <div class="col-sm-12">
              <input type="text" name="low_stock" class="form-control view-only" disabled value="{{ $inventory->low_stock }}">
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
                  <input class="form-check-input" type="radio" value="1" name="track_inventory" disabled id="track_inventory" @if($inventory->track_inventory == 1) {{ 'checked'}} @endif>
                  <label class="form-check-label" for="yes">
                    Yes
                  </label>
                </div>
              </div>
              <div class="col-lg-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="0" name="track_inventory" disabled id="no_track_inventory" @if($inventory->track_inventory == 0) {{ 'checked'}} @endif>
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
                  <input class="form-check-input" type="radio" value="1" name="iactive" id="iactive"  disabled @if($inventory->active == 1) {{ 'checked'}} @endif>
                  <label class="form-check-label" for="yes">
                    Yes
                  </label>
                </div>
              </div>
              <div class="col-lg-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="0" name="iactive" id="inot_active"  disabled @if($inventory->active == 0) {{ 'checked'}} @endif>
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
      <a type="button" class="btn btn-info" href="{{ route('admin.product.edit', ['product' => $product->product_id]) }}">Edit</a>
    </div>
  </div>
</div>