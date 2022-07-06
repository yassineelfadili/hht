@extends('layouts.main')
@section('title', __('Edit Language'))
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
                            <h5>{{ __('Edit Language')}}</h5>
                            <span>{{ __('List of Language')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Language')}}</a>
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
                        <h3>{{ __('Language')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{route('language.update', $lang->id)}}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    {{ __('Name') }} <input name="name" class="form-control" type="text" value="{{$lang->name}}" required><br>
                                                    {{ __('End Time') }} <input name="prefix" class="form-control" type="text" value="{{$lang->prefix}}" required>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    {{ __('Direction') }}
                                                    <select name="direction" id="direction" class="form-control" required>
                                                        <option value="ltr" {{$lang->direction == 'ltr' ? 'selected' : ''}}>{{__('LTR')}}</option>
                                                        <option value="rtl" {{$lang->direction == 'rtl' ? 'selected' : ''}}>{{__('RTL')}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
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
<!-- push external js -->
@push('script')
    <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{asset('js/summernote.js')}}"></script>
@endpush
