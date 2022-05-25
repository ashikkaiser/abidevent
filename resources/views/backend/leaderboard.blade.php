@extends('layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Website Analytics-->
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Top Pitch Velocity</h5>

                        </div>
                        <div class="card-body pb-2">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>POSITION</th>
                                            <th>PLAYER NAME</th>
                                            <th>SCHOOL NAME</th>
                                            <th>Top Pitch Velocity</th>
                                            <th>STATE</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($students->get()->sortByDesc('statics.top_pitch_velocity')->take(15)
        as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $item->name }}</strong> </td>
                                                <td>{{ $item->school_name }}</td>
                                                <td>{{ $item->statics->top_pitch_velocity }}</td>
                                                <td><span class="badge bg-label-primary me-1">{{ $item->state }}</span>
                                                </td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Top 40yard Dash Time</h5>

                        </div>
                        <div class="card-body pb-2">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>POSITION</th>
                                            <th>PLAYER NAME</th>
                                            <th>SCHOOL NAME</th>
                                            <th>Top 40yard Dash Time</th>
                                            <th>STATE</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($students->get()->sortBy('statics.40yd_sprint_time')->take(15)
        as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $item->name }}</strong> </td>
                                                <td>{{ $item->school_name }}</td>
                                                <td>{{ $item->statics['40yd_sprint_time'] }}</td>
                                                <td><span class="badge bg-label-primary me-1">{{ $item->state }}</span>
                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Top Exit Valocity</h5>

                        </div>
                        <div class="card-body pb-2">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>POSITION</th>
                                            <th>PLAYER NAME</th>
                                            <th>SCHOOL NAME</th>
                                            <th>EXIT VALOCITY</th>
                                            <th>STATE</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($students->get()->sortByDesc('statics.top_exit_velocity')->take(15)
        as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $item->name }}</strong> </td>
                                                <td>{{ $item->school_name }}</td>
                                                <td>{{ $item->statics->top_exit_velocity }}</td>
                                                <td><span class="badge bg-label-primary me-1">{{ $item->state }}</span>
                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Top Vertical Jump Height</h5>

                        </div>
                        <div class="card-body pb-2">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>POSITION</th>
                                            <th>PLAYER NAME</th>
                                            <th>SCHOOL NAME</th>
                                            <th>JUMP HEIGHT</th>
                                            <th>STATE</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($students->get()->sortByDesc('statics.vertical_jump')->take(15)
        as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $item->name }}</strong> </td>
                                                <td>{{ $item->school_name }}</td>
                                                <td>{{ $item->statics->vertical_jump }}</td>
                                                <td><span class="badge bg-label-primary me-1">{{ $item->state }}</span>
                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!--/ Activity Timeline -->
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
