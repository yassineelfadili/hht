@extends('layouts.main')
@section('title', __('Service Create'))
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
                            <h5>{{ __('Add Service') }}</h5>
                            <span>{{ __('Add new service') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('service.index') }}">{{ __('Service') }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @include('include.message')
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @foreach (allLanguages() as $lang)
                                <div class="form-group">
                                    <label for="title">{{ __('Title (' . $lang->name . ')') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title_{{ $lang->prefix }}"
                                        placeholder="{{ __('Title here') }}">
                                    <span class="text-danger">{{ __($errors->first('title')) }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description (' . $lang->name . ')') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea id="description" name="description_{{ $lang->prefix }}" class="form-control" rows="8"></textarea>
                                    <span class="text-danger">{{ __($errors->first('description')) }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="details">{{ __('Details (' . $lang->name . ')') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea id="details" name="details_{{ $lang->prefix }}" class="form-control html-editor"></textarea>
                                    <span class="text-danger">{{ __($errors->first('details')) }}</span>
                                </div>
                            @endforeach
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
                                        alt="{{ __('test') }}">
                                </div>
                                <div class="custom-file">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="putImage">
                                            <label data-id="showname" class="custom-file-label"
                                                for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>
                            <div class="image-group">
                                <div class="form-group">
                                    <label for="">{{ __('Icon') }} <span class="text-danger">*</span> </label> <br>
                                    <img id="target2" class="cus-mw-200"
                                        src="{{ asset(path_noimage_image() . 'no-image-200.jpg') }}"
                                        alt="{{ __('test') }}">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="icon" type="file" class="custom-file-input" id="putImage2">
                                                <label data-id="showname" class="custom-file-label"
                                                    for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('icon') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input">{{ __('Tags') }} <span class="text-danger">*</span></label> <br>
                                <input type="text" id="tags" name="tags" class="form-control">
                                <br>
                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Status') }} <span class="text-danger">*</span> </label>
                                <select class="form-control select2" name="status">
                                    <option value="1">{{ __('Publish') }}</option>
                                    <option value="2">{{ __('Draft') }}</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
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
