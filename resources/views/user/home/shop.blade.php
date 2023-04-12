@php use App\Helpers\UserHelper; @endphp

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
                <a href="index.html" rel="nofollow">{{__('user.sidebar.home')}}</a>
                <span></span> {{__('user.sidebar.product')}}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row product-grid-3 products">

                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <div class="col-12 pb-1" id="pagination">

                    </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">{{__('user.sidebar.category')}}</h5>
                        <ul class="categories">
                            @foreach ($data['categories'] as $result)
                                <li><a href="shop.html">{{$result->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-700">{{__('user.sidebar.category')}}</label>
                                <div class="custome-checkbox">
                                    @foreach ($data['categories'] as $result)
                                        <input class="form-check-input category" type="checkbox" name="category_id" id="category_{{$result->id}}" value="{{$result->id}}">
                                        <label class="form-check-label" for="category_{{$result->id}}"><span>{{$result->name}}</span></label>
                                        <br>
                                    @endforeach

                                </div>
                                <label class="fw-700 mt-15">{{__('user.label.suppliers')}}</label>
                                <div class="custome-checkbox">
                                    @foreach ($data['suppliers'] as $result)
                                        <input class="form-check-input supplier" type="checkbox" value="{{$result->id}}" name="supplier_id" id="supplier_{{$result->id}}">
                                        <label class="form-check-label" for="supplier_{{$result->id}}"><span>{{$result->name}}</span></label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Sản phẩm mới</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($data['newProducts'] as $result)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{$result->image}}" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{route('user.product.detail',$result->slug)}}">{{$result->name}}</a></h5>
                                <p class="price mb-0 mt-5">{{ number_format($result->price) }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
    @include('user.includes.filterProduct')
    @endpush
</main
@endsection
