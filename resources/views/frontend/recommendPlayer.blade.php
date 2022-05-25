@extends('layouts.app')
@section('title', 'Subscribe')

@section('content')
    <section id="CommonBanner" class="banner-blog">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $pageInfo->title }}</h1>
                <p><em>Comming Soon</em></p>
            </div>
        </div>
    </section>
    <section class="ticketPurchaseSection py-5">
        <div class="container justify-content-center align-items-center d-flex ">
            <div class="inner bg-light p-4 col-md-6 ">
                <form id="rPlayer">
                    @csrf
                    <div class="row  p-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Full Name</label>
                                <input type="text" class="form-control border-0" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Player Email</label>
                                <input class="form-control border-0" name="email" type="email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Recommended by</label>
                                <input type="email" class="form-control border-0" name="by" required>
                            </div>
                        </div>

                    </div>
                    <div class="row action justify-content-center">

                        <div class="col-md-3">
                            <button class="btn btn-secondary btn-block py-2 buyBtn">submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <div class="toast" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-primary">Toast Header</strong>
            <small class="text-muted">5 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            Some text inside the toast body
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $('#rPlayer').submit(function(event) {
            event.preventDefault();
            $.post("{{ route('home.recommendPlayer') }}", $(this).serialize()).then(res => {
                Swal.fire({
                    title: 'Success!',
                    text: res,
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
                $('#rPlayer').trigger("reset");

            }).catch(err => {
                console.log(err.responseJSON)
                Swal.fire({
                    title: 'Error!',
                    text: 'Player Already recommended by Another User',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            })
        })
    </script>
@endsection
