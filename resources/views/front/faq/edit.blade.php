@extends('layouts.main')
@section('title', __('FAQ Edit'))
@section('content')
    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('FAQ')}}</h5>
                            <span>{{ __('Edit faq')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('FAQ')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
            @csrf
            <div class="row">
                @include('include.message')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach (allLanguages() as $lang)
                                <div class="form-group">
                                    <label for="ques">{{ __('Question ('.$lang->name.')') }}</label>
                                    <textarea class="form-control" id="ques" name="question_{{$lang->prefix}}" rows="3">{{ $faq->translateOrDefault($lang->prefix)->question }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ans">{{ __('Answer('.$lang->name.')') }}</label>
                                    <textarea class="form-control" id="ans" name="answer_{{$lang->prefix}}" rows="4">{{ $faq->translateOrDefault($lang->prefix)->answer }}</textarea>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="">{{ __('FAQ Title')}} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="type">
                                    <option {{ $faq->type == 1 ? 'selected' : '' }} value="1">{{ __('Basic Question') }}</option>
                                    <option {{ $faq->type == 2 ? 'selected' : '' }} value="2">{{ __('Medical Question') }}</option>
                                    <option {{ $faq->type == 3 ? 'selected' : '' }} value="3">{{ __('Pricing Plane') }}</option>
                                    <option {{ $faq->type == 4 ? 'selected' : '' }} value="4">{{ __('Other Question') }}</option>
                                </select>
                                <span class="text-danger">{{ __($errors->first('type')) }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2-active.js') }}"></script>
    @endpush
@endsection
