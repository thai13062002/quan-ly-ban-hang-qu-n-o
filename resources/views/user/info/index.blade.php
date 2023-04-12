@extends('user.layouts.master')

@section('user_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('main.content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">{{ __('user.sidebar.home') }}</a>
                    <span></span> {{ __('user.detail.account') }}
                </div>
            </div>
        </div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                                role="tab" aria-controls="orders" aria-selected="false"><i
                                                    class="fi-rs-shopping-bag mr-10"></i>{{ __('user.detail.order') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                                href="#account-detail" role="tab" aria-controls="account-detail"
                                                aria-selected="true"><i class="fi-rs-user mr-10"></i>{{ __('user.detail.account') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="orders" role="tabpanel"
                                        aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">{{ __('user.detail.yourOrder') }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ __('user.detail.orderId') }}</th>
                                                                <th>{{ __('user.detail.date') }}</th>
                                                                <th>{{ __('user.detail.status') }}</th>
                                                                <th>{{ __('user.detail.payment') }}</th>
                                                                <th>{{ __('user.detail.total') }}</th>
                                                                <th>{{ __('user.detail.show') }}</th>
                                                            </tr>
                                                        </thead>
                                                        @if ($data['orders']->count() > 0)
                                                        <tbody>
                                                            @foreach ($data['orders'] as $result)
                                                            <tr>
                                                                <td>{{ $result->id }}</td>
                                                                <td>
                                                                    {{ date('d-m-Y', strtotime($result->created_at)) }}
                                                                </td>
                                                                <td>
                                                                    {{ $result['status'] == 0 ? __('user.detail.success') : __('user.detail.processing') }}
                                                                </td>
                                                                <td class="align-middle">
                                                                    {{ $result->payment == 1 ? __('user.detail.online') : __('user.detail.cod') }}
                                                                </td>
                                                                <td>{{ number_format($result->total) }}</td>
                                                                <td><a href="{{route('user.order.detail',$result->id)}}"
                                                                        class="btn-small d-block">{{ __('user.detail.view') }}</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        @endif
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{ __('user.detail.account') }}</h5>
                                            </div>
                                            <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __('user.label.nameUser') }}</label>
                                                            <input class="form-control square" disabled value="{{$data['user']->name}}" name="dname" type="text">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __('user.label.email') }} </label>
                                                            <input class="form-control square" disabled value="{{$data['user']->email}}" name="email" type="email">
                                                        </div>
                
                                                            <div class="form-group col-md-12">
                                                                <label>{{ __('user.label.phone') }} </label>
                                                                <input class="form-control square" disabled value="{{($data['user']->userAddress) ? $data['user']->userAddress->phone : ''}} " name="phone" type="text">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>{{ __('user.label.address') }} </label>
                                                                <input class="form-control square" disabled value="{{ $data['user']->userAddress ? $data['user']->userAddress->ward->name . ', ' . $data['user']->userAddress->district->name . ', ' . $data['user']->userAddress->province->name : '' }}" name="address" type="text">
                                                            </div>
                                                        
                                                        <div class="col-md-12">
                                                            <a href="{{route('user.edit.info')}}" class="btn btn-fill-out submit">{{__('user.action.update')}}</a>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>   
@endsection
@push('js')
@include('user.includes.loadAddress')
@endpush
