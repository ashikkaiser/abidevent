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
                    <h5 class="card-header">Slider List
                        <span style="float: right;"><a href="{{ route('slider.create') }}"
                                class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add
                                Slider</a></span>
                    </h5>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="15%">Image</th>
                                    <th width="25%">Title </th>
                                    <th width="25%">Description</th>
                                    <th width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($slider as $n)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img width="50px;" src="/{{ $n->image }}" /></td>
                                        <td>{{ $n->title }}</td>
                                        <td>{!! $n->description !!}</td>


                                        {{-- <td>{{ $n->description }}</td> --}}
                                        <td>
                                            <form action="{{ route('slider.destroy', $n->id) }}" method="post">
                                                <a href="{{ route('slider.edit', $n->id) }}" type="button"
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
