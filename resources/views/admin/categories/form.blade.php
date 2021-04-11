@extends('admin.layouts.app')

@section('content')
    <section class="container content-head">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}"><span><i class="fas fa-tshirt"></i></span>Category</a></li>
            <li class="breadcrumb-item"><a href="#" class="active">{{ isset($category->category_id) ? 'Edit' : 'Add' }}</a></li>
        </ol>
        <a type="button" href="{{ route('admin.category.create') }}" class="btn btn-primary btn-right">Add Category</a>
    </section>

    <section class="card-wrapper container">
        <div class="card">
          <category-template inline-template>
            <category-description inline-template>
              <div class="mt-3 padding-4em">
                <validation-observer ref="observer">
                    <form id="categoryDescription" method="POST" slot-scope="{ validate }"
                    @submit.prevent="validate().then(validateBeforeSubmit)" action="{{ route('admin.category.store') }}">
                    @csrf
            
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-12 col-form-label">
                              Category Name
                          </label>
                          <div class="col-sm-12">
                            <validation-provider name="name" rules="required" v-slot="{ errors, validate }">
                              <input type="text" name="name" class="form-control" v-model="category.name">
                              <span class="error__prompt">@{{ errors[0] }}</span>
                            </validation-provider>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-12 col-form-label">
                              Permalink
                          </label>
                          <div class="col-sm-12">
                            <validation-provider name="permalink" v-slot="{ errors, validate }">
                                <input type="text" name="permalink" class="form-control" v-model="category.permalink">
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

                    <script type="application/json" ref="category">
                      {!! json_encode($category ?? '') !!}
                    </script>
                </div>
            </category-description>
          </category-template>
        </div>
    </section>
@endsection
