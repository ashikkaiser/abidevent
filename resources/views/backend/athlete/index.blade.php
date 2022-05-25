@extends('layouts.main')

@section('content')
    <!-- Content wrapper -->
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

                <div class="card">
                    <h5 class="card-header">Athlete List
                        <span style="float: right;"><a href="{{ route('athlete.create') }}"
                                class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add
                                Athlete</a></span>
                    </h5>

                    <div class="card-header">
                        <form action="{{ route('athlete.index') }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="school_level">School Level</label>
                                    <select id="school_level" name="school_level" class="select2 form-select"
                                        data-allow-clear="true">
                                        <option value="">Select School</option>
                                        <option value="1">High School</option>
                                        <option value="2">4 Year College</option>
                                        <option value="3">2 Year/JUCO</option>
                                        <option value="4">Free Agent/Post School </option>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="desc">Filter High to Low
                                    </label>
                                    <select id="desc" name="desc" class="select2 form-select" data-allow-clear="true">
                                        <option value="">Select Type</option>
                                        <option value="top_pitch_velocity"
                                            {{ request()->desc ? (request()->desc == 'top_pitch_velocity' ? 'selected' : '') : '' }}>
                                            TOP PITCH VELOCITY</option>
                                        <option value="sprit_time"
                                            {{ request()->desc ? (request()->desc == 'sprit_time' ? 'selected' : '') : '' }}>
                                            SPRINT TIME</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="state">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="state" />
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="filter"
                                        class="btn rounded-pill btn-primary mt-4">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>


                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Player Photo</th>
                                    <th>Player Name</th>
                                    <th>School Name</th>
                                    <th>School Level</th>
                                    <th>State</th>
                                    @if (request()->desc == 'top_pitch_velocity')
                                        <th>Top Velocity</th>
                                    @elseif (request()->desc == 'sprit_time')
                                        <th>SPRINT TIME</th>
                                    @else
                                        <th>Top Velocity</th>
                                        <th>Top Velocity</th>
                                    @endif

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img width="30px;" src="/{{ $student->image }}" />

                                        </td>
                                        <td><strong>{{ $student->name }}</strong></td>
                                        <td>{{ $student->school_name }}</td>
                                        <td>
                                            <?php if ($student->school_level == 1) {
                                                echo '<span class="badge bg-label-primary me-1">High School</span> ';
                                            } elseif ($student->school_level == 2) {
                                                echo '<span class="badge bg-label-info me-1">4 year college</span> ';
                                            } elseif ($student->school_level == 3) {
                                                echo '<span class="badge bg-label-success me-1">2year/JUCO</span> ';
                                            } elseif ($student->school_level == 4) {
                                                echo '<span class="badge bg-label-warning me-1">Free agent/Post School</span> ';
                                            } ?>
                                        </td>



                                        <td>{{ $student->state }}</td>
                                        @if (request()->desc == 'top_pitch_velocity')
                                            <td>{{ $student->statics->top_pitch_velocity }}</td>
                                        @elseif (request()->desc == 'sprit_time')
                                            <td>{{ $student->sprit_time }}</td>
                                        @else
                                            <td>{{ $student->top_pitch_velocity }}</td>
                                            <td>{{ $student->sprit_time }}</td>
                                        @endif

                                        <td>
                                            <form action="{{ route('athlete.destroy', $student->id) }}" method="post">
                                                <a href="{{ route('athlete.edit', $student->id) }}" type="button"
                                                    class="btn btn-sm btn-outline-primary">Edit</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"> Delete
                                                </button>

                                                <a href="{{ route('athlete.show', $student->id) }}" type="button"
                                                    class="btn btn-sm btn-outline-primary">View</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- / Content -->

        </div>
        <!-- Content wrapper -->


        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
