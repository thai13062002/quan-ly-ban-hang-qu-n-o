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
                    <span></span> {{__('user.detail.order')}}
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
                                    <tr class="main-heading">
                                        <th scope="col">{{__('user.detail.image')}}</th>
                                        <th scope="col">{{__('user.detail.nameProduct')}}</th>
                                        <th scope="col">{{__('user.detail.color')}}</th>
                                        <th scope="col">{{__('user.detail.size')}}</th>
                                        <th scope="col">{{__('user.detail.quantity')}}</th>
                                        <th scope="col">{{__('user.detail.total')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['products']->orderDetails as $orderProduct)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset($orderProduct->productVariation->product->image) }}"
                                                alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name">
                                                <a href="product-details.html">
                                                    {{ $orderProduct->productVariation->product->name }}
                                                </a>
                                            </h5>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>{{ $orderProduct->productVariation->color->name }}</span>
                                        </td>
                                        <td class="text-center" data-title="Stock">
                                            <span>{{ $orderProduct->productVariation->size->name }}</span>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>{{ $orderProduct->quantity }}</span>
                                        </td>
                                        <td class="action" data-title="Remove">{{ number_format($orderProduct->amount) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
