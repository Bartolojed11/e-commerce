@extends('admin.layouts.app')

@section('content')
<section class="container content-head">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><span><i class="fas fa-user"></i></span>Users</a></li>
    <li class="breadcrumb-item"><a href="#" class="active">Listing</a></li>
  </ol>
  <a type="button" href="{{ route('admin.user.create') }}" class="btn btn-primary btn-right">Add User</a>
</section>

  <section class="card-wrapper container">
    <div class="card">
      <user-template inline-template>
          <user-index inline-template>
              <admin-table
              :module-key="{{ $key }}"
              :fields="{{ $fields }}"
              :module="'users'"></admin-table>
          </user-index>
      </user-template>
    </div>
  </section>
@endsection