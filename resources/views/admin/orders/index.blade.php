@extends('admin.layouts.app')

@section('content')
<div class="product-form">
    <div class="breadcrumb-position">
      <b-breadcrumb>
        <b-breadcrumb-item href="{{ route('admin.product.index') }}">
          <b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true"></b-icon>
          Order
        </b-breadcrumb-item>
        <b-breadcrumb-item active>Listing</b-breadcrumb-item>
      </b-breadcrumb>
    </div>

    <div class="cms-container">
        <div class="cms-container-content">
            <table class="table table__bordered" style="display: none;">
                <thead class="table__center">
                    <td>Product Id</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Product 1</td>
                        <td>100</td>
                        <td class="table__center">
                            <a href="#" class="btn btn-primary">View</a>
                            <a href="#" class="btn btn-gray-i">Edit</a>
                            <button href="#" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Product 1</td>
                        <td>100</td>
                        <td class="table__center">
                            <a href="#" class="btn btn-primary">View</a>
                            <a href="#" class="btn btn-gray-i">Edit</a>
                            <button href="#" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection