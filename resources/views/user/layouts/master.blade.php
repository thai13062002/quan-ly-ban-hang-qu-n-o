@php use App\Helpers\UserHelper; @endphp

@extends('user.layouts.index')

@section('user_main')

    <body>
        <header class="header-area header-style-1 header-height-2">
            <div class="header-bottom header-bottom-bg-color sticky-bar">
                <div class="container">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block">
                            <a href="index.html"><img
                                    src="admin-assets\images\logo.svg"
                                    alt="logo" /></a>
                        </div>
                        <div class="header-nav d-none d-lg-flex">
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                <nav>
                                    <ul>
                                        @foreach (UserHelper::getUserMenu() as $menu)
                                            <li class="position-static">
                                                <a
                                                    href="{{ !isset($menu['items']) && !empty($menu['route']) ? route("{$menu['route']}") : 'javascript:void(0);' }}">
                                                    {{ $menu['label'] }}
                                                </a>
                                                @if (isset($menu['items']))
                                                    <ul class="mega-menu">
                                                        @foreach ($menu['items'] as $subMenu)
                                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                                @if ($subMenu->parent_id == null)
                                                                    <a class="menu-title"
                                                                        href="{{ route('user.categories.index', $subMenu->slug) }}">
                                                                        {{ $subMenu->name }}
                                                                    </a>
                                                                    <ul>
                                                                        @foreach ($menu['items'] as $subMenu2)
                                                                            @if ($subMenu2->parent_id == $subMenu->id)
                                                                                <li><a
                                                                                        href="{{ route('user.categories.index', $subMenu2->slug) }}">{{ $subMenu2->name }}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{ route('user.like.listProducts') }}">
                                        <i class="fi-rs-heart"></i>
                                        <span class="pro-count blue">{{$like_items}}</span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ route('user.cart.product') }}">
                                        <i class="fi-rs-shopping-cart-check"></i>
                                        <span class="pro-count blue">{{ $total_items }}</span>
                                    </a>
                                </div>
                                @if (auth()->check())
                                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                        <nav>
                                            <ul>
                                                <li><a onclick="return false;" href="#">Xin chào,
                                                        {{ auth()->user()->name }}<i class="fi-rs-angle-down"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="{{route('user.detail')}}">{{ __('user.label.information') }}</a></li>
                                                        <li><a href="{{route('user.changePassword')}}">{{ __('user.action.changepassword') }}</a>
                                                        </li>
                                                        <li><a href="#">
                                                                <form action="{{ route('user.logout') }}" method="POST">
                                                                    @csrf
                                                                    <button
                                                                        style=" border: none; background-color: white; margin-left:-5px">
                                                                        {{ __('user.action.logout') }}</button>
                                                                </form>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                @else
                                    <a href="{{ route('user.login') }}">{{ __('user.action.login') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            @yield('main.content')
        </main>
        <footer class="main">
            <section class="newsletter p-30 text-white wow fadeIn animated">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 mb-md-3 mb-lg-0">
                            <div class="row align-items-center">
                                <div class="col flex-horizontal-center">
                                    <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="" />
                                    <h4 class="font-size-20 mb-0 ml-3">{{ __('user.action.subscribeDiscount') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!-- Subscribe Form -->
                            <form action="{{ route('user.register.newsletter') }}" method="POST"
                                class="form-subcriber d-flex wow fadeIn animated">
                                @csrf
                                <input name="email" type="email" class="form-control bg-white font-small"
                                    placeholder="{{ __('user.action.enterEmail') }}"  required/>
                                <button class="btn bg-dark text-white" type="submit">
                                    {{ __('user.action.subscribe') }}
                                </button>
                            </form>
                            <!-- End Subscribe Form -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-padding footer-mid">
                <div class="container pt-15 pb-20">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-about font-md mb-md-5 mb-lg-0">
                                <h3 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">
                                    {{ __('user.label.contact') }}
                                </h3>
                                <p class="wow fadeIn animated">
                                    <strong>{{ __('user.label.address') }}: </strong>{{ __('user.info.address') }}
                                </p>
                                <p class="wow fadeIn animated">
                                    <strong>{{ __('user.label.phone') }}: </strong>{{ __('user.info.phone') }}
                                </p>
                                <p class="wow fadeIn animated">
                                    <strong>{{ __('user.label.email') }}: </strong>{{ __('user.info.email') }}
                                </p>
                            </div>
                        </div>
                        <iframe class="col-lg-8"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.926552599648!2d105.78320911523546!3d20.995581086016458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad0e8afac1a7%3A0x1307cacb918d396!2sAmaisoft%20JSC!5e0!3m2!1svi!2s!4v1680676569924!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </section>
            <div class="container pb-20 wow fadeIn animated mob-center">
                <div class="row">
                    <div class="col-12 mb-20">
                        <div class="footer-bottom"></div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                        <p class="text-lg-end text-start font-sm text-muted mb-0">
                            Copyright {{ date('Y') }} © to <a
                                href="{{ route('user.home') }}"><b>{{ config('app.name') }}</b></a>.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        @include('user.includes.script')
        @stack('js')
    </body>
@endsection
