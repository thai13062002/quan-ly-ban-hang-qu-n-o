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
                    <a href="{{ route('user.home') }}" rel="nofollow">Home</a>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading cart-row">
                                        <th scope="col">{{ __('user.label.image') }}</th>
                                        <th scope="col">{{ __('user.label.product') }}</th>
                                        <th scope="col">{{ __('user.label.color') }}</th>
                                         <th scope="col">{{ __('user.label.size.name') }}</th>
                                        <th class="cart-price" scope="col">{{ __('user.label.price') }}</th>
                                        <th scope="col">{{ __('user.label.quantity') }}</th>
                                        <th scope="col">{{ __('user.action.delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($data['cart'] as $result)
                                        <tr class="cart-row cart-item">
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset($result->productVariation->product->image) }}"
                                                    alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a
                                                        href="#">{{ $result->productVariation->product->name }}</a>
                                                </h5>
                                            </td>
                                            <td class="color" data-title="Color">
                                                <span>{{ $result->productVariation->color->name }} </span>
                                            </td>
                                            <td class="size" data-title="Size">
                                                <span>{{ $result->productVariation->size->name }} </span>
                                            </td>
                                            <td class="" data-title="Price">
                                                <span
                                                    class="cart-price  price">{{ $result->productVariation->product->price }}
                                                </span>
                                            </td>

                                            <td class="text-center" data-title="Stock">
                                                <div class="detail-qty border radius  m-auto quantity">
                                                    <a href="#" class="qty-down"><i
                                                            class="fi-rs-angle-small-down quantityup"></i></a>
                                                    <span id=""
                                                        class="qty-val quantity-value">{{ $result->quantity }}</span>
                                                    <a href="#" class="qty-up"><i
                                                            class="fi-rs-angle-small-up quantityup"></i></a>
                                                </div>
                                            </td>

                                            <td class="action" data-title="Remove">
                                                <form action="{{ route('user.cart.destroyProduct', ['id' => $result->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-muted"><i class="fi-rs-trash"
                                                            style="color: white"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>{{ __('user.cart.pay') }}</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">{{ __('user.cart.total') }}</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand cart-total-price total-price"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">{{ __('user.cart.pay_method') }}</td>
                                                    <td class="cart_total_amount">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="exampleRadios" id="radioOption1" value="onlline"
                                                                checked>
                                                            <label class="form-check-label" for="radioOption1">
                                                                {{ __('user.cart.online') }}
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="exampleRadios" id="radioOption2" value="cod">
                                                            <label class="form-check-label" for="radioOption2">
                                                                {{ __('user.cart.cod') }}
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                                        {{ __('user.cart.oder') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
