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
                    <h5 class="card-header">Admin User List
                        <span style="float: right;">
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-plus"></i> Add Admin</a></span>
                    </h5>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="25%">Name </th>
                                    <th width="25%">Email</th>
                                    <th width="25%">Created Time</th>
                                    <th width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($users as $key => $n)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $n->name }}</td>
                                        <td>{{ $n->email }}</td>
                                        <td>{{ $n->created_at->format('d,M Y h:m:s A') }}</td>




                                        <td>
                                            <form action="{{ route('users.destroy', $n->id) }}" method="post">
                                                <a href="{{ route('users.edit', $n->id) }}" type="button"
                                                    class="btn btn-sm btn-outline-primary">Edit</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"> Delete
                                                </button>
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
