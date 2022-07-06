<div class="primary-table">
    <div class="table-responsive">
        <table class="table" id="pastsearch">
            <thead>
                <tr>
                    <th scope="col">{{ __('main.Patient Name') }}</th>
                    <th scope="col">{{ __('main.Date') }}</th>
                    <th scope="col">{{ __('main.Time') }}</th>
                    <th scope="col">{{ __('main.Type') }}</th>
                    <th scope="col">{{ __('main.Status') }}</th>
                    <th scope="col">{{ __('main.Prescription') }}</th>
                    @if (Auth::user()->role == 'doctor')
                        <th scope="col">{{ __('main.Meeting Link') }}</th>
                    @endif
                    <th scope="col">{{ __('main.Action') }}</th>
                </tr>
            </thead>
            <tbody class="accordion" id="accordionExample1">
                @forelse($pastapp as $papp)
                    <tr>
                        <td>
                            <div class="user-info">
                                <img class="user-image"
                                    src="{{ isset($papp->patient->image) ? asset(path_user_image() . $papp->patient->image) : Avatar::create($papp->patient->name)->toBase64() }}"
                                    alt="{{ __('doctor-image') }}" />
                                <h3 class="user-name">{{ $papp->patient->name }}</h3>
                            </div>
                        </td>
                        <td>{{ $papp->appdate }}</td>
                        <td>{{ $papp->slot ? Carbon\Carbon::parse($papp->slot->start_time)->format('H:i A') : 'N/A' }}
                        </td>
                        <td>{{ $papp->type == OFFLINE ? __('main.Offline') : __('main.Online') }}</td>
                        <td>
                            @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 0)
                                <span class="text-danger">
                                    {{ __('main.Cancelled') }}
                                    <!-- No action taken by doctor -->
                                </span>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 0)
                                <span class="text-danger">
                                    {{ __('main.Cancelled') }}
                                    <!-- No action taken by doctor -->
                                </span>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 0)
                                <span class="text-info">
                                    {{ __('main.Pending') }}
                                    <!-- Approval required -->
                                </span>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 1)
                                <span class="text-danger">
                                    {{ __('main.Cancelled') }}
                                    <!-- Cancelled -->
                                </span>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 1)
                                <span class="text-warning">
                                    {{ __('main.Approved') }}
                                    <!-- Upcoming -->
                                </span>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 1)
                                <span class="text-warning">
                                    {{ __('main.Approved') }}
                                    <!-- Ongoing -->
                                </span>
                            @endif
                            @if ($papp->status == 2)
                                <span class="completed">
                                    {{ __('main.Completed') }}
                                    <!-- Completed -->
                                </span>
                            @endif
                            @if ($papp->status == 3)
                                <span class="text-danger">
                                    {{ __('main.Cancelled') }}
                                    <!-- Cancelled by Doctor -->
                                </span>
                            @endif
                        </td>
                        <td>
                            @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 0)
                                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                    role="button">{{ __('main.No Prescription') }}</a>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 0)
                                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                    role="button">{{ __('main.No Prescription') }}</a>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 0)
                                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                    role="button">{{ __('main.No Prescription') }}</a>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) < Carbon\Carbon::today() && $papp->status == 1)
                                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                    role="button">{{ __('main.No Prescription') }}</a>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) > Carbon\Carbon::today() && $papp->status == 1)
                                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                    role="button">{{ __('main.No Prescription') }}</a>
                            @endif
                            @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 1)
                                @if (Auth::user()->role == 'doctor')
                                    <a class="common-tbl-btn create-button" role="button" data-toggle="modal"
                                        data-target="#MakePrescription{{ $papp->id }}">{{ __('main.Make Prescription') }}</a>
                                @else
                                    <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                        role="button">{{ __('main.No Prescription') }}</a>
                                @endif
                            @endif
                            @if ($papp->status == 2)
                                <a class="common-tbl-btn view-button" href="javascript:void(0)" role="button"
                                    data-toggle="modal"
                                    data-target="#ViewPrescription{{ $papp->id }}">{{ __('main.View Prescription') }}</a>
                            @endif
                            @if ($papp->status == 3)
                                <a class="common-tbl-btn disabled-btn" href="javascript:void(0)"
                                    role="button">{{ __('main.No Prescription') }}</a>
                            @endif
                        </td>
                        @if (Auth::user()->role == 'doctor')
                            <td>
                                @if (Carbon\Carbon::parse($papp->appdate) == Carbon\Carbon::today() && $papp->status == 1 && $papp->type != OFFLINE)
                                    @if (hasMeeting($papp->id) == 1)
                                        <a class="common-tbl-btn view-button" role="button" data-toggle="modal"
                                            data-target="#viewMeetingModal{{ $papp->id }}">{{ __('main.View') }}</a>
                                    @else
                                        <button class="common-tbl-btn create-button" role="button" data-toggle="modal"
                                            data-target="#createMeetingModal{{ $papp->id }}">{{ __('main.Create') }}</button>
                                    @endif
                                @else
                                    <a class="common-tbl-btn disabled-btn" role="button">{{ __('main.No Link') }}</a>
                                @endif
                            </td>
                        @endif
                        <td>
                            <div class="action-btn-wrap">
                                @if (Auth::user()->role == 'doctor')
                                    @if ($papp->status != 2)
                                        <button title="Delete" class="common-tbl-btn delete-button" role="button"
                                            data-toggle="modal"
                                            data-target="#cancelAppointmentModal{{ $papp->id }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                    @endif
                                @endif
                                <div id="heading{{ $papp->id }}">
                                    <button class="common-tbl-btn show-icon collapsed" type="button"
                                        title="Show Details" data-toggle="collapse"
                                        data-target="#collapse1{{ $papp->id }}">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="show-details-content">
                        <td colspan="6">
                            <div id="collapse1{{ $papp->id }}" class="collapse"
                                data-parent="#accordionExample1">
                                <div class="card-body d-flex">
                                    <div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Patient:') }}<span>{{ isset($papp->patient->name) ? $papp->patient->name : '' }}</span>
                                        </div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Appointment Date:') }}<span>{{ $papp->appdate }}</span>
                                        </div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Appointment Time:') }}<span>{{ $papp->slot ? Carbon\Carbon::parse($papp->slot->start_time)->format('H:i A') : 'N/A' }}-{{ $papp->slot ? Carbon\Carbon::parse($papp->slot->end_time)->format('H:i A') : 'N/A' }}</span>
                                        </div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Appointment Type:') }}<span>{{ $papp->type == OFFLINE ? __('main.Offline') : __('main.Online') }}</span>
                                        </div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Payment Method:') }}<span>{{ $papp->paymentmethod == 'cod' ? 'Spot Payment' : ucfirst($papp->paymentmethod) }}</span>
                                        </div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Payment Method:') }}<span
                                                class="{{ $papp->is_paid == '1' ? 'text-success' : 'text-danger' }}">{{ $papp->is_paid == '1' ? 'Paid' : 'Unpaid' }}</span>
                                        </div>
                                        <div class="show-details-content-item">
                                            {{ __('main.Fees:') }}<span>{{ $papp->fees }}&#36;</span>
                                        </div>
                                        @if ($papp->type != OFFLINE)
                                            @if (hasMeeting($papp->id) == 1)
                                                <div class="show-details-content-item">
                                                    {{ __('main.Join URL:') }} <span><a
                                                            href="{{ $papp->meeting->join_url }}"
                                                            target="_blank">{{ __('Goto Link') }}</a></span>
                                                </div>
                                                <div class="show-details-content-item">
                                                    {{ __('main.Meeting ID:') }}
                                                    <span>{{ $papp->meeting->meeting_id }}</span>
                                                </div>
                                                <div class="show-details-content-item">
                                                    {{ __('main.Meeting Password:') }}
                                                    <span>{{ $papp->meeting->password }}</span>
                                                </div>
                                            @else
                                                <div class="show-details-content-item">
                                                    {{ __('main.Meeting not available!') }}</div>
                                            @endif
                                        @endif
                                        <div class="show-details-content-item">
                                            {{ __('main.Comment:') }}<span>{{ $papp->comment }}</span>
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
                                <img class="img-fluid w-100" src="{{ asset('uploaded_file/no-data.png') }}"
                                    alt="{{ __('image') }}">
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination-past mt-30">
        {{ view_html($pastapp->links('vendor.pagination.doctorpast')) }}
    </div>
</div>
