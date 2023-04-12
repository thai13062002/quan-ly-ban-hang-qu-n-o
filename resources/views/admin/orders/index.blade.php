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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.order') }}</li>
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
                                <h4 class="card-title">{{ __('admin.sidebar.order') }}</h4>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.export.orders') }}">
                                <i class="bx bx-export"></i> {{ __('admin.action.export') }}
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">{{ __('admin.label.order.id') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.order.customer') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.order.date') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.total') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.address') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.payment') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.detail') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['orders'] as $result)
                                    <tr>
                                        <td class="align-middle">{{ $result['id'] }}</td>
                                        <td class="align-middle">{{ $result->user->name }}</td>
                                        <td class="align-middle">{{ date('d-m-Y', strtotime($result->created_at)) }}</td>
                                        <td class="align-middle">{{ number_format($result->total) }}</td>
                                        <td class="align-middle">{{ $result->user->userAddress->ward->name . ', ' . $result->user->userAddress->district->name . ', ' . $result->user->userAddress->province->name }}</td>
                                        <td class="align-middle">{{ $result->payment == 1 ? __('admin.label.order.online')  : __('admin.label.order.cod')  }}</td>
                                        <td class="align-middle">
                                            <a href="{{route('admin.orders.show',$result['id'])}}" type="button" class="btn btn-primary btn-sm btn-rounded">
                                                {{ __('admin.label.detail') }}
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
