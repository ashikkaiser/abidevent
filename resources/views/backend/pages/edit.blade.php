@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/quill/editor.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Multi Column with Form Separator -->
                <div class="card mb-4">
                    <h5 class="card-header">EDIT {{ strtoupper($page->page_slug) }} PAGES </h5>
                    <form class="card-body" method="POST" action="{{ route('page.update', $page->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <hr class="my-3 mx-n2">
                        <h6 class="fw-normal"> Page Info</h6>
                        <div class="row g-3">


                            <div class="col-md-6">
                                <label class="form-label" for="title"> Page Heading</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $page->name) }}"
                                    class="form-control" placeholder="Page Heading" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="title"> Page Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                                    class="form-control" placeholder="Title" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="header"> Page Sub Heading</label>
                                <input type="text" name="header" id="header" value="{{ old('header', $page->header) }}"
                                    class="form-control" placeholder="Sub Header" />
                            </div>

                            <div class="col-md-6">
                                @if ($page->page_slug == 'home')
                                    <label class="form-label" for="banner">Video Cover Image</label>
                                @else
                                    <label class="form-label" for="banner">Banner</label>
                                @endif
                                <input class="form-control" type="file" id="banner" name="banner"
                                    value="{{ old('file', $page->file) }}">
                            </div>
                            @if ($page->page_slug == 'home')
                                <div class="col-md-6">
                                    <label class="form-label" for="video_link">Video Link</label>
                                    <input class="form-control" type="text" id="video_link" name="video_link"
                                        value="{{ old('video_link', $page->video_link) }}" placeholder="Write Video Link">
                                </div>
                            @endif
                        </div>

                        <hr class="my-4 mx-n4">

                        @if ($page->page_slug == 'home')
                            <h6 class="fw-normal"> Ads Banner Section</h6>
                            <div class="row g-3">
                                @php
                                    $data = json_decode($page->ads_data);
                                @endphp
                                <div class="col-md-4">
                                    <label class="form-label" for="ads_image">Ads Image 1</label>
                                    <input type="file" class="dropify" data-default-file="/{{ $data[0]->image }}"
                                        name="ads_images[0][image]" data-height="200" data-width="400" />
                                    <input type="hidden" name="ads_images[0][preimage]" value="{{ $data[0]->image }}">
                                    <label class="form-label" for="header">Ads Link 1</label>
                                    <input type="url" name="ads_images[0][link]" value="{{ $data[0]->link }}" id="header"
                                        class="form-control" placeholder="add LInk" />

                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="ads_images">Ads Image 2</label>
                                    <input type="file" class="dropify" data-default-file="/{{ $data[1]->image }}"
                                        name="ads_images[1][image]" data-height="200" data-width="400" />
                                    <input type="hidden" name="ads_images[1][preimage]" value="{{ $data[1]->image }}">
                                    <label class="form-label" for="header">Ads Link 2</label>
                                    <input type="url" name="ads_images[1][link]" id="header" value="{{ $data[1]->link }}"
                                        class="form-control" placeholder="add LInk" />

                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="ads_images">Ads Image 3</label>
                                    <input type="file" class="dropify" data-default-file="/{{ $data[2]->image }}"
                                        name="ads_images[2][image]" data-height="200" data-width="400" />
                                    <input type="hidden" name="ads_images[2][preimage]" value="{{ $data[2]->image }}">
                                    <label class="form-label" for="header">Ads Link 3</label>
                                    <input type="url" name="ads_images[2][link]" id="header" value="{{ $data[2]->link }}"
                                        class="form-control" placeholder="add LInk" />

                                </div>

                            </div>
                        @endif
                        @if ($page->page_slug == 'aboutus' || $page->page_slug == 'tos' || $page->page_slug == 'policy')
                            <div class="col-md-12">
                                <label class="form-label" for="description">Description </label>
                                <!-- Snow Theme -->
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Write Details</h5>
                                        <div class="card-body">
                                            <div id="snow-toolbar">
                                                <span class="ql-formats">
                                                    <select class="ql-font"></select>
                                                    <select class="ql-size"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <select class="ql-color"></select>
                                                    <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-script" value="sub"></button>
                                                    <button class="ql-script" value="super"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-header" value="1"></button>
                                                    <button class="ql-header" value="2"></button>
                                                    <button class="ql-header" value="3">3</button>
                                                    <button class="ql-blockquote"></button>
                                                    <button class="ql-code-block"></button>
                                                </span>
                                            </div>
                                            <div id="snow-editor">
                                                {!! $page->content !!}
                                            </div>
                                            <input type="hidden" id="detail" name="content" value="{{ $page->content }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

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
    <script src="{{ asset('admin/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Select',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        const snowEditor = new Quill('#snow-editor', {
            bounds: '#snow-editor',
            modules: {
                formula: true,
                toolbar: '#snow-toolbar'
            },
            theme: 'snow'
        });
        snowEditor.on('text-change', function(delta, oldDelta, source) {
            $('#detail').val(snowEditor.container.firstChild.innerHTML);
        });
    </script>
@endsection
