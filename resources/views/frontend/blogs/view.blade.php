@extends('layouts.app')
@section('title', $blog->title)


@section('content')
    <section id="CommonBanner" class="banner-blog">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">Blogs</h1>
                {{-- <p><em>{{ $blog->title }}</em></p> --}}
            </div>
        </div>
    </section>
    <section class="EventSection py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post">
                        <div class="post-img mb-3">
                            <img src="/{{ $blog->image }}" alt="post image">
                        </div>
                        <div class="post-body">
                            <h2 class="text-uppercase text-primary">{{ $blog->title }}</h2>
                            <p class="mb-3">{!! $blog->description !!}</p>
                        </div>
                        <div class="post-meta d-flex align-items-center justify-content-between py-4">
                            <span class="post-date d-flex align-items-center">
                                <svg class="svg-inline--fa fa-calendar fa-w-14 mr-2" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z">
                                    </path>
                                </svg><!-- <i class="fas fa-calendar mr-2"></i> -->
                                <em>{{ $blog->created_at->format('d M,Y') }} </em>
                            </span>

                        </div>

                        <div class="post-action py-4 border-top d-flex align-items-center justify-content-between">
                            <a href="{{ $blog->previous() ? route('home.viewBlog', $blog->previous()->id) : '#' }}"
                                class=" btn btn-outline-primary py-2">Previous </a>
                            <a href="{{ $blog->next() ? route('home.viewBlog', $blog->next()->id) : '#' }}"
                                class="btn btn-outline-primary py-2">Next</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- upcoming events  -->
                    <div class="upcoming-events">
                        <h2 class="text-secondary title title-2 pb-2  mb-4">Recent posts</h2>
                        <!-- upcoming event  -->
                        @foreach ($recentNews as $item)
                            <div class="upcoming-event bg-white border-bottom d-flex align-items-center">
                                <span class="tilted-tag text-nowrap bg-secondary text-white mr-3">
                                    <span> {{ $item->created_at->format('d-m-Y') }} </span>
                                </span>
                                <a href="{{ route('home.viewBlog', $item->id) }}">
                                    <h4>{{ $item->title }}</h4>
                                </a>
                            </div>
                        @endforeach


                        <!-- upcoming event  ends-->
                    </div>
                    <!-- upcoming events ends -->

                </div>
            </div>
        </div>
    </section>
@endsection
