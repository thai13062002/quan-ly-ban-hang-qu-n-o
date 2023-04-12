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
                        <form action="{{ route('admin.products.create.detail', ['id' => $data['product_parent']]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.color') }}</label>
                                <div class="col-sm-9">
                                    <select name="color_id" id="color_id" class="form-control">
                                        <option value="">{{ __('admin.select_option.color') }}</option>
                                        @foreach ($data['colors'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('color_id')
                                        <p class="text-danger mt-2">{{ $errors->first('color_id') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.size') }}</label>
                                <div class="col-sm-9">
                                    <select  name="size_id" id="size_id" class="form-control">
                                        <option value="">{{ __('admin.select_option.size') }}</option>
                                        @foreach ($data['sizes'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id')
                                        <p class="text-danger mt-2">{{ $errors->first('size_id') }}</p>
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
                                    class="col-sm-3 col-form-label">{{ __('admin.label.quantity') }}</label>
                                <div class="col-sm-9">
                                    <input name="quantity" type="number" class="form-control"  step="1"
                                    id="horizontal-firstname-input">
                                    @error('quantity')
                                        <p class="text-danger mt-2">{{ $errors->first('quantity') }}</p>
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
