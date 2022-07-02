@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Multi Column with Form Separator -->
                <div class="card mb-4">
                    <h5 class="card-header">Edit Admin User- {{ $user->email }} </h5>
                    <form class="card-body" method="POST" action="{{ route('users.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label" for="name"> Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"
                                    autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="col-md-5">
                                <label class="form-label" for="date">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div> --}}
                            <div class="col-md-5">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $user->email) }}" required autocomplete="email"
                                    placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>





                        </div>

                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>

                        </div>
                    </form>
                </div>


                <!--/ Activity Timeline -->
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
    <!-- Page JS -->
@endsection
@section('js')
@endsection
