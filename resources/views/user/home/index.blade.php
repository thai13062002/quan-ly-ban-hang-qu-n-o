@php use App\Helpers\UserHelper; @endphp

@extends('user.layouts.master')

@section('user_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('main.content')
<main class="main">
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($data['banners'] as $result)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-12 col-md-12">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-12 col-md-12">
                                    <div class="banner-img wow fadeIn animated">
                                        <img class="w-100" src="{{$result->image}} " style="object-fit: cover"  alt="" />
                                        <div class="banner-text">
                                            <h1 >{{$result->title}}</h1>
                                            <a class="btn btn-primary" href="{{$result->link}}">{{__('user.label.buyNow')}} <i class="fi-rs-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="slider-arrow hero-slider-1-arrow mt-1"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                @foreach (UserHelper::getBenefits() as $result)
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{$result['image']}}" alt="" />
                            <h4 class="bg-1">{{$result['label']}}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">
                            {{__('user.product.newAdd')}}
                        </button>
                    </li>
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($data['products'] as $result)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('user.product.detail',$result->slug)}}">
                                            <img class="default-img" src="{{$result->image}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <span href="shop.html">{{$result->category->name}}</span>
                                    </div>
                                    <h2>
                                        <a href="{{route('user.product.detail',$result->slug)}}">{{$result->name}}</a>
                                    </h2>
                                    <div class="product-price">
                                        <span>{{ number_format($result->price) }}</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="{{__('user.product.like')}}" class="action-btn hover-up" href="{{route('user.product.detail',$result->slug)}}"><i class="fi-rs-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="user-assets/imgs/banner/banner-4.png" alt="" />
                <div class="banner-text d-md-block d-none">
                    <h1 class="fw-600 mb-20">
                        {{__('user.label.promotionsTitle')}}
                    </h1>
                    <a href="shop.html" class="btn">{{__('user.label.buyNow')}} <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated">
                <span>{{__('user.label.suppliers')}}</span> {{__('user.label.top')}}
            </h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach (UserHelper::getBrands() as $result)
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{$result['image']}}" alt="" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection