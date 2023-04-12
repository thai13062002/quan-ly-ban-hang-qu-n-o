@php use App\Models\Order; @endphp
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.label.order.detail') }}</li>
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
                                <h4 class="card-title">{{ __('admin.label.order.detail') }}</h4>
                            </div>
                        </div>
                        <p class="mb-2">{{ __('admin.label.order.id') }}: <span class="text-primary">#SK{{ $data['order']->id }}</span>
                        </p>
                        <p class="mb-4">{{ __('admin.label.order.customer') }}: <span class="text-primary">{{ $data['order']->user->name }}</span>
                        </p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center align-middle">{{ __('admin.label.product.name') }}</th> --}}
                                    <th class="text-center align-middle">{{ __('admin.label.color') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.size') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.quantity') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.total') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['order']->orderDetails as $orderProduct)
                                <tr>

                                    <td class="align-middle">{{ $orderProduct->productVariation->product->name }}</td>
                                    <td class="align-middle">{{ $orderProduct->productVariation->color->name }}</td>
                                    <td class="align-middle">{{ $orderProduct->productVariation->size->name }}</td>
                                    <td class="align-middle">{{ $orderProduct->quantity }}</td>
                                    <td class="align-middle">{{ number_format($orderProduct->amount) }}</td>
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
