@extends('layouts.main')
@section('title', __('Payment Method Settings'))
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
                        <i class="ik ik-dollar-sign bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Payment Method') }}</h5>
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
                                <a href="#">{{ __('Payment Method') }}</a>
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
                        <h3>{{ __('Payment Method Settings') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>{{ __('Payment Method Setting elements') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="forms-sample" action="{{ route('paymentmethod.update') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="PAYPAL_BASE_URI">{{ __('Paypal Base Uri') }}</label>
                                                        <input name="PAYPAL_BASE_URI" type="text"
                                                            value="{{ !empty($pms) ? $pms->PAYPAL_BASE_URI : '' }}"
                                                            class="form-control" id="PAYPAL_BASE_URI"
                                                            placeholder="{{ __('Paypal Base uri') }}">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('PAYPAL_BASE_URI')) }}</span>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="PAYPAL_CLIENT_ID">{{ __('Paypal Client Id') }}</label>
                                                        <input name="PAYPAL_CLIENT_ID" type="text"
                                                            value="{{ !empty($pms) ? $pms->PAYPAL_CLIENT_ID : '' }}"
                                                            class="form-control" id="PAYPAL_CLIENT_ID"
                                                            placeholder="{{ __('Paypal Client Id') }}">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('PAYPAL_CLIENT_ID')) }}</span>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="PAYPAL_CLIENT_SECRET">{{ __('Paypal Client Secret') }}</label>
                                                        <input name="PAYPAL_CLIENT_SECRET" type="text"
                                                            value="{{ !empty($pms) ? $pms->PAYPAL_CLIENT_SECRET : '' }}"
                                                            class="form-control" id="PAYPAL_CLIENT_SECRET"
                                                            placeholder="{{ __('Paypal Client Id') }}">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('PAYPAL_CLIENT_SECRET')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="PAYPAL_STATUS">{{ __('Paypal Status') }}</label>
                                                        <select name="PAYPAL_STATUS" id="PAYPAL_STATUS"
                                                            class="form-control">
                                                            <option value="1"
                                                                {{ env('PAYPAL_STATUS') == '1' ? 'selected' : '' }}>
                                                                {{ __('Active') }}</option>
                                                            <option value="0"
                                                                {{ env('PAYPAL_STATUS') == '0' ? 'selected' : '' }}>
                                                                {{ __('Inactive') }}</option>
                                                        </select>
                                                        <span
                                                            class="text-danger">{{ __($errors->first('PAYPAL_STATUS')) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">

                                                    <div class="form-group">
                                                        <label for="STRIPE_KEY">{{ __('Stripe key') }}</label>
                                                        <input name="STRIPE_KEY" type="text"
                                                            value="{{ !empty($pms) ? $pms->STRIPE_KEY : '' }}"
                                                            class="form-control" id="STRIPE_KEY"
                                                            placeholder="{{ __('Stripe Key') }}">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('STRIPE_KEY')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="STRIPE_SECRET">{{ __('Stripe Secret') }}</label>
                                                        <input name="STRIPE_SECRET" type="text"
                                                            value="{{ !empty($pms) ? $pms->STRIPE_SECRET : '' }}"
                                                            class="form-control" id="STRIPE_SECRET"
                                                            placeholder="{{ __('Stripe Secret') }}">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('STRIPE_SECRET')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="STRIPE_STATUS">{{ __('Stripe Status') }}</label>
                                                        <select name="STRIPE_STATUS" id="STRIPE_STATUS"
                                                            class="form-control">
                                                            <option value="1"
                                                                {{ env('STRIPE_STATUS') == '1' ? 'selected' : '' }}>
                                                                {{ __('Active') }}</option>
                                                            <option value="0"
                                                                {{ env('STRIPE_STATUS') == '0' ? 'selected' : '' }}>
                                                                {{ __('Inactive') }}</option>
                                                        </select>
                                                        <span
                                                            class="text-danger">{{ __($errors->first('STRIPE_STATUS')) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="sslcz_store_id">Sslcommerz Store Id</label>
                                                        <input type="text" name="sslcz_store_id" class="form-control"
                                                            value="{{ env('SSLCZ_STORE_ID') }}"
                                                            placeholder="Sslcommerz Store id">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('sslcz_store_id')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="sslcz_store_password">Sslcommerz Store Password</label>
                                                        <input type="text" name="sslcz_store_password"
                                                            class="form-control"
                                                            value="{{ env('SSLCZ_STORE_PASSWORD') }}"
                                                            placeholder="Sslcommerz Store id">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('sslcz_store_password')) }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="sslcz_status">Sslcommerz Status</label>
                                                        <select name="sslcz_status" id="sslcz_status"
                                                            class="form-control">
                                                            <option value="1"
                                                                {{ env('SSLCZ_STATUS') == '1' ? 'selected' : '' }}>
                                                                {{ __('Active') }}</option>
                                                            <option value="0"
                                                                {{ env('SSLCZ_STATUS') == '0' ? 'selected' : '' }}>
                                                                {{ __('Inactive') }}</option>
                                                        </select>
                                                        <span
                                                            class="text-danger">{{ __($errors->first('sslcz_status')) }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bank_name">Bank Name</label>
                                                        <input type="text" name="bank_name" class="form-control"
                                                            value="{{ env('BANK_NAME') }}" placeholder="Bank Name">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('bank_name')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bank_account_name">Bank Account Name</label>
                                                        <input type="text" name="bank_account_name" class="form-control"
                                                            value="{{ env('BANK_ACCOUNT_NAME') }}"
                                                            placeholder="Bank Account Name">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('bank_account_name')) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bank_account_number">Bank Account Number</label>
                                                        <input type="text" name="bank_account_number" class="form-control"
                                                            value="{{ env('BANK_ACCOUNT_NUMBER') }}"
                                                            placeholder="Bank Account Number">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('bank_account_number')) }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bank_branch">Bank Branch</label>
                                                        <input type="text" name="bank_branch" class="form-control"
                                                            value="{{ env('BANK_BRANCH') }}" placeholder="Bank Branch">
                                                        <span
                                                            class="text-danger">{{ __($errors->first('bank_branch')) }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bank_status">Bank Status</label>
                                                        <select name="bank_status" id="bank_status" class="form-control">
                                                            <option value="1"
                                                                {{ env('BANK_STATUS') == '1' ? 'selected' : '' }}>
                                                                {{ __('Active') }}</option>
                                                            <option value="0"
                                                                {{ env('BANK_STATUS') == '0' ? 'selected' : '' }}>
                                                                {{ __('Inactive') }}</option>
                                                        </select>
                                                        <span
                                                            class="text-danger">{{ __($errors->first('bank_status')) }}</span>
                                                    </div>
                                                </div>

                                            </div>



                                            <button type="submit"
                                                class="btn btn-primary mr-2">{{ __('Update') }}</button>
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
