@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/quill/editor.css') }}" />
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Multi Column with Form Separator -->
                <div class="card mb-4">
                    <h5 class="card-header">Add Slider </h5>
                    <form class="card-body" method="POST" action="{{ route('slider.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label" for="title"> Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="date">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="title"> Button Name</label>
                                <input type="text" name="button_name" id="button_name" class="form-control"
                                    placeholder="Button Name" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="link"> Button Link</label>
                                <input type="url" name="link" id="link" class="form-control" placeholder="Link" />
                            </div>

                            <div class="col-md-5">
                                <label class="form-label" for="date">Description</label>
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
    <script src="{{ asset('admin/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/quill/quill.js') }}"></script>
    <script>
        const snowEditor = new Quill('#snow-editor', {
            bounds: '#snow-editor',
            modules: {
                formula: true,
                toolbar: '#snow-toolbar'
            },
            theme: 'snow'
        });
        snowEditor.on('text-change', function(delta, oldDelta, source) {
            console.log(snowEditor.container.firstChild.innerHTML)
            $('#detail').val(snowEditor.container.firstChild.innerHTML);
        });
    </script>
@endsection
