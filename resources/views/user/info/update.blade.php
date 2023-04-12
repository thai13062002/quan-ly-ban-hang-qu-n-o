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
                            <div class="col-md-9">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="account-update" role="tabpanel" aria-labelledby="account-update">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{ __('user.detail.account') }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{route('user.update.info')}}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __('user.label.nameUser') }} <span class="required">*</span></label>
                                                            <input class="form-control square" value="{{$data['user']->name}}" name="name" type="text">
                                                        </div>
                                                        @if ($errors->has('name'))
                                                            <div class='text-danger mb-1'>
                                                            * {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __('user.label.email') }} <span class="required">*</span> </label>
                                                            <input class="form-control square" value="{{$data['user']->email}}" name="email">
                                                        </div>
                                                        @if ($errors->has('email'))
                                                            <div class='text-danger mb-1'>
                                                            * {{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __('user.label.phone') }} <span class="required">*</span> </label>
                                                            <input class="form-control square" value="{{ $data['user']->userAddress ? $data['user']->userAddress->phone : ''}}" name="phone" type="text">
                                                        </div>
                                                        @if ($errors->has('phone'))
                                                            <div class='text-danger mb-1'>
                                                            * {{ $errors->first('phone') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-group col-md-12">
                                                            <label>{{ __('user.label.address') }} <span class="required">*</span> </label>
                                                            <select class="form-select form-select-sm mt-1" name="provinces" id="provinces">
                                                                <option value="{{$data['user']->userAddress ? $data['user']->userAddress->province_id : ''}}">{{ $data['user']->userAddress ? $data['user']->userAddress->province->name : ''}}</option>
                                                            </select>
                                                            @if ($errors->has('provinces'))
                                                                <div class='text-danger mb-1'>
                                                                * {{ $errors->first('provinces') }}
                                                            </div>
                                                            @endif
                                                            <select class="form-select form-select-sm mt-1" name="districts" id="districts">
                                                                <option value="{{$data['user']->userAddress ? $data['user']->userAddress->district_id : ''}}">{{ $data['user']->userAddress ? $data['user']->userAddress->district->name : ''}}</option>
                                                            </select>
                                                            @if ($errors->has('districts'))
                                                                <div class='text-danger mb-1'>
                                                                * {{ $errors->first('districts') }}
                                                            </div>
                                                            @endif
                                                            <select class="form-select form-select-sm mt-1" name="wards" id="wards">
                                                                <option value="{{$data['user']->userAddress ? $data['user']->userAddress->ward_id : ''}}">{{ $data['user']->userAddress ? $data['user']->userAddress->ward->name : ''}}</option>
                                                            </select>
                                                            @if ($errors->has('wards'))
                                                                <div class='text-danger mb-1'>
                                                                * {{ $errors->first('wards') }}
                                                            </div>
                                                            @endif 
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit">{{__('user.action.update')}}</button>
                                                        </div>
                                                    </div>
                                                </form>
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
