@php
    use App\Models\Product;
    use App\Helpers\DataHelper;
@endphp
@extends('admin.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('admin_style')
    @include('admin.includes.datatable.style')
@endsection

@section('admin_content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><span><i
                                            class="bx bxs-home-circle"></i> {{ __('admin.sidebar.dashboard') }}</span></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.product') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">{{ __('admin.sidebar.product') }}</h4>
                            </div>
                        </div>
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.product.title') }}</label>
                                <div class="col-sm-9">
                                    <input name="name_product" type="text"
                                        class="form-control" id="horizontal-firstname-input">
                                    @error('name_product')
                                        <p class="text-danger mt-2">{{ $errors->first('name_product') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.image') }}</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file" class="" id="horizontal-firstname-input">
                                    @error('image')
                                        <p class="text-danger mt-2">{{ $errors->first('image') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.supplier.title') }}</label>
                                <div class="col-sm-9">
                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                        <option value="">{{ __('admin.select_option.supplier') }}</option>
                                        @foreach ($data['supplier'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <p class="text-danger mt-2">{{ $errors->first('supplier_id') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.category.select_option') }}</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">{{ __('admin.select_option.category') }}</option>
                                        {!! DataHelper::dataTree($data['categories_option'], 0, intval(old('cat_id'))) !!}
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger mt-2">{{ $errors->first('category_id') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.description') }}</label>
                                <div class="col-sm-9">
                                    <input name="description" type="text" class="form-control"
                                        id="horizontal-firstname-input">
                                    @error('description')
                                        <p class="text-danger mt-2">{{ $errors->first('description') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.content') }}</label>
                                <div class="col-sm-9">
                                    <input name="content" type="text" class="form-control"
                                        id="horizontal-firstname-input">
                                    @error('name_product')
                                        <p class="text-danger mt-2">{{ $errors->first('content') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.price') }}</label>
                                <div class="col-sm-9">
                                    <input name="price" type="text" class="form-control"
                                        id="horizontal-firstname-input">
                                    @error('price')
                                        <p class="text-danger mt-2">{{ $errors->first('price') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit"
                                            class="btn btn-primary w-md">{{ __('admin.button.create') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection

@section('admin_script')
    @include('admin.includes.datatable.script')
@endsection
