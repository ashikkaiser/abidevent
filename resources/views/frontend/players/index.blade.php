@extends('layouts.app')
@section('title', $pageInfo->title)

@section('content')
    <section id="CommonBanner" class="banner-player">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $pageInfo->name }}</h1>
                <p><em>{{ $pageInfo->title }}</em></p>
            </div>
        </div>
    </section>
    <section class="view-event-section py-5">
        <div class="container">
            <h2 class="title  text-primary pb-3 mb-4">{{ $pageInfo->header }}</h2>


            {{-- <table class="table players-list-table mobile-table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%">SL</th>
                        <th scope="col">Player Info</th>

                    </tr>
                </thead>
                <tbody class="font-italic">
                    @foreach ($players as $key => $item)
                        <tr>
                            <td scope="row" class="font-weight-bold text-secondary">{{ $key + 1 }}</td>
                            <td scope="row" class="font-weight-medium text-primary">
                                <table class="table font-italic">
                                    <tbody>
                                        <tr>
                                            <th>Player:</th>
                                            <td> <a href="{{ route('home.playerProfile', $item->id) }}">
                                                    <p>{{ $item->name }}</p>
                                                </a></td>
                                        </tr>
                                        <tr>
                                            <th>School:</th>
                                            <td>{{ $item->school_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>School lavel:</th>
                                            <td>
                                                @if ($item->school_level == 1)
                                                    High School
                                                @elseif($item->school_level == 2)
                                                    4 Year College
                                                @elseif($item->school_level == 3)
                                                    2 Year/JUCO
                                                @elseif($item->school_level == 4)
                                                    Free Agent/Post
                                                    School
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Age:</th>
                                            <td>{{ $item->age }}</td>
                                        </tr>
                                        <tr>
                                            <th>Height:</th>
                                            <td> {{ $item->height }}</td>
                                        </tr>
                                        <tr>
                                            <th>Stats:</th>
                                            <td> <a href="{{ route('home.playerProfile', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <span>Click To see</span>
                                                </a></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table> --}}

            <div class="table-responsive mobile-table">
                <table class="table players-list-table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Player</th>
                            {{-- <th scope="col">School</th> --}}
                            <th scope="col" style="white-space: nowrap;">School lavel</th>
                            {{-- <th scope="col">Age</th>
                            <th scope="col">Height</th> --}}
                            <th scope="col">Stats</th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        @foreach ($players as $key => $item)
                            <tr>
                                <td scope="row" class="font-weight-bold text-secondary">{{ $key + 1 }}</td>
                                <td scope="row" class="text-primary font-weight-bold">
                                    <div class="player">
                                        {{-- <img src="{{ $item->image }}" alt="player" class="player-img"> --}}
                                        <a href="{{ route('home.playerProfile', $item->id) }}">
                                            <p style="margin-bottom: 0px;white-space: nowrap;">{{ $item->name }}</p>
                                        </a>
                                        <p style="margin-bottom: 0px;white-space: nowrap;">Age : {{ $item->age }}</p>
                                        <p style="margin-bottom: 0px;white-space: nowrap;">Height: {{ $item->height }}</p>
                                        <p style="margin-bottom: 0px;white-space: nowrap;">School:
                                            {{ $item->school_name }}</p>

                                    </div>

                                </td>
                                {{-- <td scope="row" class="font-weight-medium text-primary">{{ $item->school_name }}</td> --}}
                                <td scope="row" class="font-weight-medium text-primary">
                                    @if ($item->school_level == 1)
                                        High School
                                    @elseif($item->school_level == 2)
                                        4 Year College
                                    @elseif($item->school_level == 3)
                                        2 Year/JUCO
                                    @elseif($item->school_level == 4)
                                        Free Agent/Post
                                        School
                                    @else
                                    @endif

                                </td>
                                {{-- <td scope="row" class="font-weight-medium text-primary">{{ $item->age }}
                                </td>
                                <td scope="row" class="font-weight-medium text-primary">
                                    {{ $item->height }}
                                </td> --}}
                                <td scope="row" class="font-weight-medium text-primary">
                                    <a href="{{ route('home.playerProfile', $item->id) }}"
                                        class="btn btn-primary btn-sm rounded">
                                        <span><i class="far fa-eye"></i></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- players table  -->
            <div class="table-responsive web-table">
                <table class="table players-list-table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Player</th>
                            <th scope="col">School</th>
                            <th scope="col">School lavel</th>
                            <th scope="col">Age</th>
                            <th scope="col">Height</th>
                            <th scope="col">Stats</th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        @foreach ($players as $key => $item)
                            <tr>
                                <td scope="row" class="font-weight-bold text-secondary">{{ $key + 1 }}</td>
                                <td scope="row" class="text-primary font-weight-bold">
                                    <div class="player d-flex align-items-center">
                                        <img src="{{ $item->image }}" alt="player" class="player-img">
                                        <a href="{{ route('home.playerProfile', $item->id) }}">
                                            <p>{{ $item->name }}</p>
                                        </a>

                                    </div>
                                </td>
                                <td scope="row" class="font-weight-medium text-primary">{{ $item->school_name }}</td>
                                <td scope="row" class="font-weight-medium text-primary">
                                    @if ($item->school_level == 1)
                                        High School
                                    @elseif($item->school_level == 2)
                                        4 Year College
                                    @elseif($item->school_level == 3)
                                        2 Year/JUCO
                                    @elseif($item->school_level == 4)
                                        Free Agent/Post
                                        School
                                    @else
                                    @endif

                                </td>
                                <td scope="row" class="font-weight-medium text-primary">{{ $item->age }}
                                </td>
                                <td scope="row" class="font-weight-medium text-primary">
                                    {{ $item->height }}
                                </td>
                                <td scope="row" class="font-weight-medium text-primary">
                                    <a href="{{ route('home.playerProfile', $item->id) }}"
                                        class="btn btn-primary btn-sm">
                                        <span>Click To see</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- players table  -->
            <!-- pagiantion  -->
            {{ $players->links() }}
            <!-- pagiantion  ends-->

        </div>
    </section>
@endsection
