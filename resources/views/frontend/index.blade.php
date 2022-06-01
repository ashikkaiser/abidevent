@extends('layouts.app')


@section('title', $pageInfo->title)


@section('content')
    <section id="HomeBanner" class="carousel slide" data-ride="carousel">
        <div>
            {{-- <ol class="carousel-indicators">
                <li data-target="#HomeBanner" data-slide-to="0" class="active"></li>
                <li data-target="#HomeBanner" data-slide-to="1"></li>
                <li data-target="#HomeBanner" data-slide-to="2"></li>
            </ol> --}}
            <div class="carousel-inner">

                @foreach ($sliders as $slider)
                    <div class="carousel-item <?php if ($loop->iteration == 1) {
                        echo 'active';
                    } else {
                        echo '';
                    } ?> position-relative">
                        <!-- overlay -->
                        <div class="overlay"></div>
                        <!-- overlay -->

                        <!-- banner img  -->
                        <img class="d-block w-100 banner-img" src="{{ $slider->image }}" alt="First slide">
                        <!-- banner img ends -->
                        <!-- banner content  -->
                        <div class="content position-absolute">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 text-white">
                                        <h1 class="mb-2">{{ $slider->title }}</h1>
                                        <p class="mb-4">{{ $slider->description }}</p>
                                        <a href="{{ $slider->link }}"
                                            class="btn btn-secondary">{{ $slider->button_name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- banner content  ends-->

                    </div>
                @endforeach
            </div>


            <!-- events section starts  -->
            <section class="EventSection py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 class="text-primary title pb-2 mb-4">{{ $pageInfo->header }}</h2>
                            <div class="row events-list">
                                @foreach ($news as $item)
                                    <div class="col-md-6">
                                        <a href="{{ route('home.viewBlog', $item->id) }}">
                                            <div class="event position-relative  bg-primary">
                                                <span class="tilted-tag bg-light-2 event-tag position-absolute text-white">
                                                    <span class="text-secondary">Featured</span>
                                                </span>
                                                <div class="inner">
                                                    <div class="content text-white">
                                                        <h3>{{ $item->title }}</h3>
                                                        <p class="font-weight-medium line-clamp">
                                                            {{ strip_tags($item->description) }}</p>
                                                    </div>
                                                    <span
                                                        class="tilted-tag  bg-light-2  bg-secondary event-date text-primary position-absolute">
                                                        <span>{{ $item->created_at->format('d-m-Y') }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach



                            </div>
                            <h3 class="text-center"> <a href="{{ route('home.blogs') }}"
                                    class="text-primary text-uppercase">View All
                                    News</a>
                            </h3>
                        </div>
                        <div class="col-lg-4">
                            <!-- upcoming events  -->
                            <div class="upcoming-events">
                                <h2 class="text-secondary title title-2 pb-2  mb-4">upcoming events</h2>
                                <!-- upcoming event  -->
                                @foreach ($events as $item)
                                    <a href="{{ route('home.viewEvent', $item->id) }}">
                                        <div class="upcoming-event bg-white border-bottom d-flex align-items-center">
                                            <span class="tilted-tag text-nowrap bg-secondary text-white mr-3">
                                                <span>{{ $item->date }}</span>
                                            </span>
                                            <h4>{{ $item->name }}</h4>
                                        </div>
                                    </a>
                                @endforeach


                            </div>
                            <!-- upcoming events ends -->

                        </div>
                    </div>
                </div>
            </section>
            <!-- events section ends  -->

            <!-- athelete Data Section -->
            <section class="atheleteDataSection">
                <div class="container">
                    <div class="row justify-content-end py-4">
                        <div class="col-md-8 text-white">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="title pb-3 mb-3 mb-md-4">Athlete Data</h2>
                                    <div class="row align-items-center py-4">
                                        <div class="col-6 d-flex align-items-center  py-3">
                                            <span class="tilted-tag bg-light-2 p-1 mr-3">
                                                <span>&nbsp;</span>
                                            </span>
                                            <h3 class="text-uppercase mb-0">HS</h3>
                                        </div>
                                        <div class="col-sm-6 d-flex align-items-center py-3">
                                            <span class="tilted-tag bg-light-2 p-1 mr-3">
                                                <span>&nbsp;</span>
                                            </span>
                                            <h3 class="text-uppercase mb-0">2yr College</h3>
                                        </div>
                                        <div class="col-sm-6 d-flex align-items-center  py-3">
                                            <span class="tilted-tag bg-light-2 p-1 mr-3">
                                                <span>&nbsp;</span>
                                            </span>
                                            <h3 class="text-uppercase mb-0">4yr College</h3>
                                        </div>
                                        <div class="col-sm-6 d-flex align-items-center  py-3">
                                            <span class="tilted-tag bg-light-2 p-1 mr-3">
                                                <span>&nbsp;</span>
                                            </span>
                                            <h3 class="text-uppercase mb-0">Post secondary/Uncommitted</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('home.players') }}" class="btn btn-secondary">Players</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- athelete Data Section ends  -->
            <!-- home video section -->
            <style>
                .modal-dialog {
                    max-width: 800px;
                    margin: 30px auto;
                }



                .modal-body {
                    position: relative;
                    padding: 0px;
                }

                .close {
                    position: absolute;
                    right: -30px;
                    top: 0;
                    z-index: 999;
                    font-size: 2rem;
                    font-weight: normal;
                    color: #fff;
                    opacity: 1;
                }

            </style>
            <section class="home-video-section">
                <div class="video-box">
                    <video class="w-100" controls>
                        <source src="{{ $pageInfo->video_link }}" type="video/mp4">
                        <source src="https://www.w3schools.com/tags/movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-thumbnail">
                        <img src="{{ $pageInfo->banner }} " alt="video video-thumbnail">
                    </div>
                    <div class="overlay  align-items-center justify-content-center w-100 h-100 position-absolute"
                        onclick="openVideo('{{ getYouTubeId($pageInfo->video_link) }}')">
                        <span class="play-btn cursor-pointer">
                            <img src="/frontend/images/play-btn.png" alt="play btn">
                        </span>
                    </div>
                </div>
            </section>

            {{-- video model --}}

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">


                        <div class="modal-body">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="939" height="528" id="ytplayer" src="{{ $pageInfo->video_link }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                {{-- <iframe class="embed-responsive-item" src="{{ $pageInfo->video_link }}" id="video"
                                    allowscriptaccess="always" allow="autoplay"></iframe> --}}
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            {{-- end video model --}}






            <!-- home video section -->
            <section class="featured-ads py-4">
                <div class="container ">
                    {{-- <ul class="d-flex align-items-center justify-content-center featured-ads-list"> --}}
                    <div class="row align-items-center justify-content-center featured-ads-list">
                        @foreach (json_decode($pageInfo->ads_data) as $item)
                            <div class="col-md-4 mb-2">
                                <a href="{{ $item->link }}" target="_blank">
                                    <img src="/{{ $item->image }}" style="height: 250px;" alt="advertisement">
                                </a>
                            </div>
                        @endforeach
                    </div>


                    {{-- </ul> --}}
                </div>
            </section>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function openVideo(video) {
            $('#ytplayer').attr('src', ' https://www.youtube.com/embed/' + video +
                "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1&amp;controls=0&amp'enablejsapi=1");
            $("#myModal").modal('show')


        }
        $("#myModal").on('hidden.bs.modal', function() {
            $('#ytplayer').attr('src', '');
        });
    </script>
@endsection
