@extends('layouts.main')
@section('title', __('Testimonial Create'))
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-6">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Testimonial') }}</h5>
                            <span>{{ __('Add new testimonial') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('testimonial.index') }}">{{ __('Testimonial') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="{{ __('Name here') }}">
                                <span class="text-danger">{{ __($errors->first('name')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="occupation">{{ __('Occupation') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    placeholder="{{ __('Occupation here') }}">
                                <span class="text-danger">{{ __($errors->first('occupation')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="{{ __('Title here') }}">
                                <span class="text-danger">{{ __($errors->first('title')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span
                                        class="text-danger">*</span></label>
                                <textarea id="description" name="description" class="form-control html-editor"></textarea>
                                <span class="text-danger">{{ __($errors->first('description')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="image-group">
                                <div class="form-group">
                                    <label for="">{{ __('Image') }} <span class="text-danger">*</span> </label> <br>
                                    <img id="target" class="cus-mw-200"
                                        src="{{ asset(path_noimage_image() . 'no-image-200.jpg') }}"
                                        alt="{{ __('image') }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="image" type="file" class="custom-file-input" id="putImage">
                                        <label data-id="showname" class="custom-file-label"
                                            for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                    </div>
                                    <span class="text-danger">{{ __($errors->first('image')) }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Star') }} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="star">
                                    <option value="1">{{ __('One') }}</option>
                                    <option value="2">{{ __('Two') }}</option>
                                    <option value="3">{{ __('Three') }}</option>
                                    <option value="4">{{ __('Four') }}</option>
                                    <option value="5">{{ __('Five') }}</option>
                                </select>
                                <span class="text-danger">{{ __($errors->first('star')) }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Status') }} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="status">
                                    <option value="1">{{ __('Publish') }}</option>
                                    <option value="2">{{ __('Draft') }}</option>
                                </select>
                                <span class="text-danger">{{ __($errors->first('status')) }}</span>
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
        <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
        <script src="{{ asset('js/summernote.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ asset('js/select2-active.js') }}"></script>
    @endpush
@endsection
