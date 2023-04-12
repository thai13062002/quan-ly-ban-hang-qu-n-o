@php use App\Models\Category;
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.category') }}</li>
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
                                <h4 class="card-title">{{ __('admin.sidebar.category') }}</h4>
                            </div>
                        </div>
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.category.title') }}</label>
                                <div class="col-sm-9">
                                    <input name="name_category" type="text" class="form-control"
                                        id="horizontal-firstname-input">
                                    @error('name_category')
                                        <p class="text-danger mt-2">{{ $errors->first('name_category') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input"
                                    class="col-sm-3 col-form-label">{{ __('admin.label.category.select_option') }}</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" id="category_id" class="form-control">
                                        <option value="">{{ __('admin.select_option.category') }}</option>
                                        {!! DataHelper::dataTree($data['categories_option'], 0, intval(old('cat_id'))) !!}
                                    </select>
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
