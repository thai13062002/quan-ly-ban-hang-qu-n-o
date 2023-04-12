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
                <span></span> {{__('user.sidebar.contact')}}
            </div>
        </div>
    </div>                
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        <h3 class="mb-10 text-center">{{__('user.action.feedback')}}</h3>
                        <form class="contact-form-style text-center" id="contact-form" action="{{route('user.contact.send')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="name" placeholder="{{__('user.label.nameUser')}}" type="text">
                                        @if ($errors->has('name'))
                                            <div class='text-danger'>
                                                * {{ $errors->first('name') }}
                                            </div>
                                        @endif 
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="phone" placeholder="{{__('user.label.phone')}}" type="text">
                                        @if ($errors->has('phone'))
                                            <div class='text-danger'>
                                                * {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea name="content" placeholder="{{__('user.label.feedback')}}"></textarea>
                                        @if ($errors->has('content'))
                                            <div class='text-danger'>
                                                * {{ $errors->first('content') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <button class="submit submit-auto-width" type="submit">{{__('user.label.sendFeedback')}}</button>
                                </div>
                                
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection