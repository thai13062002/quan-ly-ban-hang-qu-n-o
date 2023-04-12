@php use App\Models\Product; @endphp
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
                            <a class="btn btn-primary" href="{{ route('admin.products.create.detail', ['id' => $data['product_parent']]) }}">
                                <i class="mdi mdi-plus me-2"></i> {{ __('admin.action.create') }}
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">{{ __('admin.label.image') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.color') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.size') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.quantity') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['product']->productVariations as $result)
                                    <tr>
                                        <td><img class="image-list-product" src="{{ asset($result['image']) }}"
                                            alt="Ảnh lỗi" width="100" height="100">
                                    </td>
                                        <td class="align-middle">
                                            {{ $result->color->name}}
                                        </td>
                                        <td class="align-middle">
                                            {{ $result->size->name }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $result->quantity }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('admin.products.edit.detail', ['product'=>$data['product_parent'],'id' => $result['id']]) }}"
                                                class="btn btn-primary mr-3" style="margin-right: 10px;"><i
                                                    class="bx bx-pencil"></i></a>
                                            <a href="javascript:void(0)" data-id="{{ $result['id'] }}" data-toggle="modal"
                                                data-message="{{ __('admin.label.confirm_delete') }}"
                                                data-url="{{ route('admin.products.destroy.detail', ['product'=>$data['product_parent'],'id' => $result['id']]) }}"
                                                class="btn btn-danger delete" data-bs-toggle="modal"
                                                data-bs-target=".deleteModal">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
