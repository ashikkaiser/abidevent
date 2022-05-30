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
                            <h5 class="card-title mb-0">Player Info</h5>

                        </div>
                        <div class="card-body pb-2">

                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>PLAYER NAME </th>
                                            <th>SCHOOL NAME </th>
                                            <th>SCHOOL LEVEL</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($players as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td> {{ $item->name }}</td>
                                                <td>{{ $item->school_name }} </td>
                                                <td>
                                                    <?php if ($item->school_level == 1) {
                                                        echo '<span class="badge bg-label-primary me-1">High School</span> ';
                                                    } elseif ($item->school_level == 2) {
                                                        echo '<span class="badge bg-label-info me-1">4 year college</span> ';
                                                    } elseif ($item->school_level == 3) {
                                                        echo '<span class="badge bg-label-success me-1">2year/JUCO</span> ';
                                                    } elseif ($item->school_level == 4) {
                                                        echo '<span class="badge bg-label-warning me-1">Free agent/Post School</span> ';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a href="{{ route('athlete.show', $item->id) }}"
                                                        class="btn btn-success"> View </a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="div">
                                        Showing {{ $players->firstItem() }} to {{ $players->lastItem() }} of
                                        {{ $players->total() }} entries
                                    </div>
                                    <div class="mt-2">
                                        {{ $players->render('pagination::admin') }}
                                    </div>

                                </div>
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
