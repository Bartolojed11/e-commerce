@extends('admin.layouts.app')

@section('content')
  <section class="container content-head">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><span><i class="fas fa-users"></i></span>Admin</a></li>
      <li class="breadcrumb-item"><a href="#" class="active">Listing</a></li>
    </ol>
    <a type="button" href="{{ route('admin.admin.create') }}" class="btn btn-primary btn-right">Add Admin</a>
  </section>

  <section class="card-wrapper container">
    <div class="card">
      <admin-template inline-template>
          <admin-index inline-template>
              <admin-table
              :fields="{{ $fields }}"
              :module="'admins'"></admin-table>
          </admin-index>
      </admin-template>
    </div>
  </section>
@endsection