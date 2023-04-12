@php use App\Models\Supplier; @endphp
@extends('admin.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
    <link rel="stylesheet" href="{{ asset('admin-assets\css\banner\banner.css') }}">
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.supplier') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                <div class="bank-inner-details">
                    <div class="row">
                        <form action="{{ route('admin.suppliers.update', $data['supplier']->id) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="option-blog">
                                <div class="type-blog">
                                    <div class="form-group mb-4">
                                        <label class="control-label" for="subject">
                                            <h6> {{ __('admin.label.supplier.name') }} <span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="{{ __('admin.placeholder.supplier.name') }}" name="name"
                                                value="{{ $data['supplier']->name }}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <label class="control-labe mt-4" for="subject">
                                            <h6> {{ __('admin.label.supplier.phone') }}<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="phone"
                                                placeholder="{{ __('admin.placeholder.supplier.phone') }}" name="phone"
                                                value="{{ $data['supplier']->phone }}">
                                        </div>
                                        @if ($errors->has('phone'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                        <label class="control-label mt-4" for="subject">
                                            <h6>{{ __('admin.label.supplier.email') }} <span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="email"
                                                placeholder="{{ __('admin.placeholder.supplier.email') }}" name="email"
                                                value="{{ $data['supplier']->email }}">
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        <label class="control-label mt-4" for="subject">
                                            <h6>{{ __('admin.label.supplier.address') }} <span class="required">*</span>
                                            </h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="address"
                                                placeholder="{{ __('admin.placeholder.supplier.address') }}" name="address"
                                                value="{{ $data['supplier']->address }}">
                                        </div>
                                        @if ($errors->has('address'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                        <label class="control-label mt-4" for="subject">
                                            <h6>{{ __('admin.label.status.title') }} <span class="required">*</span>
                                            </h6>
                                        </label>
                                        <div class="container">
                                            <label class="switch" for="checkbox">
                                                <input type="checkbox" id="checkbox" name="status"
                                                    {{ $data['supplier']->status == Supplier::STATUS_ACTIVE ? 'checked' : '' }} />
                                                <div class="slider round"></div>
                                            </label>
                                        </div>
                                        <!-- Error -->
                                    </div>
                                </div>

                            </div>
                            <div class="form-group ">
                                <div class="col-sm-offset-2 btn-submit">
                                    <button type="submit"
                                        class="btn btn-primary">{{ __('admin.button.edit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

@section('admin_script')
    @include('admin.includes.datatable.script')
@endsection
