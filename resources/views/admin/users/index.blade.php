@extends('admin.layouts.app')

@section('content')
<div class="product-form">
    <div class="breadcrumb-position">
      <b-breadcrumb>
        <b-breadcrumb-item href="{{ route('admin.user.index') }}">
          <b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true"></b-icon>
          Users
        </b-breadcrumb-item>
        <b-breadcrumb-item active>Listing</b-breadcrumb-item>
      </b-breadcrumb>
    </div>

    <div class="cms-container">
        <div class="cms-container-content">
            <user-template inline-template>
                <user-index inline-template>
                    <admin-table
                    :fields="{{ $fields }}"
                    :module="'users'"></admin-table>
                </user-index>
            </user-template>
        </div>
    </div>
</div>
@endsection