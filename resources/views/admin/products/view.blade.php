@extends('admin.layouts.app')

@section('content')
@php
    $product = [];
@endphp
  <product-template inline-template>
    <product-form inline-template>
      <div class="add-product">
        <div class="breadcrumb-position">
          <b-breadcrumb>
            <b-breadcrumb-item href="#home">
              <b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true"></b-icon>
              Product
            </b-breadcrumb-item>
            <b-breadcrumb-item href="#foo">View</b-breadcrumb-item>
            <b-breadcrumb-item active>Product 1</b-breadcrumb-item>
          </b-breadcrumb>
        </div>
        <div class="cms-container">
          <div class="cms-container-content">
            <div>
                <b-tabs content-class="mt-3 padding-4em">
                  <b-tab title="Product" :title-item-class="'fnt-1pt6-em'" active>
                      <validation-observer ref="observer">
                          <form id="productForm" method="POST" slot-scope="{ validate }" @submit.prevent="validate().then(validateBeforeSubmit)"
                            @if(isset($product->product_id))
                              action="{{ route('admin.products.update', ['product' => $product->product_id]) }}">
                              @method('PUT')
                            @else
                              action="{{ route('admin.products.store') }}">
                            @endif
                          @csrf

                          <input type="hidden" name="product_id" :value="product.product_id">

                          <div class="row fnt-1pt6-em">
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
                  </b-tab>
                  <b-tab title="Images" :title-item-class="'fnt-1pt6-em'">

                  </b-tab>
                </b-tabs>
            </div>
          </div>

          <script type="application/json" ref="product">
            {!! json_encode($product ?? '') !!}
          </script>
        </div>
      </div>
    </product-form>
  </product-template>
@endsection