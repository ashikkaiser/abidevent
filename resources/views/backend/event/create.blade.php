@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/pickr/pickr-themes.css') }}" />
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Multi Column with Form Separator -->
                <div class="card mb-4">
                    <h5 class="card-header text-uppercase">Add {{ request()->type }} Event </h5>
                    <form class="card-body" method="POST" action="{{ route('event.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="{{ request()->type }}">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label" for="name"> Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="date">Date</label>
                                <input type="text" name="date" id="date" class="form-control dob-picker"
                                    placeholder="YYYY-MM-DD" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="state"> State</label>
                                <input type="text" name="state" id="state" class="form-control" placeholder="State" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="location"> Location</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="Location/ Address" />
                            </div>
                            <div id="repeater">
                                <div class="btn btn-primary repeater-add-btn" type="button">
                                    Add More Prices
                                </div>

                                <!-- Repeater Items -->
                                <div class="items" data-group="price">
                                    <!-- Repeater Content -->
                                    <div class="item-content row mt-2">
                                        <div class="form-group col-md-5">
                                            <label class="form-label" for="price_type">Price Type</label>
                                            <input type="text" class="form-control" placeholder="Price For Jump"
                                                data-name="price_type">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" placeholder="Price" data-name="price">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="pull-right repeater-remove-btn" style="margin-top:20px">
                                                <button id="remove-btn" class="btn btn-danger"
                                                    onclick="$(this).parents('.items').remove()">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-2"></div>
                                </div>
                            </div>
                            {{-- <div class="col-md-5">
                                <label class="form-label" for="price_type">Price Type</label>
                                <select id="price_type" name="price_type" class="select2 form-select"
                                    data-allow-clear="true" required>
                                    <option value="">Select</option>
                                    <option value="1">Price for jump</option>
                                    <option value="2">Price for sprint</option>
                                    <option value="3">Price for both </option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label" for="price">Price For Jump</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="price" />
                            </div> --}}

                            <div class="col-md-5">
                                <label class="form-label" for="description">Description </label>
                                <textarea type="text" name="description" id="description" class="form-control dob-picker"
                                    placeholder="Write Details"></textarea>
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
    <script>
        jQuery.fn.extend({
            createRepeater: function() {
                var addItem = function(items, key) {
                    var itemContent = items;
                    var group = itemContent.data("group");
                    var item = itemContent;
                    var input = item.find('input,select');
                    input.each(function(index, el) {
                        var attrName = $(el).data('name');
                        var skipName = $(el).data('skip-name');
                        if (skipName != true) {
                            $(el).attr("name", attrName + "[" + key + "]");
                        } else {
                            if (attrName != 'undefined') {
                                $(el).attr("name", attrName);
                            }
                        }
                    })
                    var itemClone = items;
                    $("<div class='items'>" + itemClone.html() + "<div/>").appendTo(repeater);
                };
                /* find elements */
                var repeater = this;
                var items = repeater.find(".items ");
                var key = 0;
                var addButton = $('.repeater-add-btn');
                var newItem = items;
                if (key == 0) {
                    items.remove();
                    addItem(newItem, key);
                }

                /* handle click and add items */
                addButton.on("click", function() {
                    key++;
                    addItem(newItem, key);
                });
            }
        });
        $("#repeater").createRepeater();
    </script>
    <script src="{{ asset('admin/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('admin/assets/vendor/libs/pickr/pickr.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/js/forms-pickers.js') }}"></script> --}}
    <script>
        $('.dob-picker').flatpickr({
            enableTime: false,
            dateFormat: 'Y-m-d '
        });
    </script>
@endsection
