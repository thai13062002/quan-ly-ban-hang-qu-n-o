@extends('user.layouts.master')

@section('user_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('main.content')
<main class="main single-page">
  <div class="page-header breadcrumb-wrap">
      <div class="container">
          <div class="breadcrumb">
              <a href="index.html" rel="nofollow">{{__('user.label.home')}}</a>                    
              <span></span> {{__('user.label.about')}}
          </div>
      </div>
  </div>
  <section class="section-padding">
      <div class="container pt-25">
          <div class="row">
              <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                  <h2 class="mt-0 mb-15 text-uppercase text-brand wow fadeIn animated">{{__('user.about.title')}}</h2>
                  <p>{{__('user.about.desciption')}}</p>
              </div>
              <div class="col-lg-6">
                  <img src="user-assets/imgs/page/about-1.png" alt="">
              </div>
          </div>
      </div>
  </section>                
</main>
@endsection