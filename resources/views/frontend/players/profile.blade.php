@extends('layouts.app')

@section('title', $player->name . 'Profile')

@section('css')
    <link rel="stylesheet" href="/frontend/css/slick.min.css">
    <link rel="stylesheet" href="/frontend/css/slick-theme.min.css">
@endsection
@section('content')
    <section id="CommonBanner" class="banner-player">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">Players</h1>
                <p><em>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</em></p>
            </div>
        </div>
    </section>

    <section class="view-event-section py-5">
        <div class="container">
            <h2 class="title  text-primary pb-3 mb-4">Player Info</h2>

            <div class="row">
                <div class="col-lg-9 order-lg-1 order-2">
                    <!-- player information  -->
                    <div class="player-information">
                        <div class="table-responsive">
                            <table class="table font-italic">
                                <tbody>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $player->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>AGE:</th>
                                        <td>{{ $player->age }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th>GENDER:</th>
                                        <td>{{ $player->gender }}</td>
                                    </tr> --}}
                                    <tr>
                                        <th>HEIGHT:</th>
                                        <td>{{ $player->height }}</td>
                                    </tr>
                                    <tr>
                                        <th>WEIGHT:</th>
                                        <td>{{ $player->weight }}</td>
                                    </tr>
                                    <tr>
                                        <th>SCHOOL LEVEL:</th>
                                        <td>{{ $player->school_level }}</td>
                                    </tr>
                                    <tr>
                                        <th>SCHOOL NAME:</th>
                                        <td>{{ $player->school_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>STATE:</th>
                                        <td>{{ $player->state }}</td>
                                    </tr>
                                    <tr>
                                        <th>POSITION:</th>
                                        <td>{{ $player->position }}</td>
                                    </tr>
                                    <tr>
                                        <th>DESCRIPTION:</th>
                                        <td>{{ $player->description }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- player information  -->

                </div>

                <div class="col-lg-3 order-lg-1 order-1 mb-4 mb-lg-0">
                    <div class="player-img">
                        <img src="/{{ $player->image }}" alt="player">
                    </div>
                </div>
            </div>
            <h2 class="title  text-primary pb-3 mb-4">Latest Stats</h2>
            <div class="row">

                <div class="col-md-12 order-lg-1 order-2">
                    <div class="player-information">
                        <div class="table-responsive">
                            <table class="table font-italic">
                                <tbody>
                                    <tr>
                                        <th>TOP PITCH VELOCITY:</th>
                                        <td>{{ $player->statics->top_pitch_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>FB RANGE:</th>
                                        <td>{{ $player->statics->fb_range }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SPIN:</th>
                                        <td>{{ $player->statics->top_spin }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP CH VELOCITY:</th>
                                        <td>{{ $player->statics->top_ch_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SPIN FOR CH VELOCITY:</th>
                                        <td>{{ $player->statics->top_ch_spin }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP CB VELOCITY:</th>
                                        <td>{{ $player->statics->top_cb_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SPIN FOR CB VELOCITY:</th>
                                        <td>{{ $player->statics->top_cb_spin }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SL VELOCITY:</th>
                                        <td>{{ $player->statics->top_sl_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SPIN FOR SL VELOCITY:</th>
                                        <td>{{ $player->statics->top_sl_spin }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP CT VELOCITY:</th>
                                        <td>{{ $player->statics->top_ct_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SPIN FOR CT VELOCITY:</th>
                                        <td>{{ $player->statics->top_ct_spin }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP KN VELOCITY:</th>
                                        <td>{{ $player->statics->top_kn_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP SPIN FOR KN VELOCITY:</th>
                                        <td>{{ $player->statics->top_kn_spin }}</td>
                                    </tr>
                                    <tr>
                                        <th>TOP EXIT VELOCITY:</th>
                                        <td>{{ $player->statics->top_exit_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>MAX DISTANCE (FT):</th>
                                        <td>{{ $player->statics->max_distance }}</td>
                                    </tr>
                                    <tr>
                                        <th>AVARAGE DISTANCE (FT):</th>
                                        <td>{{ $player->statics->avarage_distance }}</td>
                                    </tr>
                                    <tr>
                                        <th>INF VELOCITY:</th>
                                        <td>{{ $player->statics->inf_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>OF VELOCITY:</th>
                                        <td>{{ $player->statics->of_velocity }}</td>
                                    </tr>
                                    <tr>
                                        <th>C-POP:</th>
                                        <td>{{ $player->statics->c_pop }}</td>
                                    </tr>
                                    <tr>
                                        <th>VERTICAL JUMP:</th>
                                        <td>{{ $player->statics->vertical_jump }}</td>
                                    </tr>
                                    <tr>
                                        <th>40YD SPRINT TIME:</th>
                                        <td>{{ $player->statics['40yd_sprint_time'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>3D RESISTANCE SCORE:</th>
                                        <td>{{ $player->statics['3d_resistance_score'] }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
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
    <section class="playerVideos">
        <div class="container">
            <div class="video-list">
                @if (getYouTubeId($player->statics['velocity_video']))
                    <div class="player-video-box text-center">
                        <div class="video-box-2 position-relative mb-4">
                            <img src="https://img.youtube.com/vi/{{ getYouTubeId($player->statics['velocity_video']) }}/maxresdefault.jpg"
                                alt="video thumbnail">
                            <div class="overlay position-absolute d-flex align-items-center justify-content-center">
                                <span class="btn-play cursor-pointer"
                                    onclick="openVideo('{{ getYouTubeId($player->statics['velocity_video']) }}') ">
                                    <img src="/frontend/images/play-btn.png" alt="play btn" class="d-inline-block">
                                </span>
                            </div>
                        </div>
                        <h3 class="text-primary mb-2">Velocity/Pitch</h3>
                        <span class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                            <span>{{ $player->statics['valo_video_date'] }}</span>
                        </span>
                    </div>
                @endif
                @if (getYouTubeId($player->statics['velocity_video2']))
                    <div class="player-video-box text-center">
                        <div class="video-box-2 position-relative mb-4">
                            <img src="https://img.youtube.com/vi/{{ getYouTubeId($player->statics['velocity_video2']) }}/maxresdefault.jpg"
                                alt="video thumbnail">
                            <div class="overlay position-absolute d-flex align-items-center justify-content-center">
                                <span class="btn-play cursor-pointer"
                                    onclick="openVideo('{{ getYouTubeId($player->statics['velocity_video2']) }}') ">
                                    <img src="/frontend/images/play-btn.png" alt="play btn" class="d-inline-block">
                                </span>
                            </div>
                        </div>
                        <h3 class="text-primary mb-2">Velocity/Pitch 2</h3>
                        <span class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                            <span>{{ $player->statics['valo_video_date2'] }}</span>
                        </span>
                    </div>
                @endif
                @if (getYouTubeId($player->statics['sprint_video']))
                    <div class="player-video-box text-center">
                        <div class="video-box-2 position-relative mb-4">
                            <img src="https://img.youtube.com/vi/{{ getYouTubeId($player->statics['sprint_video']) }}/maxresdefault.jpg"
                                alt="video thumbnail">
                            <div class="overlay position-absolute d-flex align-items-center justify-content-center">
                                <span class="btn-play cursor-pointer"
                                    onclick="openVideo('{{ getYouTubeId($player->statics['sprint_video']) }}') ">
                                    <img src="/frontend/images/play-btn.png" alt="play btn" class="d-inline-block">
                                </span>
                            </div>
                        </div>
                        <h3 class="text-primary mb-2">Sprint</h3>
                        <span class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                            <span>{{ $player->statics['sprint_video_date'] }}</span>
                        </span>
                    </div>
                @endif
                @if (getYouTubeId($player->statics['jump_video_link']))
                    <div class="player-video-box text-center">
                        <div class="video-box-2 position-relative mb-4">
                            <img src="https://img.youtube.com/vi/{{ getYouTubeId($player->statics['jump_video_link']) }}/maxresdefault.jpg"
                                alt="video thumbnail">
                            <div class="overlay position-absolute d-flex align-items-center justify-content-center">
                                <span class="btn-play cursor-pointer"
                                    onclick="openVideo('{{ getYouTubeId($player->statics['jump_video_link']) }}') ">
                                    <img src="/frontend/images/play-btn.png" alt="play btn" class="d-inline-block">
                                </span>
                            </div>
                        </div>
                        <h3 class="text-primary mb-2">Jump</h3>
                        <span class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                            <span>{{ $player->statics['jump_video_link_date'] }}</span>
                        </span>
                    </div>
                @endif
                @if (getYouTubeId($player->statics['hitting_video']))
                    <div class="player-video-box text-center">
                        <div class="video-box-2 position-relative mb-4">
                            <img src="https://img.youtube.com/vi/{{ getYouTubeId($player->statics['hitting_video']) }}/maxresdefault.jpg"
                                alt="video thumbnail">
                            <div class="overlay position-absolute d-flex align-items-center justify-content-center">
                                <span class="btn-play cursor-pointer"
                                    onclick="openVideo('{{ getYouTubeId($player->statics['hitting_video']) }}') ">
                                    <img src="/frontend/images/play-btn.png" alt="play btn" class="d-inline-block">
                                </span>
                            </div>
                        </div>
                        <h3 class="text-primary mb-2">Hitting</h3>
                        <span class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                            <span>{{ $player->statics['hitting_video_date'] }}</span>
                        </span>
                    </div>
                @endif
                @if (getYouTubeId($player->statics['resistance_video']))
                    <div class="player-video-box text-center">
                        <div class="video-box-2 position-relative mb-4">
                            <img src="https://img.youtube.com/vi/{{ getYouTubeId($player->statics['resistance_video']) }}/maxresdefault.jpg"
                                alt="video thumbnail">
                            <div class="overlay position-absolute d-flex align-items-center justify-content-center">
                                <span class="btn-play cursor-pointer"
                                    onclick="openVideo('{{ getYouTubeId($player->statics['resistance_video']) }}') ">
                                    <img src="/frontend/images/play-btn.png" alt="play btn" class="d-inline-block">
                                </span>
                            </div>
                        </div>
                        <h3 class="text-primary mb-2">3d resistance</h3>
                        <span class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                            <span>{{ $player->statics['resistance_video_date'] }}</span>
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <div class="view-event-section py-5 container">
        <div id="accordion">
            @foreach ($player->staticsList as $item)
                @if ($player->statics->id !== $item->id)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapseOne{{ $item->id }}" aria-expanded="false"
                                    aria-controls="collapseOne{{ $item->id }}"
                                    onclick="return $('.playerVideos .video-list').slick('refresh');">

                                    Statics of {{ $item->created_at->format('d,M Y h:m:s A') }}
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne{{ $item->id }}" class="collapse " aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <section class="view-event-section py-5">
                                <div class="container">


                                    <div class="row">

                                        <div class="col-md-12 order-lg-1 order-2">
                                            <div class="player-information">
                                                <div class="table-responsive">
                                                    <table class="table font-italic">
                                                        <tbody>
                                                            <tr>
                                                                <th>TOP PITCH VELOCITY:</th>
                                                                <td>{{ $item->top_pitch_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>FB RANGE:</th>
                                                                <td>{{ $item->fb_range }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SPIN:</th>
                                                                <td>{{ $item->top_spin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP CH VELOCITY:</th>
                                                                <td>{{ $item->top_ch_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SPIN FOR CH VELOCITY:</th>
                                                                <td>{{ $item->top_ch_spin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP CB VELOCITY:</th>
                                                                <td>{{ $item->top_cb_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SPIN FOR CB VELOCITY:</th>
                                                                <td>{{ $item->top_cb_spin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SL VELOCITY:</th>
                                                                <td>{{ $item->top_sl_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SPIN FOR SL VELOCITY:</th>
                                                                <td>{{ $item->top_sl_spin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP CT VELOCITY:</th>
                                                                <td>{{ $item->top_ct_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SPIN FOR CT VELOCITY:</th>
                                                                <td>{{ $item->top_ct_spin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP KN VELOCITY:</th>
                                                                <td>{{ $item->top_kn_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP SPIN FOR KN VELOCITY:</th>
                                                                <td>{{ $item->top_kn_spin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>TOP EXIT VELOCITY:</th>
                                                                <td>{{ $item->top_exit_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>MAX DISTANCE (FT):</th>
                                                                <td>{{ $item->max_distance }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>AVARAGE DISTANCE (FT):</th>
                                                                <td>{{ $item->avarage_distance }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>INF VELOCITY:</th>
                                                                <td>{{ $item->inf_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>OF VELOCITY:</th>
                                                                <td>{{ $item->of_velocity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>C-POP:</th>
                                                                <td>{{ $item->c_pop }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>VERTICAL JUMP:</th>
                                                                <td>{{ $item->vertical_jump }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>40YD SPRINT TIME:</th>
                                                                <td>{{ $item['40yd_sprint_time'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>3D RESISTANCE SCORE:</th>
                                                                <td>{{ $item['3d_resistance_score'] }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </section>
                            <section class="playerVideos">
                                <div class="container">
                                    <div class="video-list">
                                        @if (getYouTubeId($item->velocity_video))
                                            <div class="player-video-box text-center">
                                                <div class="video-box-2 position-relative mb-4">

                                                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($item['velocity_video']) }}/maxresdefault.jpg"
                                                        alt="video thumbnail">
                                                    <div
                                                        class="overlay position-absolute d-flex align-items-center justify-content-center">
                                                        <span class="btn-play cursor-pointer"
                                                            onclick="openVideo('{{ getYouTubeId($item['velocity_video']) }}') ">
                                                            <img src="/frontend/images/play-btn.png" alt="play btn"
                                                                class="d-inline-block">
                                                        </span>
                                                    </div>
                                                </div>
                                                <h3 class="text-primary mb-2">Velocity/Pitch</h3>
                                                <span
                                                    class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                                                    <span>{{ $item['valo_video_date'] }}</span>
                                                </span>
                                            </div>
                                        @endif
                                        @if (getYouTubeId($item->velocity_video2))
                                            <div class="player-video-box text-center">
                                                <div class="video-box-2 position-relative mb-4">
                                                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($item['velocity_video2']) }}/maxresdefault.jpg"
                                                        alt="video thumbnail">
                                                    <div
                                                        class="overlay position-absolute d-flex align-items-center justify-content-center">
                                                        <span class="btn-play cursor-pointer"
                                                            onclick="openVideo('{{ getYouTubeId($item['velocity_video2']) }}') ">
                                                            <img src="/frontend/images/play-btn.png" alt="play btn"
                                                                class="d-inline-block">
                                                        </span>
                                                    </div>
                                                </div>
                                                <h3 class="text-primary mb-2">Velocity/Pitch 2</h3>
                                                <span
                                                    class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                                                    <span>{{ $item['valo_video_date2'] }}</span>
                                                </span>
                                            </div>
                                        @endif
                                        @if (getYouTubeId($item->sprint_video))
                                            <div class="player-video-box text-center">
                                                <div class="video-box-2 position-relative mb-4">
                                                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($item['sprint_video']) }}/maxresdefault.jpg"
                                                        alt="video thumbnail">
                                                    <div
                                                        class="overlay position-absolute d-flex align-items-center justify-content-center">
                                                        <span class="btn-play cursor-pointer"
                                                            onclick="openVideo('{{ getYouTubeId($item['sprint_video']) }}') ">
                                                            <img src="/frontend/images/play-btn.png" alt="play btn"
                                                                class="d-inline-block">
                                                        </span>
                                                    </div>
                                                </div>
                                                <h3 class="text-primary mb-2">Sprint</h3>
                                                <span
                                                    class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                                                    <span>{{ $item['sprint_video_date'] }}</span>
                                                </span>
                                            </div>
                                        @endif
                                        @if (getYouTubeId($item->jump_video_link))
                                            <div class="player-video-box text-center">
                                                <div class="video-box-2 position-relative mb-4">
                                                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($item['jump_video_link']) }}/maxresdefault.jpg"
                                                        alt="video thumbnail">
                                                    <div
                                                        class="overlay position-absolute d-flex align-items-center justify-content-center">
                                                        <span class="btn-play cursor-pointer"
                                                            onclick="openVideo('{{ getYouTubeId($item['jump_video_link']) }}') ">
                                                            <img src="/frontend/images/play-btn.png" alt="play btn"
                                                                class="d-inline-block">
                                                        </span>
                                                    </div>
                                                </div>
                                                <h3 class="text-primary mb-2">Jump</h3>
                                                <span
                                                    class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                                                    <span>{{ $item['jump_video_link_date'] }}</span>
                                                </span>
                                            </div>
                                        @endif
                                        @if (getYouTubeId($item->hitting_video))
                                            <div class="player-video-box text-center">
                                                <div class="video-box-2 position-relative mb-4">
                                                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($item['hitting_video']) }}/maxresdefault.jpg"
                                                        alt="video thumbnail">
                                                    <div
                                                        class="overlay position-absolute d-flex align-items-center justify-content-center">
                                                        <span class="btn-play cursor-pointer"
                                                            onclick="openVideo('{{ getYouTubeId($item['hitting_video']) }}') ">
                                                            <img src="/frontend/images/play-btn.png" alt="play btn"
                                                                class="d-inline-block">
                                                        </span>
                                                    </div>
                                                </div>
                                                <h3 class="text-primary mb-2">Hitting</h3>
                                                <span
                                                    class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                                                    <span>{{ $item['hitting_video_date'] }}</span>
                                                </span>
                                            </div>
                                        @endif
                                        @if (getYouTubeId($item->resistance_video))
                                            <div class="player-video-box text-center">
                                                <div class="video-box-2 position-relative mb-4">
                                                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($item['resistance_video']) }}/maxresdefault.jpg"
                                                        alt="video thumbnail">
                                                    <div
                                                        class="overlay position-absolute d-flex align-items-center justify-content-center">
                                                        <span class="btn-play cursor-pointer"
                                                            onclick="openVideo('{{ getYouTubeId($item['resistance_video']) }}') ">
                                                            <img src="/frontend/images/play-btn.png" alt="play btn"
                                                                class="d-inline-block">
                                                        </span>
                                                    </div>
                                                </div>
                                                <h3 class="text-primary mb-2">3d resistance</h3>
                                                <span
                                                    class="tilted-tag h6 font-montserrat font-italic bg-secondary text-white">
                                                    <span>{{ $item['resistance_video_date'] }}</span>
                                                </span>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>
    </div>
    <div class="modal fade" id="PlayVideoModal" tabindex="-1" role="dialog" aria-labelledby="PlayVideoModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="javascript::player.api('pause')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="939" id="ytplayer" height="528" src="" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        {{-- <iframe class="embed-responsive-item" src="{{ $pageInfo->video_link }}" id="video"
                                    allowscriptaccess="always" allow="autoplay"></iframe> --}}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/frontend/js/slick.min.js"></script>
    <script src="/frontend/js/script.js"></script>
    <script>
        function openVideo(video) {
            $('#ytplayer').attr('src', ' https://www.youtube.com/embed/' + video +
                "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1&amp;controls=0&amp'enablejsapi=1");
            $("#PlayVideoModal").modal('show')


        }
        $("#PlayVideoModal").on('hidden.bs.modal', function() {
            $('#ytplayer').attr('src', '');
        });
    </script>
@endsection
