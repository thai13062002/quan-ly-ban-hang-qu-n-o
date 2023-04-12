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
                                        <th class="cart-price" scope="col">{{ __('user.label.price') }}</th>
                                        <th scope="col">{{ __('user.action.delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($data['likeproduct'] as $result)
                                        <tr class="cart-row cart-item">
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset($result->product->image) }}"
                                                    alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a
                                                        href="#">{{ $result->product->name }}</a>
                                                </h5>

                                            <td class="" data-title="Price">
                                                <span
                                                    class="cart-price  price">{{ $result->product->price }}
                                                </span>
                                            </td>

                                            <td class="action" data-title="Remove">
                                                <form action="{{ route('user.like.destroyProduct', ['id' => $result->id]) }}"
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
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
