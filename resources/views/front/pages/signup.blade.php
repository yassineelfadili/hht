@extends('front.layouts.main')
@section('page_title', __('Sign Up'))
@section('content')
<!-- header area end here  -->
<!-- breadcrumb area start here   -->
<section class="breadcrumb-area cus-bg-img"  style="background-image: url({{ asset(path_page_banner() . $allsettings['banner']) }})">
    <div class="container">
        <h2 class="page-title">{{ __('main.Sign Up') }}</h2>
        <ul class="breadcrumb-page">
            <li><a href="{{ route('front.index') }}">{{ __('main.Home') }}</a></li>
            <li>{{ __('main.Sign Up') }}</li>
        </ul>
    </div>
</section>
<!-- breadcrumb area end here   -->
<!-- register area star here  -->
<div class="register-area section">
    <div class="container">
        <div class="register-wrap">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="register-image">
                        <img src="{{asset('front/assets/images/register-image.png')}}" alt="{{ __('register-image') }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="register-form">
                        <h2 class="form-title">{{ __('main.Sign Up') }}</h2>
                        <form method="POST" action="{{ route('user.create') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}" placeholder="{{ __('main.First Name') }}" />
                                <i class="fas fa-user form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('fname')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}" placeholder="{{ __('main.Last Name') }}" />
                                <i class="fas fa-user form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('lname')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('main.Enter Email') }}" />
                                <i class="fas fa-envelope form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('email')) }}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('main.Enter Password') }}" />
                                <i class="fas fa-lock form-icon"></i>
                                <span class="text-danger">{{ __($errors->first('password')) }}</span>
                            </div>
                            <input type="hidden" name="role" value="patient">
                            <div class="form-group form-check">
                                <input type="checkbox" name="agree" value="on" class="form-check-input" id="Agree">
                                <label class="form-check-label" for="Agree">{{ __('main.I Agree Terms and Conditions.') }}</label>
                                <br>
                                <span class="text-danger">{{ __($errors->first('agree')) }}</span>
                            </div>
                            <div class="form-bottom">
                                <button type="submit" class="primary-btn">{{ __('main.Sign up Account') }}</button>
                                <p class="form-bottom-text">{{ __('main.You have an account? Please,') }} <a href="{{route('signin')}}">{{ __('main.Sign In') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register area star here  -->
@endsection
