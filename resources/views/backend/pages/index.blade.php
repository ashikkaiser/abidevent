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
                    <h5 class="card-header">Page List</h5>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Header Name</th>
                                    <th>Title</th>
                                    <th>Sub Heading</th>
                                    <th>Banner</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($pages as $n)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ strtoupper($n->page_slug) }}</td>
                                        <td>{{ $n->name }}</td>
                                        <td>{{ $n->title }}</td>
                                        <td>{{ $n->header }}</td>
                                        <td> <img width="50px" src="/{{ $n->banner }}" alt="banner">
                                        </td>
                                        <td>
                                            <a href="{{ route('page.edit', $n->id) }}" type="button"
                                                class="btn btn-sm btn-outline-primary">Edit</a>


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
