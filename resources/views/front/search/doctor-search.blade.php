@forelse($todaysapp as $app)
    <tr>
        <td>
            <div class="user-info">
                <img class="user-image" src="{{ isset($app->patient->image) ? asset(path_user_image().$app->patient->image) : Avatar::create($app->patient->name)->toBase64()}}" alt="{{ __('doctor-image') }}" />
                <h3 class="user-name">{{$app->patient->name}}</h3>
            </div>
        </td>
        <td>{{$app->appdate}}</td>
        <td>{{Carbon\Carbon::parse($app->slot->start_time)->format('H:i A')}}</td>
        <td>{{$app->type == OFFLINE ? __('main.Offline') : __('main.Online')}}</td>
        <td>
            @if (Carbon\Carbon::parse($app->appdate) < Carbon\Carbon::today() && $app->status == 0)
                <span class="text-danger">
                            {{ __('main.Cancelled') }} <!-- No action taken by doctor -->
                        </span>
            @endif
            @if (Carbon\Carbon::parse($app->appdate) > Carbon\Carbon::today() && $app->status == 0)
                <span class="text-danger">
                            {{ __('main.Cancelled') }} <!-- No action taken by doctor -->
                        </span>
            @endif
            @if (Carbon\Carbon::parse($app->appdate) == Carbon\Carbon::today() && $app->status == 0)
                <span class="text-info">
                            {{ __('main.Pending') }} <!-- Approval required -->
                        </span>
            @endif
            @if (Carbon\Carbon::parse($app->appdate) < Carbon\Carbon::today() && $app->status == 1)
                <span class="text-danger">
                                {{ __('main.Cancelled') }} <!-- Cancelled -->
                            </span>
            @endif
            @if (Carbon\Carbon::parse($app->appdate) > Carbon\Carbon::today() && $app->status == 1)
                <span class="text-warning">
                            {{ __('main.Approved') }} <!-- Upcoming -->
                        </span>
            @endif
            @if (Carbon\Carbon::parse($app->appdate) == Carbon\Carbon::today() && $app->status == 1)
                <span class="text-warning">
                            {{ __('main.Approved') }} <!-- Ongoing -->
                        </span>
            @endif
            @if ($app->status == 2)
                <span class="completed">
                            {{ __('main.Completed') }} <!-- Completed -->
                        </span>
            @endif
            @if ($app->status == 3)
                <span class="text-danger">
                            {{ __('main.Cancelled') }} <!-- Cancelled by Doctor -->
                        </span>
            @endif
        </td>
        <td>
            @if ($app->status == 2)
                <a class="common-tbl-btn view-button" role="button" data-toggle="modal" data-target="#ViewPrescription{{$app->id}}">{{ __('main.View Prescription') }}</a>
            @elseif ($app->status == 3)
                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)" role="button">{{ __('main.No Prescription') }}</a>
            @else
                @if (Auth::user()->role == 'doctor')
                    <a class="common-tbl-btn create-button" role="button" data-toggle="modal" data-target="#MakePrescription{{$app->id}}">{{ __('main.Make Prescription') }}</a>
                @else
                    <a class="common-tbl-btn disabled-btn" href="javascript:void(0)" role="button">{{ __('main.No Prescription') }}</a>
                @endif
            @endif
        </td>
        @if (Auth::user()->role == 'doctor')
            <td>
                @if (Carbon\Carbon::parse($app->appdate) == Carbon\Carbon::today() && $app->status == 1 && $app->type != OFFLINE)
                    @if (hasMeeting($app->id) == 1)
                        <a class="common-tbl-btn view-button" role="button" data-toggle="modal" data-target="#viewMeetingModal{{$app->id}}">{{ __('main.View') }}</a>
                    @else
                        <a class="common-tbl-btn create-button" role="button" data-toggle="modal" data-target="#createMeetingModal{{$app->id}}">{{ __('main.Create') }}</a>

                    @endif
                @else
                    <a class="common-tbl-btn disabled-btn" role="button">{{ __('main.No Link') }}</a>
                @endif
            </td>
        @endif
        <td>
            <div class="action-btn-wrap">
                @if (Auth::user()->role == 'doctor')
                    @if ($app->status != 2)
                        <button title="{{__('Delete')}}" class="common-tbl-btn delete-button" role="button" data-toggle="modal" data-target="#cancelAppointmentModal{{$app->id}}"><i class="fas fa-trash-alt"></i></button>
                    @endif
                @endif
                    <div id="heading{{ $app->id }}">
                        <button class="common-tbl-btn show-icon collapsed" type="button" title="Show Details" data-toggle="collapse" data-target="#collapse2{{ $app->id }}">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
            </div>
        </td>
    </tr>
    <tr class="show-details-content">
        <td colspan="8">
            <div id="collapse2{{ $app->id }}" class="collapse" data-parent="#accordionExample2">
                <div class="card-body d-flex">
                    <div>
                        <div class="show-details-content-item">
                            {{__('main.Patient:')}}<span>{{isset($app->patient->name) ? $app->patient->name : ''}}</span>
                        </div>
                        <div class="show-details-content-item">
                            {{__('main.Appointment Date:')}}<span>{{$app->appdate}}</span>
                        </div>
                        <div class="show-details-content-item">
                            {{__('main.Appointment Time:')}}<span>{{Carbon\Carbon::parse($app->slot->start_time)->format('H:i A')}}-{{Carbon\Carbon::parse($app->slot->end_time)->format('H:i A')}}</span>
                        </div>
                        <div class="show-details-content-item">
                            {{__('main.Appointment Type:')}}<span>{{$app->type == OFFLINE ? __('main.Offline') : __('main.Online')}}</span>
                        </div>
                        <div class="show-details-content-item">
                            {{__('main.Payment Method:')}}<span>{{$app->paymentmethod == 'cod' ? 'Spot Payment' : ucfirst($app->paymentmethod)}}</span>
                        </div>
                        <div class="show-details-content-item">
                            {{__('main.Fees:')}}<span>{{$app->fees}}&#36;</span>
                        </div>
                        @if ($app->type != OFFLINE)
                            @if (hasMeeting($app->id) == 1)
                                <div class="show-details-content-item">
                                    {{__('main.Join URL:')}} <span><a href="{{$app->meeting->join_url}}" target="_blank">{{ __('Goto Link') }}</a></span>
                                </div>
                                <div class="show-details-content-item">
                                    {{__('main.Meeting ID:')}} <span>{{$app->meeting->meeting_id}}</span>
                                </div>
                                <div class="show-details-content-item">
                                    {{__('main.Meeting Password:')}} <span>{{$app->meeting->password}}</span>
                                </div>
                            @else
                                <div class="show-details-content-item">{{__('main.Meeting not available!')}}</div>
                            @endif
                        @endif
                        <div class="show-details-content-item">
                            {{__('main.Comment:')}}<span>{{$app->comment}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@empty
    <tr rowspan="4">
        <td colspan="8">
            <div>
                <img class="img-fluid w-100" src="{{ asset('uploaded_file/no-data.png') }}" alt="{{ __('image') }}">
            </div>
        </td>
    </tr>
@endforelse
