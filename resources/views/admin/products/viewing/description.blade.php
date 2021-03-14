<input type="hidden" name="product_id" value="{{ $product->product_id }}">

<div class="row fnt-1pt6-em">
  <div class="col-lg-6">
    <div class="form-group row">
      <label for="name" class="col-sm-12 col-form-label">
          Name
      </label>
      <div class="col-sm-12">
          <input type="text" name="name" value="{{ $product->name }}" class="form-control view-only" disabled>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group row">
      <label for="name" class="col-sm-12 col-form-label">
          Permalink
      </label>
      <div class="col-sm-12">
          <input type="text" name="permalink" value="{{ $product->permalink }}" class="form-control view-only" disabled>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group row">
      <label for="name" class="col-sm-12 col-form-label">
          Price
      </label>
      <div class="col-sm-12">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text view-only" id="basic-addon1">PHP</span>
            </div>

            <input type="text" name="price" value="{{ $product->price }}" class="form-control view-only" disabled>
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
              <input class="form-check-input" disabled type="radio" value="1" name="active" id="active" @if($product->active == 1) {{ 'checked'}} @endif>
              <label class="form-check-label" for="yes">
                Yes
              </label>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="form-check">
              <input class="form-check-input" disabled type="radio" value="0" name="active" id="not_active" @if($product->active == 0) {{ 'checked'}} @endif>
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
        <textarea class="form-control view-only" disabled id="keywords" value="{{ $product->keywords }}" rows="3">{{ $product->keywords }}</textarea>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="form-group row">
      <label for="description" class="col-sm-12 col-form-label">
          Description
      </label>
      <div class="col-sm-12">
          <textarea class="form-control view-only" disabled id="description" value="{{ $product->description }}" rows="3">{{ $product->description }}</textarea>
      </div>
    </div>
  </div>

</div>

<div class="d-flex justify-content-center">
  <div class="form-group">
    <a type="button" class="btn btn-info" href="{{ route('admin.product.edit', ['product' => $product->product_id]) }}">Edit</a>
  </div>
</div>