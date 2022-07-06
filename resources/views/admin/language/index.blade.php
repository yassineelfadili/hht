@extends('layouts.main')
@section('title', __('Languages'))
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
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Languages') }}</h5>
                            <span>{{ __('List of Languages') }}</span>
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
                                <a href="#">{{ __('Language') }}</a>
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
                        <h3>{{ __('Language') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @can('language-create')
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('language.store') }}">
                                                @csrf
                                                <div class="custome-form">
                                                    <p class="col-form-label"><b>{{ __('Language:') }}</b></p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="start_time">{{ __('Name') }} </label>
                                                                <input name="name" type="text" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="end_time">{{ __('Prefix') }} </label>
                                                                <input name="prefix" type="text" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="end_time">{{ __('Direction') }} </label>
                                                                <select name="direction" id="direction" required>
                                                                    <option value="ltr">{{ __('LTR') }}</option>
                                                                    <option value="rtl">{{ __('RTL') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Add Language') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p>{{ __('All Languages') }}</p>
                                        <div class="all-slots">
                                            @if ($all_languages->count() > 0)
                                                @foreach ($all_languages as $lang)
                                                    <div class="single-slots">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <p>{{ $lang->name }}</p>
                                                            </div>
                                                            @can('language-edit')
                                                                @if ($lang->name != 'English')
                                                                    <div class="col-4 text-right">
                                                                        <a href="{{ route('language.edit', $lang->id) }}"
                                                                            class="btn btn-primary">{{ __('Edit') }}</a>
                                                                    </div>
                                                                @endif
                                                            @endcan
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
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
<!-- push external js -->
@push('script')
    <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('js/summernote.js') }}"></script>
@endpush
