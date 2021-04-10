@extends('admin.layouts.app')

@section('content')
    <section class="container content-head">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}"><span><i class="fas fa-tshirt"></i></span>Admin</a></li>
            <li class="breadcrumb-item"><a href="#" class="active">{{ isset($admin->admin_id) ? 'Edit' : 'Add' }}</a></li>
        </ol>
        <a type="button" href="{{ route('admin.admin.create') }}" class="btn btn-primary btn-right">Add Admin</a>
    </section>

    <section class="card-wrapper container">
        <div class="card">
          <admin-template inline-template>
            <admin-description inline-template>
              <div class="mt-3 padding-4em">
                <validation-observer ref="observer">
                    <form id="adminDescription" method="POST" slot-scope="{ validate }"
                    @submit.prevent="validate().then(validateBeforeSubmit)" action="{{ route('admin.admin.store') }}">
                    @csrf
            
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-12 col-form-label">
                              Email
                          </label>
                          <div class="col-sm-12">
                            <validation-provider name="email" rules="required" v-slot="{ errors, validate }">
                              <input type="email" name="email" class="form-control" v-model="admin.email">
                              <span class="error__prompt">@{{ errors[0] }}</span>
                            </validation-provider>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-12 col-form-label">
                              First Name
                          </label>
                          <div class="col-sm-12">
                            <validation-provider name="firstname" rules="required" v-slot="{ errors, validate }">
                              <input type="text" name="firstname" class="form-control" v-model="admin.firstname">
                              <span class="error__prompt">@{{ errors[0] }}</span>
                            </validation-provider>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-12 col-form-label">
                              Middle Name
                          </label>
                          <div class="col-sm-12">
                            <validation-provider name="middlename" v-slot="{ errors, validate }">
                                <input type="text" name="middlename" class="form-control" v-model="admin.middlename">
                              <span class="error__prompt">@{{ errors[0] }}</span>
                            </validation-provider>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-12 col-form-label">
                              Last Name
                          </label>
                          <div class="col-sm-12">
                            <validation-provider name="lastname" rules="required" v-slot="{ errors, validate }">
                                <input type="text" name="lastname" class="form-control" v-model="admin.lastname">
                              <span class="error__prompt">@{{ errors[0] }}</span>
                            </validation-provider>
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary">
                          Save                                
                        </button>
                      </div>
                      </form>
                    </validation-observer>

                    <script type="application/json" ref="admin">
                      {!! json_encode($admin ?? '') !!}
                    </script>
                </div>
            </admin-description>
          </admin-template>
        </div>
    </section>
@endsection
