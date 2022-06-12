@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/admin/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/css/pages/page-user-view.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/pickr/pickr-themes.css') }}" />
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="row gy-4">

                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class=" d-flex align-items-center flex-column">
                                        <img class="img-fluid rounded my-4" src="/{{ $user->image }}" height="110"
                                            width="110" alt="User avatar" />
                                        <div class="user-info text-center">
                                            <h5 class="mb-2">{{ $user->name }}</h5>
                                            {{-- <span class="badge bg-label-secondary">Author</span> --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                                    <div class="d-flex align-items-start me-4 mt-3 gap-3">
                                        <span class="badge bg-label-primary p-2 rounded"><i
                                                class='bx bx-check bx-sm'></i></span>
                                        <div>
                                            <h5 class="mb-0">1.23k</h5>
                                            <span>Tasks Done</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start mt-3 gap-3">
                                        <span class="badge bg-label-primary p-2 rounded"><i
                                                class='bx bx-customize bx-sm'></i></span>
                                        <div>
                                            <h5 class="mb-0">568</h5>
                                            <span>Projects Done</span>
                                        </div>
                                    </div>
                                </div> --}}
                                <h5 class="pb-2 border-bottom mb-4">Details</h5>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">Name:</span>
                                            <span>{{ $user->name }}</span>
                                        </li>
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">Age:</span>
                                            <span>{{ $user->age }}</span>
                                        </li>
                                        {{-- <li class="mb-3">
                                            <span class="fw-bold me-2">GENDER:</span>
                                            <span>{{ $user->gender }}</span>
                                        </li> --}}
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">HEIGHT:</span>
                                            <span>{{ $user->height }}</span>
                                        </li>
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">WEIGHT:</span>
                                            <span>{{ $user->weight }}</span>
                                        </li>
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">SCHOOL LEVEL:</span>
                                            <span>{{ $user->school_level }}</span>
                                        </li>
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">SCHOOL NAME:</span>
                                            <span>{{ $user->school_name }}</span>
                                        </li>
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">STATE:</span>
                                            <span>{{ $user->state }}</span>
                                        </li>
                                        {{-- <li class="mb-3">
                                            <span class="fw-bold me-2">POSITION:</span>
                                            <span>{{ $user->position }}</span>
                                        </li> --}}
                                        <li class="mb-3">
                                            <span class="fw-bold me-2">DESCRIPTION:</span>
                                            <span>{{ $user->description }}</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center pt-3">
                                        <a href="{{ route('athlete.edit', $user->id) }}"
                                            class="btn btn-primary me-3">Edit</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                        <!-- Plan Card -->

                        <!-- /Plan Card -->
                    </div>
                    <!--/ User Sidebar -->


                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                        <!-- User Pills -->
                        {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                        class="bx bx-user me-1"></i>Account</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('app/user/view/security') }}"><i
                                        class="bx bx-lock-alt me-1"></i>Security</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('app/user/view/billing') }}"><i class="bx bx-detail me-1"></i>Billing &
                                    Plans</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('app/user/view/notifications') }}"><i
                                        class="bx bx-bell me-1"></i>Notifications</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('app/user/view/connections') }}"><i
                                        class="bx bx-link-alt me-1"></i>Connections</a></li>
                        </ul> --}}
                        <!--/ User Pills -->



                        <!-- Invoice table -->
                        <div class="">

                            <div class="d-flex justify-content-between pt-3">
                                <h5 class="card-header">User's Statics</h5>
                                <div>
                                    <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#addNewStatics"
                                        data-bs-toggle="modal">Add New Statics</a>
                                </div>

                            </div>
                            <div class="accordion mt-3 accordion-header-primary" id="accordionStyle1">
                                @foreach ($user->staticsList as $item)
                                    <div class="accordion-item card  " style="background-color: #ededed;">
                                        <h2 class="accordion-header">
                                            <button type="button" class="accordion-button collapsed"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#accordionStyle1-{{ $item->id }}"
                                                aria-expanded="false">
                                                Statics of {{ $item->created_at->format('M,d y h:m:s A') }}
                                            </button>
                                        </h2>

                                        <div id="accordionStyle1-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionStyle1">
                                            <div class="accordion-body">
                                                <form action="{{ route('student.manageStatics') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="statics_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="student_id" value="{{ $user->id }}">
                                                    <div class="row my-4">
                                                        <div class="col">
                                                            <div class="accordion"
                                                                id="collapsibleSection{{ $item->id }}">
                                                                <!-- Delivery Address -->
                                                                <div class="card accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="headingPitchingStats{{ $item->id }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapsePitchingStats-{{ $item->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapsePitchingStats-{{ $item->id }}">
                                                                            Pitching
                                                                            Stats </button>
                                                                    </h2>
                                                                    <div id="collapsePitchingStats-{{ $item->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingPitchingStats{{ $item->id }}"
                                                                        data-bs-parent="#collapsibleSection{{ $item->id }}"
                                                                        style="">

                                                                        <div class="accordion-body">
                                                                            <div class="row g-3">

                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="top_pitch_velocity">Top
                                                                                        pitch velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_pitch_velocity"
                                                                                        id="top_pitch_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Top pitch velocity"
                                                                                        value="{{ $item->top_pitch_velocity }}">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="fb_range">FB
                                                                                        Range</label>
                                                                                    <input type="text" name="fb_range"
                                                                                        id="fb_range" class="form-control"
                                                                                        placeholder="FB Range"
                                                                                        value="{{ $item->fb_range }}">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="top_spin">Top
                                                                                        Spin</label>
                                                                                    <input type="text" name="top_spin"
                                                                                        id="top_spin" class="form-control"
                                                                                        placeholder="Top Spin"
                                                                                        value="{{ $item->top_spin }}">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_ch_velocity">Top CH
                                                                                        Velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_ch_velocity"
                                                                                        id="top_ch_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Top ch velocity"
                                                                                        value="{{ $item->top_ch_velocity }}">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_ch_spin">Top Spin for CH
                                                                                        Velocity</label>
                                                                                    <input type="text" name="top_ch_spin"
                                                                                        value="{{ $item->top_ch_spin }}"
                                                                                        id="top_ch_spin"
                                                                                        class="form-control"
                                                                                        placeholder="TOP SPIN FOR CH VELOCITY">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_cb_velocity">Top CB
                                                                                        Velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_cb_velocity"
                                                                                        id="top_cb_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Top cb velocity"
                                                                                        value="{{ $item->top_cb_velocity }}">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_cb_spin">Top Spin
                                                                                        for CB Velocity</label>
                                                                                    <input type="text" name="top_cb_spin"
                                                                                        id="top_cb_spin"
                                                                                        class="form-control"
                                                                                        value="{{ $item->top_cb_spin }}"
                                                                                        placeholder="Top Spin for CB Velocity">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_sl_velocity">Top SL
                                                                                        Velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_sl_velocity"
                                                                                        value="{{ $item->top_sl_velocity }}"
                                                                                        id="top_sl_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Top sl velocity">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_sl_spin">Top Spin for SL
                                                                                        Velocity</label>
                                                                                    <input type="text" name="top_sl_spin"
                                                                                        id="top_sl_spin"
                                                                                        class="form-control"
                                                                                        value="{{ $item->top_sl_spin }}"
                                                                                        placeholder="Top Spin for SL  Velocity">
                                                                                </div>

                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_ct_velocity">Top CT
                                                                                        Velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_ct_velocity"
                                                                                        value="{{ $item->top_ct_velocity }}"
                                                                                        id="top_ct_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Top CT Velocity">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_ct_velocity">Top spin for
                                                                                        CT Velocity</label>
                                                                                    <input type="text" name="top_ct_spin"
                                                                                        id="top_ct_spin"
                                                                                        value="{{ $item->top_ct_spin }}"
                                                                                        class="form-control"
                                                                                        placeholder="Top ct velocity">
                                                                                </div>


                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_kn_velocity">Top KN
                                                                                        Velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_kn_velocity"
                                                                                        value="{{ $item->top_kn_velocity }}"
                                                                                        id="top_kn_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Top KN Velocity">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="form-label"
                                                                                        for="top_kn_spin">Top spin For KN
                                                                                        Velocity</label>
                                                                                    <input type="text" name="top_kn_spin"
                                                                                        value="{{ $item->top_kn_spin }}"
                                                                                        id="top_kn_spin"
                                                                                        class="form-control"
                                                                                        placeholder="Top spin For KN Velocity">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Delivery Options -->
                                                                <div class="card accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="headingHittingStatus{{ $item->id }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseHittingStatus{{ $item->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseHittingStatus{{ $item->id }}">
                                                                            Hitting
                                                                            Status </button>
                                                                    </h2>
                                                                    <div id="collapseHittingStatus{{ $item->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingHittingStatus{{ $item->id }}"
                                                                        data-bs-parent="#collapsibleSection{{ $item->id }}"
                                                                        style="">
                                                                        <div class="accordion-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="top_exit_velocity"> Top
                                                                                        Exit velocity</label>
                                                                                    <input type="text"
                                                                                        name="top_exit_velocity"
                                                                                        id="top_exit_velocity"
                                                                                        value="{{ $item->top_exit_velocity }}"
                                                                                        class="form-control"
                                                                                        placeholder="Top exit velocity">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="max_distance"> Max
                                                                                        Distance (FT)</label>
                                                                                    <input type="text" name="max_distance"
                                                                                        value="{{ $item->max_distance }}"
                                                                                        id="max_distance"
                                                                                        class="form-control"
                                                                                        placeholder="Max Distance (FT)">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="avarage_distance"> Avarage
                                                                                        Distance (FT)</label>
                                                                                    <input type="text"
                                                                                        name="avarage_distance"
                                                                                        value="{{ $item->avarage_distance }}"
                                                                                        id="avarage_distance"
                                                                                        class="form-control"
                                                                                        placeholder="Avarage Distance (FT)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Payment Method -->
                                                                <div class="card accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="headingPositionStatus{{ $item->id }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapsePositionStatus{{ $item->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapsePositionStatus"> Position
                                                                            Status</button>
                                                                    </h2>
                                                                    <div id="collapsePositionStatus{{ $item->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingPositionStatus{{ $item->id }}"
                                                                        data-bs-parent="#collapsibleSection{{ $item->id }}">
                                                                        <div class="accordion-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="Inf_velocity"> Inf
                                                                                        Velocity</label>
                                                                                    <input type="text" name="inf_velocity"
                                                                                        value="{{ $item->inf_velocity }}"
                                                                                        id="inf_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Inf Velocity">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="of_velocity"> Of
                                                                                        Velocity</label>
                                                                                    <input type="text" name="of_velocity"
                                                                                        value="{{ $item->of_velocity }}"
                                                                                        id="of_velocity"
                                                                                        class="form-control"
                                                                                        placeholder="Of Velocity">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="c_pop">
                                                                                        C-pop</label>
                                                                                    <input type="text" name="c_pop"
                                                                                        id="c_pop"
                                                                                        value="{{ $item->c_pop }}"
                                                                                        class="form-control"
                                                                                        placeholder="C-pop">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="headingOthersStatus{{ $item->id }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseOthersStatus{{ $item->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseOthersStatus{{ $item->id }}">
                                                                            Others
                                                                            Status</button>
                                                                    </h2>
                                                                    <div id="collapseOthersStatus{{ $item->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingOthersStatus{{ $item->id }}"
                                                                        data-bs-parent="#collapsibleSection{{ $item->id }}">
                                                                        <div class="accordion-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="vertical_jump">
                                                                                        Vertical jump</label>
                                                                                    <input type="text" name="vertical_jump"
                                                                                        id="vertical_jump"
                                                                                        value="{{ $item->vertical_jump }}"
                                                                                        class="form-control"
                                                                                        placeholder="Top pitch velocity">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="40yd_sprint_time"> 40yd
                                                                                        sprint time</label>
                                                                                    <input type="text"
                                                                                        name="40yd_sprint_time"
                                                                                        id="40yd_sprint_time"
                                                                                        value="{{ $item['40yd_sprint_time'] }}"
                                                                                        class="form-control"
                                                                                        placeholder="40yd sprint time">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label"
                                                                                        for="3d_resistance_score">
                                                                                        3d resistance score</label>
                                                                                    <input type="text"
                                                                                        name="3d_resistance_score"
                                                                                        value="{{ $item['3d_resistance_score'] }}"
                                                                                        id="3d_resistance_score"
                                                                                        class="form-control"
                                                                                        placeholder="3d resistance score">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Payment Method -->
                                                                <div class="card accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="VideoStatus{{ $user->id }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseVideoStatus{{ $user->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseVideoStatus{{ $user->id }}">
                                                                            Video
                                                                            Status</button>
                                                                    </h2>
                                                                    <div id="collapseVideoStatus{{ $user->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="VideoStatus{{ $user->id }}"
                                                                        data-bs-parent="#collapsibleSection{{ $user->id }}">
                                                                        <div class="accordion-body">
                                                                            <div class="row">
                                                                                <div class="col-md-7">
                                                                                    <label class="form-label"
                                                                                        for="velocity_video">
                                                                                        Velocity/Pitch video link </label>
                                                                                    <input type="text" name="velocity_video"
                                                                                        id="velocity_video"
                                                                                        value="{{ $item->velocity_video }}"
                                                                                        class="form-control"
                                                                                        placeholder="Velocity /Pitch video link" />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label class="form-label"
                                                                                        for="valo_video_date">Video date
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        id="flatpickr-datetime"
                                                                                        name="valo_video_date"
                                                                                        value="{{ $item->valo_video_date }}"
                                                                                        class="form-control dob-picker"
                                                                                        placeholder="YYYY-MM-DD" />
                                                                                </div>
                                                                                <div class="col-md-7">
                                                                                    <label class="form-label"
                                                                                        for="velocity_video2"> Velocity
                                                                                        /Pitch video link 2
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        name="velocity_video2"
                                                                                        id="velocity_video2"
                                                                                        value="{{ $item->velocity_video2 }}"
                                                                                        class="form-control"
                                                                                        placeholder="Velocity /Pitch video link 2" />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label class="form-label"
                                                                                        for="valo_video_date2">Video date
                                                                                    </label>
                                                                                    <input type="text" id="valo_video_date2"
                                                                                        name="valo_video_date2"
                                                                                        value="{{ $item->valo_video_date2 }}"
                                                                                        class="form-control dob-picker"
                                                                                        placeholder="YYYY-MM-DD" />
                                                                                </div>

                                                                                <div class="col-md-7">
                                                                                    <label class="form-label"
                                                                                        for="sprint_video"> Spint video
                                                                                        link: </label>
                                                                                    <input type="text" name="sprint_video"
                                                                                        id="sprint_video"
                                                                                        value="{{ $item->sprint_video }}"
                                                                                        class="form-control"
                                                                                        placeholder="Spint video link:" />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label class="form-label"
                                                                                        for="multicol-last-name">It's
                                                                                        date </label>
                                                                                    <input type="text"
                                                                                        name="sprint_video_date"
                                                                                        value="{{ $item->sprint_video_date }}"
                                                                                        id="sprint_video_date"
                                                                                        class="form-control dob-picker"
                                                                                        placeholder="YYYY-MM-DD" />
                                                                                </div>

                                                                                <div class="col-md-7">
                                                                                    <label class="form-label"
                                                                                        for="jump_video_link"> Jump video
                                                                                        link: </label>
                                                                                    <input type="text"
                                                                                        name="jump_video_link"
                                                                                        id="jump_video_link"
                                                                                        value="{{ $item->jump_video_link }}"
                                                                                        class="  form-control"
                                                                                        placeholder="Jump video link:" />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label class="form-label"
                                                                                        for="jump_video_link_date">It's
                                                                                        date </label>
                                                                                    <input type="text"
                                                                                        name="jump_video_link_date"
                                                                                        id="jump_video_link_date"
                                                                                        value="{{ $item->jump_video_link_date }}"
                                                                                        class=" form-control dob-picker"
                                                                                        placeholder="YYYY-MM-DD" />
                                                                                </div>


                                                                                <div class="col-md-7">
                                                                                    <label class="form-label"
                                                                                        for="hitting_video"> Hitting
                                                                                        video link </label>
                                                                                    <input type="text" id="hitting_video"
                                                                                        name="hitting_video"
                                                                                        value="{{ $item->hitting_video }}"
                                                                                        class="form-control"
                                                                                        placeholder="Hitting vide link" />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label class="form-label"
                                                                                        for="hitting_video_date">It's
                                                                                        date </label>
                                                                                    <input type="text"
                                                                                        name="hitting_video_date"
                                                                                        id="hitting_video_date"
                                                                                        value="{{ $item->hitting_video_date }}"
                                                                                        class="form-control dob-picker"
                                                                                        placeholder="YYYY-MM-DD" />
                                                                                </div>

                                                                                <div class="col-md-7">
                                                                                    <label class="form-label"
                                                                                        for="resistance_video">
                                                                                        Resistance video link </label>
                                                                                    <input type="text"
                                                                                        name="resistance_video"
                                                                                        id="resistance_video"
                                                                                        class="form-control"
                                                                                        value="{{ $item->resistance_video }}"
                                                                                        placeholder="Resistance video link " />
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label class="form-label"
                                                                                        for="resistance_video_date">It's
                                                                                        date </label>
                                                                                    <input type="text"
                                                                                        name="resistance_video_date"
                                                                                        id="resistance_video_date"
                                                                                        value="{{ $item->resistance_video_date }}"
                                                                                        class="form-control dob-picker"
                                                                                        placeholder="YYYY-MM-DD" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 text-center mt-4">
                                                        <button type="submit"
                                                            class="btn btn-primary me-sm-3 me-1">Update</button>
                                                        <a href="{{ route('student.destroyStatics', $item->id) }}"
                                                            class="btn btn-danger me-sm-3 me-1">Remove</a>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>



                        <!-- /Invoice table -->
                    </div>
                    <!--/ User Content -->
                </div>
            </div>
        </div>
    </div>

    @include('backend.athlete.model.addstatics')
@endsection
@section('js')
    <script src="{{ asset('/admin/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/modal-edit-user.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/app-user-view.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('admin/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/pickr/pickr.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/js/forms-pickers.js') }}"></script> --}}
    <script>
        $('.dob-picker').flatpickr({
            enableTime: false,
            dateFormat: 'Y-m-d '
        });
    </script>
    <script>
        // $('#addNewStaticsForm').submit(function(event) {
        //     event.preventDefault();
        //     $.post("{{ route('student.manageStatics') }}", $(this).serialize()).then(res => {
        //         alert('ok')
        //     })
        // })
    </script>
@endsection
