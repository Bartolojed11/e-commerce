@extends('admin.layouts.app')

@section('content')
    @php
    $tab = isset($tab) ? $tab : '';
    @endphp
    <section class="container content-head">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}"><span><i class="fas fa-tshirt"></i></span>Products</a></li>
            <li class="breadcrumb-item"><a href="#">View</a></li>
            <li class="breadcrumb-item"><a href="#" class="active">{{ $product->name }}</a></li>
        </ol>
        <a type="button" href="{{ route('admin.product.create') }}" class="btn btn-primary btn-right">Add Product</a>
    </section>

    <section class="card-wrapper container">
        <div class="card">
          <b-tabs content-class="mt-3 padding-4em">
            <b-tab title="Product" active>
              @include('admin.products.viewing.description')
            </b-tab>

            <b-tab title="Inventory">
              @include('admin.products.viewing.inventory')      
            </b-tab>
            <b-tab title="Images">
              @include('admin.products.viewing.images')    
            </b-tab>
          </b-tabs>
        </div>
    </section>
@endsection
