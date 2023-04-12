@php use App\Models\Banner; @endphp
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.banner') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="bank-inner-details">
                    <div class="row">
                        <form action="{{ route('admin.banners.update', $data['banner']->id) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="option-blog">
                                <div class="blog-image">
                                    <input type="file" name="image" id="file" hidden
                                        src="{{ asset($data['banner']->image) }}">
                                    <div class="img-area">
                                        <i class='bx bxs-cloud-upload icon'></i>
                                        <h3>Tải ảnh lên</h3>
                                        <p>Dung lượng của ảnh không vượt quá <span>2MB</span></p>
                                    </div>
                                    <button class="select-image btn btn-primary" type="button">Chọn
                                        banner</button>
                                    <!-- Error -->
                                    @if ($errors->has('image'))
                                        <div class='text-danger mt-2'>
                                            * {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="type-blog">
                                    <div class="form-group mb-4">
                                        <label class="control-label col-sm-2" for="subject">
                                            <h6>{{__('admin.label.title')}}<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="{{ __('admin.placeholder.banner.title') }}" name="title"
                                                value="{{ $data['banner']->title }}">
                                        </div>
                                        @if ($errors->has('title'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <label class="control-label col-sm-2" for="subject">
                                            <h6>{{__('admin.label.link')}} <span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="{{ __('admin.placeholder.banner.title') }}" name="link"
                                                value="{{ $data['banner']->link }}">
                                        </div>
                                        @if ($errors->has('link'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('link') }}
                                            </div>
                                        @endif
                                        <label class="control-label col-sm-2" for="subject">
                                            <h6>{{__('admin.label.status.title')}}<span class="required">*</span></h6>
                                        </label>
                                        <div class="container">
                                            <label class="switch" for="checkbox">
                                                <input type="checkbox" id="checkbox" name="status"
                                                    {{ $data['banner']->status == Banner::STATUS_ACTIVE ? 'checked' : '' }} />
                                                <div class="slider round"></div>
                                            </label>
                                        </div>
                                        <!-- Error -->
                                    </div>
                                </div>

                            </div>
                            <div class="form-group ">
                                <div class="col-sm-offset-2 btn-submit">
                                    <button type="submit" class="btn btn-primary">{{__('admin.button.banner.edit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('admin.includes.upload')
@endsection

@section('admin_script')
    @include('admin.includes.datatable.script')
@endsection
