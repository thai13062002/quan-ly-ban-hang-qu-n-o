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
                    <span></span>{{__('user.action.changepassword')}}
                </div>
            </div>
        </div>
         <section class="pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">{{__('user.action.changepassword')}}</h3>
                                        </div>
                                        <form method="post" action={{ route('user.changePassword') }}>
                                            @csrf
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="{{__('user.placeholder.newpassword')}}">
                                            </div>
                                            @if ($errors->has('password'))
                                                <div class='text-danger mt-1 mb-1'>
                                                    * {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <input type="password" name="confirm_password" placeholder="{{__('user.placeholder.confirmpassword')}}">
                                            </div>
                                            @if ($errors->has('confirm_password'))
                                                <div class='text-danger mt-1 mb-1'>
                                                    * {{ $errors->first('confirm_password') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="changepassword">{{__('user.action.changepassword')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                               <img src="{{asset('user-assets/imgs/login.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection