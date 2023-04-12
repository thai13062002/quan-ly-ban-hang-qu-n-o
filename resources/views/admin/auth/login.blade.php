@extends('admin.layouts.auth')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection
@section('admin_auth_top')
    <div class="row">
        <div class="col-7">
            <div class="text-primary p-4">
                <h5 class="text-primary">{{ __('admin.label.auth_login_welcome') }}</h5>
                <p>{{ __('admin.label.auth_login_des') }}</p>
            </div>
        </div>
        <div class="col-5 align-self-end">
            <img src="admin-assets\images\profile-img.png" alt="" class="img-fluid">
        </div>
    </div>
@endsection
@section('admin_auth_main')
    <div class="p-2">
        <form class="form-horizontal" action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('admin.label.email') }}</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('admin.placeholder.email') }}">
                @error('email')
                    <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('admin.label.password') }}</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('admin.placeholder.password') }}">
                @error('password')
                    <p class="text-danger mt-2">{{ $errors->first('password') }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{ __('admin.button.login') }}</button>
            </div>
        </form>
    </div>
@endsection
