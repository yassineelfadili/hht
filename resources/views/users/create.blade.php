@extends('layouts.main')
@section('title', __('Create User'))
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
                            <h5>{{ __('Admin') }}</h5>
                            <span>{{ __('Create Admin') }}</span>
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
                                <a href="#">{{ __('Admin Create') }}</a>
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
                        <h3>{{ __('Create Admin') }}</h3>
                        <a class="btn btn-primary ml-auto"
                            href="{{ route('admin.user.index') }}">{{ __('Admin List') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>{{ __('Admin Elements') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="{{ route('admin.user.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">{{ __('First Name') }}</label>
                                                        <input name="first_name" type="text" class="form-control"
                                                            id="exampleInputName1" placeholder="{{ __('First Name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">{{ __('Last Name') }}</label>
                                                        <input name="last_name" type="text" class="form-control"
                                                            id="exampleInputName1" placeholder="{{ __('Last Name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">{{ __('Email address') }}</label>
                                                        <input name="email" type="email" class="form-control"
                                                            id="exampleInputEmail3" placeholder="{{ __('Email') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">{{ __('Password') }}</label>
                                                        <input name="password" type="password" class="form-control"
                                                            id="exampleInputEmail3" placeholder="{{ __('Password') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">{{ __('Gender') }}</label>
                                                        <select name="gender" class="form-control"
                                                            id="exampleSelectGender">
                                                            <option value="male">{{ __('Male') }}</option>
                                                            <option value="female">{{ __('Female') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="role">{{ __('Role') }}</label>
                                                        <select name="roles[]" class="form-control" id="role">
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role }}">{{ $role }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label
                                                            for="validatedInputGroupCustomFile1">{{ __('User Image') }}</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input
                                                                    value="{{ isset($user) ? asset(path_user_image() . $user->image) : '' }}"
                                                                    name="thumb_image" type="file" class="custom-file-input"
                                                                    id="putImage">
                                                                <label data-id="showname" class="custom-file-label"
                                                                    for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-4">
                                                    @if (isset($user))
                                                        <img id="target" class="cus-mh50-mw-50"
                                                            src="{{ isset($user->image) ? asset(path_user_image() . $user->image) : Avatar::create($user->name)->toBase64() }}">
                                                    @else
                                                        <img src="{{ asset(path_noimage_image() . 'no-image-200.jpg') }}"
                                                            id="target" class="cus-mh50-mw-50" alt="{{ __('image') }}">
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary mr-2">{{ __('Submit') }}</button>
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
    <script src="{{ asset('js/summernote.js') }}"></script>
@endpush
