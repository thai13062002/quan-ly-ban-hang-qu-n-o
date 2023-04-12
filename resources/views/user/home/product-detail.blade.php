@php use App\Helpers\UserHelper; @endphp

@extends('user.layouts.master')

@section('user_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('main.content')
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ $data['product']['image'] }}" alt="product image">
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                        <div><img src="{{ $data['product']['image'] }}" alt="product image"></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">{{ __('user.label.share') }}</strong></li>
                                        <li class="social-facebook"><a href="#"><img
                                                    src="{{ asset('user-assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img
                                                    src="{{ asset('user-assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img
                                                    src="{{ asset('user-assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                        </li>
                                        <li class="social-linkedin"><a href="#"><img
                                                    src="{{ asset('user-assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <form action="{{route('user.cart.create', ['product' => $data['product']->slug])}}" method="POST" class="detail-info">
                                    @csrf
                                    <h2 class="title-detail">{{ $data['product']['name'] }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> {{ __('user.label.suppliers')}}: <a href="shop.html">{{ $data['product']->supplier->name }}</a></span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">{{ number_format($data['product']['price'], 0, '.', '.') }}</span></ins>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{ $data['product']['description'] }}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i>{{ __('user.benefit.trust')}}</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i>{{ __('user.benefit.revert')}}</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i>{{ __('user.benefit.cashon')}}</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">{{ __('user.label.color')}}</strong>
                                        <select name="color" id="option" data-product-id="{{ $data['product']->id }}">
                                            @foreach ($data['product']->productVariations->unique('color_id') as $item)
                                                <option value="{{ $item->color->id }}">{{ $item->color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <select name="size" id="option-value"></select>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <input value="1" type="number" name="quantity" min="1" max="5">

                                    <div class="detail-extralink">

                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart">{{ __('user.label.addtocart')}}</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </div>
                                </form>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">{{__('user.label.description') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{{ $data['product']['content'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            @foreach ($data['categories'] as $item)
                                <li><a href="shop.html">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">{{__('user.label.fillbyprice') }}</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>{{__('user.label.range') }}:</span><input type="text" id="amount" name="price"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">{{__('user.label.color') }}</label>
                                <div class="custome-checkbox">
                                    @foreach ($data['colors'] as $item)
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>{{ $item->name }}</span></label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>{{__('user.label.fillter') }}</a>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">{{ __('user.product.newAdd')}}</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($data['newproducts'] as $item)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ $item->image }}" alt="">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="product-details.html">{{ $item->name }}</a></h5>
                                    <p class="price mb-0 mt-5">{{ number_format($item->price, 0, '.', '.') }}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="product-details.html">Chen Cardigan</a></h5>
                                <p class="price mb-0 mt-5">$99.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="product-details.html">Chen Sweater</a></h6>
                                <p class="price mb-0 mt-5">$89.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:80%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="product-details.html">Colorful Jacket</a></h6>
                                <p class="price mb-0 mt-5">$25</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:60%"></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#option').change(function() {
                var productId = $(this).data('product-id');
                var colorId = parseInt($(this).val())
                console.log(productId, colorId)
                $.ajax({
                    url: '/colorsize',
                    method: 'GET',
                    data: {
                        // "_token": "{{ csrf_token() }}",
                        'product': productId,
                        'color': colorId
                    },
                    success: function(response) {
                        $('#option-value').html('');
                        $.each(response, function(index, value) {
                            $('#option-value').append('<option value="' + value.size.id + '">' + value.size.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush

