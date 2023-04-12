@php use App\Models\Category; @endphp
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.category') }}</li>
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
                                <h4 class="card-title">{{ __('admin.sidebar.category') }}</h4>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">
                                <i class="mdi mdi-plus me-2"></i> {{ __('admin.action.create') }}
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">{{ __('admin.label.title') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.parent_category') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.status.title') }}</th>
                                    <th class="text-center align-middle">{{ __('admin.label.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['categories'] as $result)
                                    <tr>
                                        <td class="align-middle">
                                            <a href="{{ route('admin.categories.show', ['category' => $result['id']]) }}">
                                                {{ $result['name'] }}
                                            </a>
                                        </td>
                                        @if (!$result['parent'])
                                            <td class="align-middle">
                                            </td>
                                        @else
                                            <td class="align-middle">
                                                {{$result['parent']['name']}}
                                            </td>
                                        @endif
                                        <td class="text-center align-middle">
                                            @if ($result['status'] == Category::STATUS_ACTIVE)
                                                <span class='badge badge-pill badge-soft-success font-size-11'
                                                    style='line-height: unset!important;'>{{ __('admin.label.status.active') }}</span>
                                            @else
                                                <span class='badge badge-pill badge-soft-danger font-size-11'
                                                    style='line-height: unset!important;'>{{ __('admin.label.status.inactive') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('admin.categories.edit', ['category' => $result['id']]) }}"
                                                class="btn btn-primary mr-3" style="margin-right: 10px;"><i
                                                    class="bx bx-pencil"></i></a>
                                            <a href="javascript:void(0)" data-id="{{ $result['id'] }}" data-toggle="modal"
                                                data-message="{{ __('admin.label.confirm_delete') }}"
                                                data-url="{{ route('admin.categories.destroy', ['category' => $result['id']]) }}"
                                                class="btn btn-danger delete" data-bs-toggle="modal"
                                                data-bs-target=".deleteModal">
                                                <i class="bx bx-trash"></i>
                                            </a>
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
