@extends('admin.layouts.app')

@section('content')
<section class="container content-head">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><span><i class="fas fa-gift"></i></span>Orders</a></li>
    <li class="breadcrumb-item"><a href="#" class="active">Listing</a></li>
  </ol>
  {{-- <a type="button" href="{{ route('admin.order.create') }}" class="btn btn-primary btn-right">Add Order</a> --}}
</section>

<section class="card-wrapper container">
  <div class="card">
    <order-template inline-template>
        <order-index inline-template>
            <admin-table
            :fields="{{ $fields }}"
            :module="'orders'"></admin-table>
        </order-index>
    </order-template>
  </div>
</section>
@endsection