@extends('front.layouts.main')
@section('page_title', __('Quick Appointment'))
@section('content')
    <!-- breadcrumb area start here   -->
    <section class="breadcrumb-area cus-bg-img"  style="background-image: url({{ asset(path_page_banner() . $allsettings['banner']) }})">
        <div class="container">
            <h2 class="page-title">{{ __('main.Quick Appointment') }}</h2>
            <ul class="breadcrumb-page">
                <li><a href="{{ route('front.index') }}">{{ __('main.Home') }}</a></li>
                <li>{{ __('main.Appointment') }}</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb area end here   -->
    <div class="main-section-wrap section" id="js_variable_data" data-jsvar='{{ $redirectPatientVariables }}'>
        <div class="container">
            <div class="section-wraper" id="cong" class="small-cong">
                <div class="tab-content" id="DashboardTabContent">
                    <div class="tab-pane fade show active" id="tabthree" role="tabpanel" aria-labelledby="tabthree-tab">
                        <div class="new-appointment-form">
                            <form id="new-appointment-form" method="POST" action="{{ route('appointment') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="doctor_get_fees" id="doctor_get_fees">
                                <!-- Circles which indicates the steps of the form: -->
                                <div class="form-progres-step small-cong">
                                    <div class="step"><span>{{ __('01') }}</span></div>
                                    <div class="step"><span>{{ __('02') }}</span></div>
                                    <div class="step"><span>{{ __('03') }}</span></div>
                                </div>
                                <!-- One "tab" for each step in the form: -->
                                <input type="hidden" name="slot_id" id="slotid">
                                <input type="hidden" id="appinput" value="" name="appinput">
                                <span data-id="{{ route('patient.set_payment_type') }}" id="payment_type_route"></span>
                                <div class="tab">
                                    <h4 class="form-inner-title">{{ __('main.Select Service & Date') }}</h4>
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
                                                <select name="apptime" id="apptime">
                                                    <option value="">{{ __('main.Select time slot') }}</option>
                                                    @foreach ($docslots as $docslot)
                                                        <option value="{{ $docslot->id }}"
                                                            data-time="{{ $docslot->start_time }}-{{ $docslot->end_time }}">
                                                            {{ Carbon\Carbon::parse($docslot->start_time)->format('h:i A') }}-
                                                            {{ Carbon\Carbon::parse($docslot->end_time)->format('h:i A') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
                                    <input type="hidden" name="selectdoctory" value="{{ $doctorselected->id }}">
                                    <input type="hidden" name="slot_id" value="">
                                    <input type="hidden" id="paypaldocservice" name="DoctorsService"
                                        value="{{ $doctorselected->category->name }}">
                                </div>
                                <div class="tab">
                                    <h3 class="form-title">{{ __('main.Check Information Place Comment') }}</h3>
                                    <h4 class="form-inner-title"></h4>
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
                                        <label for="Comment">{{ __('main.Comment') }}</label>
                                        <textarea name="comment" class="form-control comment-box" id="Comment" rows="3"
                                            placeholder="{{ __('main.brief-text') }} "></textarea>
                                    </div>
                                </div>
                                <div class="tab">
                                    <h3 class="form-title">{{ __('main.Select Payment method') }}</h3>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="form-group" id="toggler">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button type="button" id="prevBtn">{{ __('main.Previous') }}</button>
                                    <button type="button" id="nextBtn">{{ __('main.Next') }}</button>
                                </div>
                            </form>
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
    <!-- paypal form -->
    <form id="paypalform" action="{{ route('pay') }}" method="POST">
        @csrf
        <input type="hidden" name="selectdoctory" id="paypal_docid" value='{{ $doctorselected->id }}'>
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
@endsection
@push('script')
    <script src="{{ asset('front/js/redirect-patient.js') }}"></script>
@endpush
