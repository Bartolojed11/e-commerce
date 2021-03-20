@extends('admin.layouts.app')

@section('content')
<div class="product-form">
    <div class="breadcrumb-position">
      <b-breadcrumb>
        <b-breadcrumb-item href="{{ route('admin.admin.index') }}">
          <b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true"></b-icon>
          Admin
        </b-breadcrumb-item>
        <b-breadcrumb-item active>Listing</b-breadcrumb-item>
      </b-breadcrumb>
    </div>

    <div class="cms-container">
        <div class="cms-container-content">
            <admin-template inline-template>
                <admin-index inline-template>
                    <admin-table
                    :fields="{{ $fields }}"
                    :module="'admins'"></admin-table>
                </admin-index>
            </admin-template>
        </div>
    </div>
</div>
@endsection