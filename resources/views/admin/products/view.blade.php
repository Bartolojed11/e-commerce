@extends('admin.layouts.app')

@section('content')
<div class="product-form">
  <div class="breadcrumb-position">
    <b-breadcrumb>
      <b-breadcrumb-item href="{{ route('admin.product.index') }}">
        <b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true"></b-icon>
        Product
      </b-breadcrumb-item>
      <b-breadcrumb-item active>{{ $product->name }}</b-breadcrumb-item>
    </b-breadcrumb>
  </div>

  <div class="add-item">
    <a type="button" class="btn btn-primary" href="{{ route('admin.product.create') }}">Add Product</a>
  </div>

  <div class="cms-container">
    <div class="cms-container-content">
      <div>
          <b-tabs content-class="mt-3 padding-4em">
            <b-tab title="Product" :title-item-class="'fnt-1pt6-em'" active>
              @include('admin.products.viewing.description')
            </b-tab>

            <b-tab title="Inventory" :title-item-class="'fnt-1pt6-em'">
              @include('admin.products.viewing.inventory')      
            </b-tab>
            <b-tab title="Images" :title-item-class="'fnt-1pt6-em'">

            </b-tab>
          </b-tabs>
      </div>
    </div>
  </div>
</div>
@endsection