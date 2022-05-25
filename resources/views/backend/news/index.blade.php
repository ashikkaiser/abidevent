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
                    <h5 class="card-header">News List
                        <span style="float: right;"><a href="{{ route('news.create') }}" class="btn btn-sm btn-primary"><i
                                    class="fa-solid fa-plus"></i> Add
                                News</a></span>
                    </h5>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Heading</th>
                                    <th>Featured </th>
                                    {{-- <th>Description</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($news as $n)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $n->title }}</td>
                                        <td><?php if ($n->is_featured == 0) {
                                            echo '<span class="badge bg-label-primary me-1">No</span> ';
                                        } elseif ($n->is_featured == 1) {
                                            echo '<span class="badge bg-label-info me-1">Yes</span> ';
                                        } ?></td>

                                        {{-- <td>{{ $n->description }}</td> --}}
                                        <td>
                                            <form action="{{ route('news.destroy', $n->id) }}" method="post">
                                                <a href="{{ route('news.edit', $n->id) }}" type="button"
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
