@extends('admin.layouts.app')

@section('content')
    @php
    $tab = isset($tab) ? $tab : '';
    @endphp
    <section class="container content-head">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}"><span><i class="fas fa-tshirt"></i></span>Products</a></li>
            <li class="breadcrumb-item"><a href="#" class="active">{{ isset($product->product_id) ? 'Edit' : 'Add' }}</a></li>
        </ol>
        <a type="button" href="{{ route('admin.product.create') }}" class="btn btn-primary btn-right">Add Product</a>
    </section>

    <section class="card-wrapper container">
        <div class="card">
            <b-tabs content-class="mt-3 padding-4em">
                <b-tab title="Product" {{ $tab == '' ? 'active' : '' }}>
                    @include('admin.products.form.description')
                </b-tab>

                <b-tab title="Inventory"
                    {{ $tab == 'inventory' ? 'active' : '' }} @if (!isset($product)) {{ 'disabled' }} @endif>
                    @include('admin.products.form.inventory')
                </b-tab>
                <b-tab title="Images" {{ $tab == 'images' ? 'active' : '' }} @if (!isset($product)) {{ 'disabled' }} @endif>

                </b-tab>
            </b-tabs>
        </div>
    </section>
@endsection
