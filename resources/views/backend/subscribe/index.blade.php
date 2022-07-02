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
                    <h5 class="card-header">
                        Subscribers
                    </h5>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="25%">Email</th>
                                    <th width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($users as $key => $n)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $n->email }}</td>

                                        <td>
                                            <form action="{{ route('subscriber.destroy', $n->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No data</td>
                                    </tr>
                                @endforelse


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
