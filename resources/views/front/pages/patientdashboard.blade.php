@extends('front.layouts.main')
@section('page_title', __('Patient Dashboard'))
@section('content')
    <!-- breadcrumb area start here   -->
    <section class="breadcrumb-area cus-bg-img"  style="background-image: url({{ asset(path_page_banner() . $allsettings['banner']) }})">
        <div class="container">
            <h2 class="page-title">{{ __('main.Patient Dashboard') }}</h2>
            <ul class="breadcrumb-page">
                <li><a href="{{ route('front.index') }}">{{ __('main.Home') }}</a></li>
                <li>{{ __('main.Dashboard') }}</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb area end here   -->
    <div class="main-section-wrap section patient-dashboard-page" id="js_variable_data"
        data-jsvar='{{ $patientVariables }}'>
        <div class="container">
            <div class="section-header">
                <div class="section-header-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="tab-menu">
                                <ul class="nav nav-tabs" id="DashboardTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'dashboard' ? 'active' : '' }}"
                                            id="tabone-tab" data-toggle="tab" href="#tabone" role="tab"
                                            aria-controls="tabone" aria-selected="true">
                                            <i class="fas fa-home"></i> <span>{{ __('main.Dashboard') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'today-appointments' ? 'active' : '' }}"
                                            id="tabfive-tab" data-toggle="tab" href="#tabfive" role="tab"
                                            aria-controls="tabfive" aria-selected="true">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>{{ __('main.Today Appointments') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'appointments' ? 'active' : '' }}"
                                            id="tabtwo-tab" data-toggle="tab" href="#tabtwo" role="tab"
                                            aria-controls="tabtwo" aria-selected="false">
                                            <i class="fas fa-calendar-check"></i> <span>
                                                {{ __('main.All Appointment') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'create-appointment' ? 'active' : '' }}"
                                            id="tabthree-tab" data-toggle="tab" href="#tabthree" role="tab"
                                            aria-controls="tabthree" aria-selected="false">
                                            <i
                                                class="fas fa-calendar-plus"></i><span>{{ __('main.Create Appointment') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'profile' ? 'active' : '' }}"
                                            id="tabfour-tab" data-toggle="tab" href="#tabfour" role="tab"
                                            aria-controls="tabfour" aria-selected="false">
                                            <i class="fas fa-user"></i><span>{{ __('main.Profile') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="search-form">
                                <form action="#">
                                    <div class="search-input">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ __('Congratulation!') }}</strong> {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ Session::get('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="section-wraper" id="cong">
                <div class="tab-content" id="DashboardTabContent">
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'dashboard' ? 'show active' : '' }}" id="tabone"
                        role="tabpanel" aria-labelledby="tabone-tab">
                        <div class="dashboard-box">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-1.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('main.Past Appointment') }}</h4>
                                                <h2 class="counter">{{ past_appointment_count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-2.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('main.Ongoing Appointment') }}</h4>
                                                <h2 class="counter color-two">{{ patient_ongoing_count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-3.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('main.Total Cost') }}</h4>
                                                <h2 class="counter color-three">
                                                    {{ auth()->user()->earning->pluck('earning')->sum() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-heading-area">
                            <h2 class="section-title">{{ __('main.Past Appointment') }} </h2>
                        </div>
                        <div class="primary-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('main.Doctor Name') }}</th>
                                            <th scope="col">{{ __('main.Date') }}</th>
                                            <th scope="col">{{ __('main.Time') }}</th>
                                            <th scope="col">{{ __('main.Type') }}</th>
                                            <th scope="col">{{ __('main.Status') }}</th>
                                            <th scope="col">{{ __('main.Prescription') }}</th>
                                            <th scope="col">{{ __('main.Meeting') }}</th>
                                            <th scope="col">{{ __('main.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dashboardpagi" class="accordion">
                                        @include('front.pages.dashboardpagi')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'today-appointments' ? 'show active' : '' }}"
                        id="tabfive" role="tabpanel" aria-labelledby="tabfive-tab">
                        <div class="section-heading-area">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="section-title">{{ __('main.Today Appointments') }}</h2>
                                </div>
                                <div class="col-md-6 text-md-right">
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="AppominmentTabContent">
                            <div class="tab-pane fade show active">
                                @include('front.pages.today_pagination')
                                <div class="primary-table d-none" id="searchheadtoday">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('main.Doctor Name') }}</th>
                                                    <th scope="col">{{ __('main.Date') }}</th>
                                                    <th scope="col">{{ __('main.Time') }}</th>
                                                    <th scope="col">{{ __('main.Type') }}</th>
                                                    <th scope="col">{{ __('main.Status') }}</th>
                                                    <th scope="col">{{ __('main.Prescription') }}</th>
                                                    <th scope="col">{{ __('main.Meeting Link') }}</th>
                                                    <th scope="col">{{ __('main.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="searchbodytoday">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'appointments' ? 'show active' : '' }}"
                        id="tabtwo" role="tabpanel" aria-labelledby="tabtwo-tab">
                        {{-- <div class="section-heading-area"> --}}
                        {{-- <div class="row align-items-center"> --}}
                        {{-- <div class="col-md-6"> --}}
                        {{-- <h2 class="section-title">{{ __('main.All Appointment') }}</h2> --}}
                        {{-- </div> --}}
                        {{-- <div class="col-md-6 text-md-right"> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                        <div class="section-inner-header section-heading-area">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h2 class="section-title">{{ __('main.All Appointment') }}</h2>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner-header-right">
                                        <div class="appoinment-search">
                                            <form action="#">
                                                <div class="input-wrap">
                                                    <div class="search-input">
                                                        <input type="text" class="form-control" name="appoinmentsearch"
                                                            id="appoinmentsearch"
                                                            placeholder="{{ __('main.Search with Doctor') }}" />
                                                        <button class="search-btn"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="date-input">
                                                        <input type="text" class="form-control" name="appoinmentdate"
                                                            id="appoinmentdate"
                                                            placeholder="{{ __('main.Search Date') }}" />
                                                        <span class="form-icon"><i
                                                                class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="AppominmentTabContent">
                            <div class="tab-pane fade" id="TodayAppominment" role="tabpanel"
                                aria-labelledby="TodayAppominment-tab">
                                @include('front.pages.today_pagination')
                                <div class="primary-table d-none" id="searchheadtoday">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('main.Doctor Name') }}</th>
                                                    <th scope="col">{{ __('main.Date') }}</th>
                                                    <th scope="col">{{ __('main.Time') }}</th>
                                                    <th scope="col">{{ __('main.Type') }}</th>
                                                    <th scope="col">{{ __('main.Status') }}</th>
                                                    <th scope="col">{{ __('main.Prescription') }}</th>
                                                    <th scope="col">{{ __('main.Meeting Link') }}</th>
                                                    <th scope="col">{{ __('main.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="searchbodytoday">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="PastAppominment" role="tabpanel"
                                aria-labelledby="PastAppominment-tab">
                                @include('front.pages.past_pagination')
                                <!-- searchtable -->
                                <div class="primary-table d-none" id="searchhead">
                                    <div class="table-responsive">
                                        <table class="table" id="todaypagination">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('main.Doctor Name') }}</th>
                                                    <th scope="col">{{ __('main.Date') }}</th>
                                                    <th scope="col">{{ __('main.Time') }}</th>
                                                    <th scope="col">{{ __('main.Type') }}</th>
                                                    <th scope="col">{{ __('main.Status') }}</th>
                                                    <th scope="col">{{ __('main.Prescription') }}</th>
                                                    <th scope="col">{{ __('main.Meeting Link') }}</th>
                                                    <th scope="col">{{ __('main.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="searchbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- searchtable -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'create-appointment' ? 'show active' : '' }}"
                        id="tabthree" role="tabpanel" aria-labelledby="tabthree-tab">
                        <div class="new-appointment-form">
                            <form id="new-appointment-form" method="POST" action="{{ route('appointment') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="doctor_get_fees" id="doctor_get_fees">
                                <input type="hidden" name="charge_id" id="charge_id">
                                <!-- Circles which indicates the steps of the form: -->
                                <div class="form-progres-step">
                                    <div class="step"><span>{{ __('01') }}</span></div>
                                    <div class="step"><span>{{ __('02') }}</span></div>
                                    <div class="step"><span>{{ __('03') }}</span></div>
                                    <div class="step"><span>{{ __('04') }}</span></div>
                                </div>
                                <!-- One "tab" for each step in the form: -->
                                <input type="hidden" name="slot_id" id="slotid">
                                <input type="hidden" id="appinput" value="" name="appinput">
                                <span data-id="{{ route('patient.set_payment_type') }}" id="payment_type_route"></span>
                                <div class="tab">
                                    <h4 class="form-inner-title">{{ __('main.Date & Time') }}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" name="appdate" class="form-control" id="date"
                                                    placeholder="{{ __('main.Select Date') }}" />
                                                <span class="form-icon"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="apptime-select">
                                                <i class="fas fa-chevron-down"></i>
                                                <select name="apptime" id="apptime" class="form-control">
                                                    <option value="">{{ __('main.Select time slot') }}</option>
                                                    @foreach ($docslots as $docslot)
                                                        <option value="{{ $docslot->id }}"
                                                            data-time="{{ $docslot->start_time }}-{{ $docslot->end_time }}">
                                                            {{ Carbon\Carbon::parse($docslot->start_time)->format('h:i A') }}-{{ Carbon\Carbon::parse($docslot->end_time)->format('h:i A') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="form-inner-title">{{ __('main.Category') }} </h4>
                                    <div class="dectors-service-list">
                                        @foreach ($doctorCategory as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="DoctorsService"
                                                    id="{{ $category->name }}" value="{{ ucfirst($category->name) }}">
                                                <label class="form-check-label" for="{{ $category->name }}">
                                                    {{ ucfirst($category->name) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <h4 class="form-inner-title">{{ __('main.Appointment Type') }} </h4>
                                    <div class="dectors-service-list">
                                        <div class="form-check">
                                            <input class="form-check-input payment_type" type="radio" name="payment_type"
                                                id="online" value="online">
                                            <label class="form-check-label" for="online">
                                                {{ __('main.Online') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input payment_type" type="radio" name="payment_type"
                                                id="offline" value="offline">
                                            <label class="form-check-label" for="offline">
                                                {{ __('main.Offline') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <h3 class="form-title">{{ __('main.Choose Doctor') }}</h3>
                                    <div class="row doctorajax">
                                    </div>
                                </div>
                                <div class="tab">
                                    <h3 class="form-title">{{ __('main.Check Information Place Comment') }}</h3>
                                    <h4 class="form-inner-title" id="formInnerTitle"></h4>
                                    <div class="appoinment-table mb-30">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>{{ __('main.Appointment Date') }}</td>
                                                        <td>{{ __('main.Appointment Time') }}</td>
                                                        <td>{{ __('main.Appointment Day') }}</td>
                                                        <td>{{ __('main.Consultancy Fee') }} </td>
                                                        <td>{{ __('main.Services') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="app_date"></td>
                                                        <td id="app_time"></td>
                                                        <td id="app_day"></td>
                                                        <td id="app_fees"></td>
                                                        <td id="app_specialist"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Comment">{{ __('main.Brief Your Problems') }}</label>
                                        <textarea name="comment" class="form-control comment-box" id="Comment" rows="3"
                                            placeholder="{{ __('main.brief-text') }} "></textarea>
                                    </div>
                                </div>
                                <div class="tab">
                                    <h3 class="form-title">{{ __('main.Select Payment Method') }}</h3>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group" id="toggler">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button type="button" class="previsousbtn"
                                        id="prevBtn">{{ __('main.Previous') }}</button>
                                    <button type="button" id="nextBtn">{{ __('main.Next') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'profile' ? 'show active' : '' }}" id="tabfour"
                        role="tabpanel" aria-labelledby="tabfour-tab">
                        <div class="section-heading-area">
                            <h2 class="section-title">{{ __('main.Profile') }}</h2>
                        </div>
                        <div class="profile-area">
                            <div class="profile-bottom">
                                <div class="row justify-content-center">
                                    {{-- <div class="col-xl-10 offset-xl-1"> --}}
                                    <div class="col-xl-10">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="profile-top">
                                                    <div class="profile-thumbnail">
                                                        <img src="{{ isset(Auth::user()->image) ? asset(path_user_image() . Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64() }}"
                                                            class="profile-image mr-3"
                                                            alt="{{ __('main.profile') }}" />
                                                    </div>
                                                    <div class="profile-info">
                                                        <h3 class="user-name mt-0">{{ Auth::user()->name }}</h3>
                                                        <h4 class="user-age">{{ __('main.Age:') }}
                                                            {{ Auth::user()->age }} {{ __('main.Years') }}</h4>
                                                        <button class="profile-btn" type="button" data-toggle="modal"
                                                            data-target="#editeprofilemodal"><i class="far fa-edit"></i>
                                                            {{ __('main.Edit Info') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-8">
                                                <div class="profile-left">
                                                    <div class="secondary-form">
                                                        <form>
                                                            <h3 class="form-title">
                                                                {{ __('main.Basic Information') }}</h3>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('main.Email') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->email }}"
                                                                            readonly />
                                                                        <span
                                                                            class="text-danger">{{ __($errors->first('email')) }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('main.Gender') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->gender }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('main.BirthDay') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ date('d M Y', strtotime(Auth::user()->dob)) }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="form-title mt-20">
                                                                {{ __('main.Address Information') }}</h3>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('main.Street Address') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->address }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('main.City') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->city }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('main.Zip Code') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->code }}"
                                                                            readonly />
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
                </div>
                <div class="congratulation-wrap d-none">
                    <div class="congratulation-box text-center">
                        <img class="congratulation-img" src="{{ asset('front/assets/images/congratulation.png') }}"
                            alt="{{ __('congratulation') }}" />
                        <h3 class="congratulation-title">{{ __('main.Congratulation') }}</h3>
                        <p class="congratulation-text">
                            {{ __('main.Your Booking has been Pending Wait For Doctor Approval') }}</p>
                        <a id="closebtn" class="close-btn">{{ __('main.Close') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edite Profile Modal -->
    <div class="modal fade" id="editeprofilemodal">
        <div class="modal-dialog modal-dialog-centered editeprofilemodal">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="section-heading-area">
                        <h2 class="section-title">{{ __('main.Edit Profile') }}</h2>
                    </div>
                    <div class="edite-profile-area">
                        <div class="primary-form">
                            <form action="{{ route('user.profile', auth()->user()->id) }}" method="POST" id="editform"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="profile-image-area">
                                    <div class="profile-image">
                                        <span id="openfile">
                                            <img id="target" class="cus-doctor-img-edit"
                                                src="{{ isset(Auth::user()->image) ? asset(path_user_image() . Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64() }}">
                                        </span>

                                    </div>
                                    <div class="custom-fileuplode">
                                        <input type="file" id="file-input" name="image" class="form-control-file">
                                    </div>
                                </div>
                                <h4 class="form-inner-title">{{ __('main.Select Service & Date') }}</h4>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ Auth::user()->name }}"
                                                placeholder="{{ isset(Auth::user()->name) ? Auth::user()->name : __('main.Enter your name') }}"
                                                required />
                                            <small
                                                class="text-danger d-none nameerror">{{ __('main.Name field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email2"
                                                value="{{ Auth::user()->email }}"
                                                placeholder="{{ isset(Auth::user()->email) ? Auth::user()->email : __('main.Enter your email') }}" />
                                            <small
                                                class=" text-danger d-none emailerror">{{ __('main.Email field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="dob" id="group"
                                                value="{{ date('Y-m-d', strtotime(Auth::user()->dob)) }}"
                                                placeholder="{{ isset(Auth::user()->dob) ? Auth::user()->dob : __('main.Enter your date of birth') }}" />
                                            <small
                                                class=" text-danger d-none dateerror">{{ __('main.Date field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="age" id="age"
                                                value="{{ Auth::user()->age }}"
                                                placeholder="{{ isset(Auth::user()->age) ? Auth::user()->age : __('main.Enter your age') }}" />
                                            <small
                                                class=" text-danger d-none ageerror">{{ __('main.Age field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="gender-group">
                                            <span>{{ __('main.Gender:') }}</span>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male"
                                                    value="male"
                                                    @if (isset(Auth::user()->gender)) @if (Auth::user()->gender == 'male')
                                            checked @endif
                                                    @endif
                                                >
                                                <label class="form-check-label" for="male">
                                                    {{ __('main.Male') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="famale"
                                                    value="female"
                                                    @if (isset(Auth::user()->gender)) @if (Auth::user()->gender == 'female')
                                            checked @endif
                                                    @endif>
                                                <label class="form-check-label" for="famale">
                                                    {{ __('main.Female') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-inner-title">{{ __('main.Address Information') }}</h4>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address" id="address"
                                                value="{{ Auth::user()->address }}"
                                                placeholder="{{ isset(Auth::user()->address) ? Auth::user()->address : __('main.Enter your address') }} " />
                                            <small
                                                class=" text-danger d-none addresserror">{{ __('main.Address field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" id="city"
                                                value="{{ Auth::user()->city }}"
                                                placeholder="{{ isset(Auth::user()->city) ? Auth::user()->city : __('main.Enter your city') }} " />
                                            <small
                                                class=" text-danger d-none cityerror">{{ __('main.City field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="code" id="code"
                                                value="{{ Auth::user()->code }}"
                                                placeholder="{{ isset(Auth::user()->code) ? Auth::user()->code : __('main.Enter your code') }}" />
                                            <small
                                                class=" text-danger d-none codeerror">{{ __('main.Code field is required') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <button class="primary-btn changesave"
                                    type="submit">{{ __('main.Changes Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edite Profile Modal -->
    <!-- paypal form -->
    <form id="paypalform" action="{{ route('pay') }}" method="POST">
        @csrf
        <input type="hidden" name="selectdoctory" id="paypal_docid" value=''>
        <input type="hidden" name="appinput" id="paypal_appinput" value=''>
        <input type="hidden" name="slot_id" id="paypal_slotid" value=''>
        <input type="hidden" name="comment" id="paypal_comment" value=''>
        <input type="hidden" name="paymentmethod" value='paypal'>
        <input type="hidden" name="doctorsService" id="paypal_doctorservice" value=''>
        <input type="hidden" name="appdate" id="paypal_appdate" value=''>
        <input type="hidden" name="apptime" id="paypal_apptime" value=''>
        <input id="paypalvalue" name="value" type="hidden" value="">
        <input name="currency" type="hidden" value="usd">
        <input name="payment_platform" type="hidden" value="1">
        <input name="payment_type" id="payment_type_paypal" type="hidden" value="online">
        <input name="appointment_type" id="appointment_type" type="hidden" value="{{ ONLINE }}">
    </form>
    <!-- paypal form -->
    <!-- ViewPrescription  Modal -->
    @foreach ($pastappmodal as $vapp)
        <div class="modal fade common-modal create-meeting-modal" id="createMeetingModal{{ $vapp->id }}"
            tabindex="-1" role="dialog" aria-labelledby="createMeetingModalTitle{{ $vapp->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">{{ __('main.Create Meeting') }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('doctor.zoom_create_link') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden"
                                value="{{ __('Meeting with ' . Auth::user()->name . ' and ' . $vapp->doctor->user->name) }}"
                                name="topic">
                            <input type="hidden" value="{{ \Carbon\Carbon::now() }}" name="start_time">
                            <input type="hidden" value="30" name="duration">
                            <input type="hidden" value="1" name="host_video">
                            <input type="hidden" value="1" name="participant_video">
                            <input type="hidden" value="{{ $vapp->id }}" name="appointment_id">
                            <input type="hidden" value="{{ $vapp->doctor_id }}" name="doctor_id">
                            <input type="hidden" value="{{ $vapp->user_id }}" name="user_id">
                            <div class="create-meeting-info"><span>{{ __('main.Doctor:') }}</span>
                                {{ $vapp->doctor->user->name }}</div>
                            <div class="create-meeting-info"><span>{{ __('main.Appointment Date:') }}</span>
                                {{ $vapp->appdate }}</div>
                            <div class="create-meeting-info"><span>{{ __('main.Appointment Time:') }}</span>
                                {{ $vapp->slot ? \Carbon\Carbon::parse($vapp->slot->start_time)->format('g:i a') : 'N/A' }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('main.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('main.Create Meeting') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (hasMeeting($vapp->id) == 1)
            <div class="modal fade common-modal create-meeting-modal" id="viewMeetingModal{{ $vapp->id }}"
                tabindex="-1" role="dialog" aria-labelledby="viewMeetingModalTitle{{ $vapp->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">{{ $vapp->meeting->topic }}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="create-meeting-info"><span>{{ __('main.Join URL:') }}</span>
                                {{ $vapp->meeting->join_url }} <a href="{{ $vapp->meeting->join_url }}"
                                    class="btn btn-primary" target="_blank">{{ __('main.Click Link') }}</a></div>
                            <div class="create-meeting-info"><span>{{ __('main.Meeting ID:') }}</span>
                                {{ $vapp->meeting->meeting_id }}</div>
                            <div class="create-meeting-info"><span>{{ __('main.Meeting Password:') }}</span>
                                {{ $vapp->meeting->password }}</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('main.Close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="modal fade" id="ViewPrescription{{ $vapp->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal">
                <div class="modal-content" id="printable">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <div class="prescription-top mb-30">
                                <h2 class="section-title">{{ __('main.All Appointment') }} <span>/
                                        {{ __('main.View Prescription') }}</span></h2>
                            </div>
                            <div class="prescription-area">
                                <div class="prescription-header mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="prescription-header-left">
                                                <h3>{{ isset($vapp->doctor->user->name) ? $vapp->doctor->user->name : '' }}
                                                </h3>
                                                <h4>{{ isset($vapp->doctor->specialist) ? $vapp->doctor->specialist : '' }}
                                                    {{ __('main.Specialist') }}</h4>
                                                <span>{{ isset($vapp->doctor->specialist) ? $vapp->doctor->specialist : '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="prescription-header-center">
                                                <span>{{ __('main.Chamber') }}</span>
                                                <h4>{{ isset($vapp->doctor->chamber) ? $vapp->doctor->chamber : '' }}
                                                </h4>
                                                <p>{{ isset($vapp->doctor->degree) ? $vapp->doctor->degree : '' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="prescription-header-right">
                                                <div class="prescription-timing mb-2">
                                                    <h4>{{ __('Off Day:') }}
                                                        {{ isset($vapp->doctor->offday) ? $vapp->doctor->offday : '' }}
                                                    </h4>
                                                    <span>{{ isset($vapp->doctor->starttime) ? Carbon\Carbon::parse($vapp->doctor->starttime)->format('g:i a') : '' }}
                                                        -
                                                        {{ isset($vapp->doctor->endtime) ? Carbon\Carbon::parse($vapp->doctor->endtime)->format('g:i a') : '' }}</span>
                                                    <span>{{ isset($vapp->doctor->starttime) ? Carbon\Carbon::parse($vapp->doctor->starttime2)->format('g:i a') : '' }}
                                                        -
                                                        {{ isset($vapp->doctor->endtime2) ? Carbon\Carbon::parse($vapp->doctor->endtime)->format('g:i a') : '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prescription-date mb-30">
                                    <p>{{ __('Appointment Date:') }}
                                        {{ Carbon\Carbon::parse($vapp->adddate)->format('d M, Y, D') }} ,
                                        {{ $vapp->slot ? Carbon\Carbon::parse($vapp->slot->start_time)->format('h:i A') : 'N/A' }}-{{ $vapp->slot ? Carbon\Carbon::parse($vapp->slot->end_time)->format('h:i A') : 'N/A' }}
                                    </p>
                                </div>
                                <div class="prescription-body ">
                                    <div class="prescription-info mb-30">
                                        <h3 class="prescription-section-title">{{ __('main.Medicine:') }} </h3>
                                        <div class="primary-table">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('main.Medicine Name') }}</th>
                                                            <th scope="col">{{ __('main.Type') }}</th>
                                                            <th scope="col">{{ __('Mg/Ml') }}</th>
                                                            <th scope="col">{{ __('main.Dose') }}</th>
                                                            <th scope="col">{{ __('main.Day') }}</th>
                                                            <th scope="col">{{ __('main.Comments') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($vapp->prescription as $prescription)
                                                            @if (is_array(json_decode($prescription->medicine_name, true)))
                                                                @php
                                                                    $type = json_decode($prescription->medicine_type, true);
                                                                    $quantity = json_decode($prescription->medicine_quantity, true);
                                                                    $dose = json_decode($prescription->medicine_dose, true);
                                                                    $day = json_decode($prescription->medicine_day, true);
                                                                    $comment = json_decode($prescription->medicine_comment, true);
                                                                @endphp
                                                                @foreach (json_decode($prescription->medicine_name, true) as $key1 => $medicine)
                                                                    <tr>
                                                                        <td>{{ $medicine }}</td>
                                                                        <td>{{ $type[$key1] }}</td>
                                                                        <td>{{ $quantity[$key1] }}</td>
                                                                        <td>{{ $dose[$key1] }}</td>
                                                                        <td>{{ $day[$key1] }}</td>
                                                                        <td>{{ $comment[$key1] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @empty
                                                            <tr>
                                                                <td colspan="7">{{ __('main.No data found!') }}</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 ">
                                            <div class="patient-info mb-30">
                                                <h3 class="prescription-section-title mb-2">
                                                    {{ __('main.Patient Info:') }}</h3>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ __('main.Name') }} </td>
                                                            <td>: <b>{{ $vapp->patient->name }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('main.Age') }} </td>
                                                            <td>: <b>{{ $vapp->patient->age }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('main.Gender') }} </td>
                                                            <td>: <b>{{ $vapp->patient->gender }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('main.Patient Type') }} </td>
                                                            <td>: <b>{{ __('New') }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('main.Blood Pressure') }} </td>
                                                            <td>:
                                                                <b>{{ isset($vapp->prescription()->latest()->first()->patient_bp)? $vapp->prescription()->latest()->first()->patient_bp: '' }}</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="test-repot mb-30">
                                                <h3 class="prescription-section-title mb-3">{{ __('main.Test') }}</h3>
                                                <ul>
                                                    @foreach ($vapp->testprescription as $test)
                                                        <li><span>{{ $test->test_name }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="advice-list-area mb-30">
                                                <h3 class="prescription-section-title mb-3">{{ __('main.Advice') }}
                                                </h3>
                                                <ul>
                                                    @foreach ($vapp->prescription as $comment)
                                                        <li><span>{{ $comment->advice }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prescription-footer text-right">
                                    <a class="primary-btn mr-2"
                                        href="{{ route('pdfdownload', $vapp) }}">{{ __('main.Download') }} </a>
                                    <a class="primary-btn" href="{{ route('printpres', $vapp) }}"
                                        target="_blank">{{ __('main.Print') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ViewPrescription  Modal -->
    @endforeach
    <div class="modal fade" id="noPrescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('main.No Prescription') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('main.No Prescription Available!') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="stripe_cardname" id="stripe_cardname">
    <input type="hidden" name="stripe_cardnumber" id="stripe_cardnumber">
    <input type="hidden" name="stripe_expirydate" id="stripe_expirydate">
    <input type="hidden" name="stripe_expiryyear" id="stripe_expiryyear">
    <input type="hidden" name="stripe_cvv" id="stripe_cvv">
@endsection
@push('script')
    <script src="{{ asset('front/js/patient-appointment.js') }}"></script>
@endpush
