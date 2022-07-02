@extends('layouts.app')
@section('title', $pageInfo->name)

@section('content')
    <section id="CommonBanner" class="banner-blog">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $pageInfo->name }}</h1>
                <p><em>{{ $pageInfo->title }}</em></p>
            </div>
        </div>
    </section>
    <section class="EventSection py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="text-primary title pb-2 mb-4">{{ $pageInfo->header }}</h2>
                    <div class=" events-list">

                        {!! $pageInfo->content !!}
                    </div>


                </div>
                <div class="col-lg-4">
                    <!-- upcoming events  -->
                    <div class="upcoming-events">
                        <h2 class="text-secondary title title-2 pb-2  mb-4">Recent posts</h2>
                        <!-- upcoming event  -->
                        @foreach ($blogs as $item)
                            <div class="upcoming-event bg-white border-bottom d-flex align-items-center">
                                <span class="tilted-tag text-nowrap bg-secondary text-white mr-3">
                                    <span>{{ $item->created_at->format('d-m-Y') }}</span>
                                </span>
                                <a href="{{ route('home.viewBlog', [sanitize($item->title), $item->id]) }}">
                                    <h4>{{ $item->title }}</h4>
                                </a>
                            </div>
                        @endforeach


                    </div>
                    <!-- upcoming events ends -->

                </div>
            </div>
        </div>
    </section>
@endsection
