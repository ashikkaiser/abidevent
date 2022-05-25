@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Form Validation -->
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection
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
                    <h5 class="card-header">Event Paid Users </h5>
                    <hr>
                    <div class="card-datatable table-responsive pt-0">
                        {!! $html->table() !!}
                    </div>
                </div>

            </div>
            <!-- / Content -->

        </div>
        <!-- Content wrapper -->


        <!-- / Content -->

    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="rModel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <div id="modelIframe"></div>

                </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->

    <!-- Content wrapper -->
@endsection
@section('js')
    <script src="{{ asset('admin/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('admin/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Row Group JS -->
    <script src="{{ asset('admin/assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}"></script>
    <!-- Form Validation -->
    <script src="{{ asset('admin/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    {!! $html->scripts() !!}




    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        // function openrModel(url) {
        //     // alert(url.receipt_url)
        //     axios.get(
        //             'https://pay.stripe.com/receipts/acct_1KMvQIBs1z3zp1ac/ch_3L1GWdBs1z3zp1ac2aMerIlo/rcpt_LihwlfXaxgkXm2iPt0mx3gfD6ogSThT'
        //         )
        //         .then(res => {
        //             $('#modelIframe').html(res)
        //         })
        //     // $('#modelIframe').attr('src', url.receipt_url)
        //     $('#rModel').modal('show')

        // }
    </script>
@endsection
