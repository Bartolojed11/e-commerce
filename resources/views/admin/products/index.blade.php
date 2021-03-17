@extends('admin.layouts.app')

@section('content')
<div class="product-form">
    <div class="breadcrumb-position">
      <b-breadcrumb>
        <b-breadcrumb-item href="{{ route('admin.product.index') }}">
          <b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true"></b-icon>
          Product
        </b-breadcrumb-item>
        <b-breadcrumb-item active>Listing</b-breadcrumb-item>
      </b-breadcrumb>
    </div>

    <div class="add-item">
        <a type="button" class="btn btn-primary" href="{{ route('admin.product.create') }}">Add Product</a>
    </div>

    <div class="cms-container">
        <div class="cms-container-content">
            <product-template inline-template>
              <product-index inline-template>
                  <admin-table
                  :fields="{{ $fields }}"
                  :module="'product'"></admin-table>
              </product-index>
          </product-template>
        </div>
    </div>
</div>
@endsection