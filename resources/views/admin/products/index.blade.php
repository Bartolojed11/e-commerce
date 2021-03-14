@extends('admin.layouts.app')

@section('content')
    <div class="breadcrumbs">
        <a href="#">Products</a><span>></span><a href="#">Listing</a>
    </div>

    <div class="container">
        <div class="container-content">
            <table class="table table__bordered">
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
@endsection