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
                    <h5 class="card-header text-uppercase">{{ request()->type }} Event List
                        <span style="float: right;">
                            <a href="{{ route('event.create') }}?type={{ request()->type }}"
                                class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add {{ request()->type }}
                                Event</a></span>
                    </h5>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Price Type</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>

                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        @foreach (json_decode($event->price_type) as $key => $item)
                                                            <tr>
                                                                <th>{{ $item }}</th>
                                                                <th>{{ json_decode($event->price)[$key] }}</th>
                                                            </tr>
                                                        @endforeach
                                                    </thead>

                                                </table>
                                            </div>
                                        <td>
                                            <form action="{{ route('event.destroy', $event->id) }}" method="post">
                                                <a href="{{ route('event.edit', $event->id) }}" type="button"
                                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                                <a href="{{ route('event.show', $event->id) }}" type="button"
                                                    class="btn btn-sm btn-primary">View Paid User</a>

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
