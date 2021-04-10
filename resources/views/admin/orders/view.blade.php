@extends('admin.layouts.app')

@section('content')
    @php
    $tab = isset($tab) ? $tab : '';
    @endphp
    <section class="container content-head">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}"><span><i class="fas fa-tshirt"></i></span>Orders</a></li>
            <li class="breadcrumb-item"><a href="#">View</a></li>
            <li class="breadcrumb-item"><a href="#" class="active">{{ $order->reference_no }}</a></li>
        </ol>
    </section>

    <section class="card-wrapper container">
        <div class="card">
            <div class="row m-bot-15px">
                <div class="col-lg-6">
                  <p class="fnt-25"><strong>Customer Information</strong></p>
                  <p>Fullname:<strong> {{ $order->user->full_name }}</strong></p>
                  <p>Email:<strong> {{ $order->user->email }}</strong></p>
                  <p>Date Registered:<strong> {{ $order->user->created_at }}</strong></p>
                </div>
                <div class="col-lg-6">
                    <p class="fnt-25"><strong>Shipping Address</strong></p>
                    <p>Province:<strong> {{ $order->address->province->name }}</strong></p>
                    <p>City:<strong> {{ $order->address->city->name }}</strong></p>
                    <p>Barangay:<strong> {{ $order->address->brgy->name  }}</strong></p>
                    <p>Additional Address:<strong> {{ $order->address->other_address_info ?? '' }}</strong></p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <p class="fnt-25"><strong>Order Information</strong></p>
                    <div class="row">
                        <div class="col-lg-4">
                            <p>Reference Number:<strong> {{ $order->reference_no }}</strong></p>
                        </div>
                        <div class="col-lg-4">
                            <p>Date Ordered:<strong> {{ $order->created_at }}</strong></p>
                        </div>
                        <div class="col-lg-4">
                            <p>Order Status:<strong>  {{ $order->status->name }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <table class="table table__bordered">
                        <thead class="table__center thead_primary">
                            <tr>
                                <td>Product Name</td>
                                <td>Category</td>
                                <td>Price</td>
                                <td>Quantity</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Category</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
