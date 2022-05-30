@extends('layouts.app')
@section('title', $event->name)


@section('content')
    <div class="overlayLoader">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span>
                <span class="mt-2"> Payment Loading..</span>
            </div>

        </div>
    </div>
    <section id="CommonBanner" class="banner-events">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $event->name }}</h1>
                {{-- <p><em>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</em></p> --}}
            </div>
        </div>
    </section>
    <section class="view-event-section py-5">

        <div class="container">
            <h2 class="title  text-primary pb-3 mb-4 text-center">{{ $event->name }}</h2>
            <p class="text-center font-italic">{{ $event->description }}</p>

            <!-- event information  -->
            <div class="event-information mt-5">
                <div class="table-responsive">
                    <table class="table font-italic">
                        <tbody>
                            <tr>
                                <th>Date:</th>
                                <td>{{ $event->date }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $event->location }}</td>
                            </tr>
                            <tr>
                                <th>Ticket Price:</th>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @foreach (json_decode($event->price_type) as $key => $item)
                                            <div class="custom-control custom-radio flex-grow-1">
                                                <input type="radio" class="custom-control-input priceInput"
                                                    id="Ticket{{ $key }}" name="ticket_price"
                                                    price="{{ json_decode($event->price)[$key] }}"
                                                    key="{{ $key }}"
                                                    value="${{ json_decode($event->price)[$key] }}">
                                                <label class="custom-control-label"
                                                    for="Ticket{{ $key }}">{{ $item }}: <span
                                                        class="text-secondary font-weight-bold">${{ json_decode($event->price)[$key] }}</span></label>
                                            </div>
                                        @endforeach


                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- event information  -->

        </div>
    </section>
    <section class="ticketPurchaseSection py-5">
        <div class="container">
            <div class="inner bg-light p-4">
                <form action="" id="stripeForm">
                    @csrf
                    <input type="hidden" name="stripeToken">
                    <input type="hidden" name="amount">
                    <input type="hidden" name="key">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">First Name</label>
                                <input type="text" class="form-control border-0" id="first-name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Last Name</label>
                                <input type="text" class="form-control border-0" id="last-name" name="last_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Player Email</label>
                                <input type="text" class="form-control border-0" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Player CellPhone # </label>
                                <input type="text" class="form-control border-0" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="form-group">
                                <label for="#" class="text-primary font-bebas">Card Information </label>

                                <div style="background-color: white; padding: 7px;  border-radius: 0.25rem;">
                                    <div id="card-element"></div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row action justify-content-end">
                        <div class="col-md-5">
                            <button type="button" class="btn btn-primary btn-block py-2 priceBtn">Select Ticket
                                Price</button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-secondary btn-block py-2 buyBtn">BUY</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $('.buyBtn').attr('disabled', true)
        $('.priceInput').on('change', function() {
            $('input[name="amount"]').attr('value', $(this).attr('price'));
            $('input[name="key"]').attr('value', $(this).attr('key'));
            $('.priceBtn').html($(this).val())
            $('.buyBtn').attr('disabled', false)
        })
    </script>

    <script>
        $('.overlayLoader').hide()
        var stripe = Stripe(
            "{{ st()->stipe_pk }}"
        );

        var elements = stripe.elements();

        var cardElement = elements.create('card', {
            style: {
                base: {
                    "fontFamily": "Montserrat",
                    "color": "#32325D",
                    "fontWeight": 500,
                    "fontSize": "16px",
                    "fontSmoothing": "antialiased",
                    "::placeholder": {
                        "color": "#222222"
                    },
                    ":-webkit-autofill": {
                        "color": "#e39f48"
                    }
                },
                invalid: {
                    iconColor: '#FFC7EE',
                    color: '#FFC7EE',
                },
            },
        });
        var card = elements.getElement('card');


        card.mount('#card-element');

        function setOutcome(result) {


            if (result.token) {
                $('.overlayLoader').show()

                $('input[name="stripeToken"]').attr('value', result.token.id);
                $.post("{{ route('payment.stripePost') }}", $("#stripeForm").serialize()).then(res => {

                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: res.message,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Redirect Soon",
                            closeOnConfirm: false
                        })
                        setTimeout(function() {
                            window.location.href = res.redirect;
                        }, 2000);
                        $('.overlayLoader').hide()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.message,
                        })
                        $('.overlayLoader').hide()
                    }
                })
                // form.submit();

            } else if (result.error) {

            }
        }

        card.on('change', function(event) {
            setOutcome(event);
        });
        $("#stripeForm").submit(function(event) {
            event.preventDefault();

            var options = {
                name: document.getElementById('first-name').value + " " + document.getElementById('last-name')
                    .value,
                // address_line1: document.getElementById('address-line1').value,
                // address_line2: document.getElementById('address-line2').value,
                // address_city: document.getElementById('address-city').value,
                // address_state: document.getElementById('address-state').value,
                // address_zip: document.getElementById('address-zip').value,
                // address_country: document.getElementById('address-country').value,
            };
            stripe.createToken(card, options).then(setOutcome);

        });
    </script>
@endsection
