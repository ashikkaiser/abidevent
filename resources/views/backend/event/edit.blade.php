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
                    <h5 class="card-header">Edit Event </h5>
                    <form class="card-body" method="POST" action="{{ route('event.update', $event->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="type" value="{{ $event->type }}">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label" for="name"> Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}"
                                    class="form-control" placeholder="Name" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="date">Date</label>
                                <input type="text" name="date" id="date" value="{{ old('date', $event->date) }}"
                                    class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="state"> State</label>
                                <input type="text" name="state" id="state" class="form-control" placeholder="State"
                                    value="{{ old('date', $event->state) }}" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="location"> Location</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    value="{{ old('date', $event->location) }}" placeholder="Location/ Address" />
                            </div>
                            <div id="repeater">
                                <div class="btn btn-primary repeater-add-btn" type="button">
                                    Add More Prices
                                </div>

                                <!-- Repeater Items -->
                                @foreach (json_decode($event->price_type) as $key => $item)
                                    <div class="itemsx" data-group="price">
                                        <!-- Repeater Content -->
                                        <div class="item-content row mt-2">
                                            <div class="form-group col-md-5">
                                                <label class="form-label" for="price_type">Price Type</label>
                                                <input type="text" class="form-control" placeholder="Price For Jump"
                                                    name="price_type[{{ $key }}]" value="{{ $item }}"
                                                    data-name="price_type">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="form-label">Price</label>
                                                <input type="text" class="form-control" placeholder="Price"
                                                    name="price[{{ $key }}]"
                                                    value="{{ json_decode($event->price)[$key] }}" data-name="price">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="pull-right repeater-remove-btn" style="margin-top:20px">
                                                    <button id="remove-btn" class="btn btn-danger"
                                                        onclick="$(this).parents('.itemsx').remove()">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-2"></div>
                                    </div>
                                @endforeach
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
                                    <option value="1" {{ $event->price_type == 1 ? 'selected' : '' }}>Price for jump
                                    </option>
                                    <option value="2" {{ $event->price_type == 2 ? 'selected' : '' }}>Price for sprint
                                    </option>
                                    <option value="3" {{ $event->price_type == 3 ? 'selected' : '' }}>Price for both
                                    </option>


                                </select>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label" for="price">Price</label>
                                <input type="text" name="price" id="price" value="{{ old('price', $event->price) }}"
                                    class="form-control" placeholder="price" />
                            </div> --}}

                            <div class="col-md-5">
                                <label class="form-label" for="description">Description </label>
                                <textarea type="text" name="description" id="description" class="form-control dob-picker"
                                    placeholder="Write Details">{{ old('description', $event->description) }}</textarea>
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
    <script src="admin/assets/js/form-layouts.js"></script>
@endsection
@section('js')
    {{-- // var key = "{{ count(json_decode($event->price_type)) }}"; --}}

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
                var key = "{{ count(json_decode($event->price_type)) }}";
                var addButton = $('.repeater-add-btn');
                var newItem = items;
                if (key == "{{ count(json_decode($event->price_type)) }}") {
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
            enableTime: true,
        });
    </script>
@endsection
