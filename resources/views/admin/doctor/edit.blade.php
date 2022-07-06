@extends('layouts.main')
@section('title', __('Edit Doctor'))
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
                            <h5>{{ __('Doctors') }}</h5>
                            <span>{{ __('Edit Doctor') }}</span>
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
                                <a href="#">{{ __('Edit Doctor') }}</a>
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
                        <h3>{{ __('Edit Doctor') }}</h3>
                        @can('doctor-create')
                            <a class="btn btn-primary ml-auto" href="{{ route('doctor.index') }}">{{ __('List') }}</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('doctor.update', $user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ $user->name }}" autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ __($message) }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $user->email }}" autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ __($message) }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" autocomplete="off">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ __($message) }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="docat"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-select form-control" name="gender">
                                                        <option value="male"
                                                            {{ $user->gender == 'male' ? 'selected' : '' }}>
                                                            {{ __('Male') }}</option>
                                                        <option value="female"
                                                            {{ $user->gender == 'female' ? 'selected' : '' }}>
                                                            {{ __('Female') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="docat"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Doctor Category') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-select form-control" name="docat">
                                                        @foreach ($category as $cat)
                                                            <option value="{{ $cat->id }}"
                                                                {{ $user->doctor->category_id == $cat->id ? 'selected' : '' }}>
                                                                {{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4 col-form-label text-md-right"><label for="text-input"
                                                        class=" form-control-label">{{ __('Off Day') }}</label></div>
                                                <div class="col-md-6">
                                                    <input name="off_day[]" value="sat" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('sat') ? 'checked' : '' }}>
                                                    {{ __('Saturday') }}
                                                    <input name="off_day[]" value="sun" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('sun') ? 'checked' : '' }}>
                                                    {{ __('Sunday') }}
                                                    <input name="off_day[]" value="mon" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('mon') ? 'checked' : '' }}>
                                                    {{ __('Monday') }}
                                                    <input name="off_day[]" value="tue" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('tue') ? 'checked' : '' }}>
                                                    {{ __('Tuesday') }}
                                                    <input name="off_day[]" value="wed" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('web') ? 'checked' : '' }}>
                                                    {{ __('Wednesday') }}
                                                    <input name="off_day[]" value="thu" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('thu') ? 'checked' : '' }}>
                                                    {{ __('Thursday') }}
                                                    <input name="off_day[]" value="fri" type="checkbox"
                                                        {{ $user->doctor->checkOffDay('fri') ? 'checked' : '' }}>
                                                    {{ __('Friday') }}
                                                    <small class="form-text text-muted">{{ __('Check off day') }}</small>
                                                    @error('hospital_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ __($message) }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row row">
                                                <div class="col-md-4 col-form-label text-md-right">
                                                    <p>{{ __('Fees ($)') }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mr-4">
                                                        <input type="number" class="form-control" name="fees"
                                                            value="{{ $user->doctor->fees }}"
                                                            placeholder="{{ __('Add fee') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input {{-- value="{{ asset(path_user_image() . $user->image) }}" --}} name="profile_image"
                                                                        type="file" class="custom-file-input" id="putImage">
                                                                    <label data-id="showname" class="custom-file-label"
                                                                        for="putImage">{{ __('Choose file...') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <img id="target" class="cus-mh50-mw-50 img-thumbnail"
                                                                src="{{ isset($user->doctor->profile_image) ? asset(path_user_image() . $user->doctor->profile_image) : asset(path_noimage_image() . 'no-image-50.jpg') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Thumb Image') }}</label>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input {{-- value="{{ isset($user) ? asset(path_user_image() . $user->image) : '' }}" --}} name="thumb_image"
                                                                        type="file" class="custom-file-input"
                                                                        id="putImage1">
                                                                    <label data-id="showname" class="custom-file-label"
                                                                        for="validatedInputGroupCustomFile">{{ __('Choose file...') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <img id="target1" class="cus-mh50-mw-50 img-thumbnail"
                                                                src="{{ isset($user->image) ? asset(path_user_image() . $user->image) : asset(path_noimage_image() . 'no-image-200.jpg') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>

                                            {{-- <div class="custome-form">
                                                <div class="row">
                                                    <div class="col col-md-3">
                                                        <label for="text-input"
                                                            class=" form-control-label">{{ __('Off Day') }}</label>
                                                        <small
                                                            class="form-text text-muted">{{ __('Check off day') }}</small>
                                                    </div>
                                                    <div class="col-12 col-md-9">

                                                        <div class="checkbox-list">
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="sat" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('sat') ? 'checked' : '' }}>
                                                                {{ __('Saturday') }}
                                                            </div>
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="sun" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('sun') ? 'checked' : '' }}>
                                                                {{ __('Sunday') }}
                                                            </div>
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="mon" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('mon') ? 'checked' : '' }}>
                                                                {{ __('Monday') }}
                                                            </div>
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="tue" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('tue') ? 'checked' : '' }}>
                                                                {{ __('Tuesday') }}
                                                            </div>
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="wed" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('wed') ? 'checked' : '' }}>
                                                                {{ __('Wednesday') }}
                                                            </div>
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="thu" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('thu') ? 'checked' : '' }}>
                                                                {{ __('Thursday') }}
                                                            </div>
                                                            <div class="signle-input">
                                                                <input name="off_day[]" value="fri" type="checkbox"
                                                                    {{ $user->doctor->checkOffDay('fri') ? 'checked' : '' }}>
                                                                {{ __('Friday') }}
                                                            </div>
                                                        </div>
                                                        @error('hospital_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ __($message) }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div id="schedule">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <p>{{ __('Schedule') }}</p>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label
                                                                            for="starttime">{{ __('Start Time') }}</label>
                                                                        <input type="time"
                                                                            value="{{ isset($user->doctor->starttime) ? $user->doctor->starttime : '' }}"
                                                                            name="starttime">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="endtime">{{ __('End Time') }}</label>
                                                                        <input type="time" name="endtime"
                                                                            value="{{ isset($user->doctor->endtime) ? $user->doctor->endtime : '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label
                                                                            for="starttime2">{{ __('Start Time') }}</label>
                                                                        <input type="time" name="starttime2"
                                                                            value="{{ isset($user->doctor->starttime2) ? $user->doctor->starttime2 : '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="endtime2">{{ __('End Time') }}</label>
                                                                        <input type="time" name="endtime2"
                                                                            value="{{ isset($user->doctor->endtime2) ? $user->doctor->endtime2 : '' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <p>{{ __('Category') }}</p>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <select name="category" id="">
                                                                @foreach ($category as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $user->doctor->category_id == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <p>{{ __('Fees ($)') }}</p>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <input type="number" name="fees"
                                                                placeholder="{{ __('Add fee') }}"
                                                                value="{{ $user->doctor->fees }}">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- markup -->
                            <div class="col-md-3 hide-mobile">
                                <div>
                                    <h5>{{ __('User Info') }}</h5>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="fname">{{ __('Name') }}</label>
                                        <input name="fname" type="text" class="form-control"
                                            value="{{ $user->name ?? '' }}" disabled>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="fname">{{ __('Email') }}</label>
                                        <input name="fname" type="text" class="form-control"
                                            value="{{ $user->email ?? '' }}" disabled>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <img class="doc-img-cls"
                                        src="{{ isset($user->image) ? asset(path_user_image() . $user->image) : asset(path_noimage_image() . 'no-image-200.jpg') }}"
                                        alt="{{ __('image') }}">
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
