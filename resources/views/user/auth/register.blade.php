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
                    <a href="index.html" rel="nofollow">{{__('user.label.home')}}</a>                    
                    <span></span>{{__('user.action.subscribe')}}
                </div>
            </div>
        </div>
        <section class="pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">{{ __('user.label.register')}}</h3>
                                        </div>                                        
                                        <form method="post" action="{{ route('user.register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="name" placeholder="{{__('user.placeholder.name')}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="{{__('user.placeholder.email')}}">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="{{__('user.placeholder.password')}}">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="confirm_password" placeholder="{{__('user.placeholder.confirmpassword')}}">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">{{__('user.action.subscribe')}}</button>
                                            </div>
                                        </form>                                        
                                        <div class="text-muted text-center">{{__('user.label.haveaccount')}} <a href="{{ route('user.login') }}">{{__('user.action.login')}}</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-6">
                               <img src="{{ asset('user-assets/imgs/login.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection