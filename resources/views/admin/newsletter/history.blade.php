@php use App\Models\NewsletterHistory; @endphp
@extends('admin.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('admin_style')
    @include('admin.includes.datatable.style')
@endsection

@section('admin_content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><span><i
                                            class="bx bxs-home-circle"></i> {{ __('admin.sidebar.dashboard') }}</span></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.newsletter') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">{{ __('admin.sidebar.newsletter') }}</h4>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">{{ __('admin.label.email') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.content') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.status.title') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['histories'] as $result)
                                    <tr>
                                        <td class="align-middle">
                                                {{ $result['email'] }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $result['content'] }}
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($result['status'] == NewsletterHistory::STATUS_SENT)
                                                <span class='badge badge-pill badge-soft-success font-size-11'
                                                    style='line-height: unset!important;'>{{ __('admin.label.status.sent') }}</span>
                                            @else
                                                <span class='badge badge-pill badge-soft-danger font-size-11'
                                                    style='line-height: unset!important;'>{{ __('admin.label.status.notsent') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection

@section('admin_script')
    @include('admin.includes.datatable.script')
@endsection
