@extends('admin.layouts.app')

@section('content')
  <section class="container content-head">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><span><i class="fas fa-users"></i></span>Category</a></li>
      <li class="breadcrumb-item"><a href="#" class="active">Listing</a></li>
    </ol>
    <a type="button" href="{{ route('admin.category.create') }}" class="btn btn-primary btn-right">Add Category</a>
  </section>

  <section class="card-wrapper container">
    <div class="card">
      <category-template inline-template>
          <category-index inline-template>
              <admin-table
              :module-key="{{ $key }}"
              :fields="{{ $fields }}"
              :module="'categories'"></admin-table>
          </category-index>
      </category-template>
    </div>
  </section>
@endsection