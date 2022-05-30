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

                <div class="col-md-9">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Site Settings</h5>
                            <small class="text-muted float-end">Merged input group</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('siteSettings') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($st)
                                    <input type="hidden" name="id" value="{{ $st->id }}">
                                @endif

                                <div class="row mb-3 align-items-center">

                                    <label class="form-label col-sm-3" for="logo">Logo</label>
                                    <div class="col-sm-9">
                                        <div class="m-2">
                                            <input type="file" class="dropify" name="logo" data-height="200"
                                                data-default-file="/{{ $st->logo }}" data-width="400" />
                                        </div>
                                    </div>


                                </div>
                                <div class="row mb-3 align-items-center">

                                    <label class="form-label col-sm-3" for="footer_logo">Footer Image And LInk</label>
                                    <div class="col-sm-9">
                                        <div class="m-2">
                                            <input type="file" class="dropify" name="footer_logo"
                                                data-default-file="/{{ $st->footer_logo }}" data-height="200"
                                                data-width="400" />
                                            <input type="url" name="footer_logo_link" value="{{ $st->footer_logo_link }}"
                                                id="header" class="form-control mt-2" placeholder="Logo Link" />
                                        </div>
                                    </div>
                                </div>



                                @php
                                    $social_link = json_decode($st->social_link);
                                    $contacts = json_decode($st->contact);
                                    
                                @endphp
                                <div class="row mb-3 align-items-center">
                                    <label class="col-sm-3 col-form-label" for="multicol-username">Social Links</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge m-2">
                                            <span id="facebook" class="input-group-text">
                                                <i class="bx bxl-facebook-circle"></i>
                                            </span>
                                            <input type="text" class="form-control" id="facebook" placeholder="Facebook"
                                                name="social[facebook]" value="{{ $social_link->facebook }}"
                                                aria-label="John Doe" aria-describedby="facebook">
                                        </div>
                                        <div class="input-group input-group-merge m-2">
                                            <span id="twitter" class="input-group-text">
                                                <i class="bx bxl-twitter"></i>
                                            </span>
                                            <input type="text" class="form-control" id="twitter" placeholder="twitter"
                                                value="{{ $social_link->twitter }}" name="social[twitter]"
                                                aria-label="John Doe" aria-describedby="twitter">
                                        </div>
                                        <div class="input-group input-group-merge m-2">
                                            <span id="instagram" class="input-group-text">
                                                <i class="bx bxl-instagram"></i>
                                            </span>
                                            <input type="text" class="form-control" id="instagram" placeholder="instagram"
                                                name="social[instagram]" value="{{ $social_link->instagram }}"
                                                aria-label="John Doe" aria-describedby="instagram">
                                        </div>
                                        <div class="input-group input-group-merge m-2">
                                            <span id="youtube" class="input-group-text">
                                                <i class="bx bxl-youtube"></i>
                                            </span>
                                            <input type="text" class="form-control" id="youtube" placeholder="youtube"
                                                value="{{ $social_link->youtube }}" name="social[youtube]"
                                                aria-label="John Doe" aria-describedby="youtube">
                                        </div>
                                        <div class="input-group input-group-merge m-2">
                                            <span id="github" class="input-group-text">
                                                <i class="bx bxl-github"></i>
                                            </span>
                                            <input type="text" class="form-control" id="github"
                                                value="{{ $social_link->github }}" placeholder="github"
                                                name="social[github]" aria-label="John Doe" aria-describedby="github">
                                        </div>

                                    </div>
                                </div>
                                {{-- <div class="row mb-3 align-items-center">
                                    <label class="form-label col-sm-3" for="basic-icon-default-fullname">Pages Links</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge m-2">
                                            <span id="powerdby" class="input-group-text">
                                                <i class="bx bx-link"></i>
                                            </span>
                                            <input type="text" id="basic-icon-default-company" class="form-control"
                                                placeholder="ACME Inc." aria-label="ACME Inc."
                                                aria-describedby="basic-icon-default-company2">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row mb-3 align-items-center">
                                    <label class="form-label col-sm-3" for="contact">Contact</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge m-2">
                                            <span id="phone" class="input-group-text">
                                                <i class="bx bx-phone"></i>
                                            </span>
                                            <input type="text" id="phone" class="form-control" name="contact[phone]"
                                                placeholder="phone" value="{{ $contacts->phone }}"
                                                aria-describedby="contact">
                                        </div>
                                        <div class="input-group input-group-merge m-2">
                                            <span id="email" class="input-group-text">
                                                <i class="bx bx-envelope"></i>
                                            </span>
                                            <input type="text" id="email" class="form-control"
                                                value="{{ $contacts->email }}" name="contact[email]" placeholder="email"
                                                aria-describedby="contact">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3  align-items-center">
                                    <label class="form-label col-sm-3" for="powerdby">Powerd By</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge m-2">
                                            <span id="powerdby" class="input-group-text"><i
                                                    class="bx bx-buildings"></i></span>
                                            <input type="text" id="powerdby" name="powerdby" value="{{ $st->powerdby }}"
                                                class="form-control" aria-describedby="powerdby">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3  align-items-center">
                                    <label class="form-label col-sm-3" for="stripe_pk">Stripe Publishable Key</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge m-2">
                                            <span id="stripe_pk" class="input-group-text"><i
                                                    class='bx bxl-stripe'></i></span>
                                            <input type="text" id="stripe_pk" name="stripe_pk"
                                                value="{{ $st->stripe_pk }}" class="form-control"
                                                aria-describedby="stripe_pk">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3  align-items-center">
                                    <label class="form-label col-sm-3" for="stripe_sk">Stripe Secret Key</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-merge m-2">
                                            <span id="stripe_sk" class="input-group-text"><i
                                                    class='bx bxl-stripe'></i></i></span>
                                            <input type="text" id="stripe_sk" name="stripe_sk"
                                                value="{{ $st->stripe_sk }}" class="form-control"
                                                aria-describedby="stripe_sk">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
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
    </script>
@endsection
