@extends('admin.layouts.app')

@section('content')
<section class="container content-head">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><span><i class="fas fa-tshirt"></i></span>Products</a></li>
      <li class="breadcrumb-item"><a href="#" class="active">Listing</a></li>
    </ol>
    <a type="button" href="{{ route('admin.product.create') }}" class="btn btn-primary btn-right">Add Product</a>
</section>

<section class="card-wrapper container">
  <div class="card">
    <product-template inline-template>
        <product-index inline-template>
            <admin-table
            :module-key="{{ $key }}"
            :fields="{{ $fields }}"
            :module="'products'"></admin-table>
        </product-index>
    </product-template>
  </div>
</section>
@endsection