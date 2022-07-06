@extends('layouts.main')
@section('title', __('Category Create'))
@push('head')
    <!-- include summernote css/js -->
    <link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-6">
                    <div class="page-header-title">
                        <i class="ik ik-list bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Category') }}</h5>
                            <span>{{ __('Category') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Category') }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header">
                        @isset($category)
                            <h3>{{ __('Category Edit') }}</h3>
                        @else
                            <h3>{{ __('Category Create') }}</h3>
                        @endisset
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        @isset($category)
                                            <h3>{{ __('Category Edit') }}</h3>
                                        @else
                                            <h3>{{ __('Category Create') }}</h3>
                                        @endisset
                                    </div>
                                    <div class="card-body">
                                        <form class="forms-sample"
                                            action="{{ isset($category) ? route('doctor.category.update', $category->id) : route('doctor.category.create') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputName1">{{ __('Name') }}</label>
                                                <input name="name" type="text"
                                                    value="{{ isset($category) ? $category->name : '' }}"
                                                    class="form-control" id="exampleInputName1"
                                                    placeholder="{{ __('Name') }}">
                                                <span class="text-danger">{{ __($errors->first('name')) }}</span>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">
                                                {{ isset($category) ? 'Update' : 'Submit' }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
