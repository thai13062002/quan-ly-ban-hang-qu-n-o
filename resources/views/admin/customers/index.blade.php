@php use App\Models\User; @endphp
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.customer') }}</li>
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
                                <h4 class="card-title">{{ __('admin.sidebar.customer') }}</h4>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.export.customers') }}">
                                <i class="bx bx-export"></i> {{ __('admin.action.export') }}
                            </a>
                        </div>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">{{ __('admin.label.customer.name') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.phone') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.email') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.address') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['customers'] as $result)
                                    <tr>
                                        <td class="align-middle">{{ $result['name'] }}</td>
                                        <td class="align-middle">{{ $result->userAddress ? $result->userAddress->phone : '' }}</td>
                                        <td class="align-middle">{{ $result->email}}</td>
                                        <td class="align-middle">{{ $result->userAddress ? ($result->userAddress->ward->name . ', ' . $result->userAddress->district->name . ', ' . $result->userAddress->province->name) : '' }}</td>
                                        <td class="text-center align-middle">
                                            <a href="javascript:void(0)" data-id="{{ $result['id'] }}"
                                                data-message="{{ __('admin.label.confirm_delete') }}"
                                                data-url="{{ route('admin.customers.destroy', $result['id']) }}"
                                                class="btn btn-danger delete" data-bs-toggle="modal"
                                                data-bs-target=".deleteModal"><i class="bx bx-trash"></i></a>
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
