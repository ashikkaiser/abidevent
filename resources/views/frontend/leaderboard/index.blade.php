@extends('layouts.app')
@section('title', $pageInfo->title)

@section('content')
    <section id="CommonBanner" class="banner-leaderboard">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $pageInfo->name }}</h1>
                <p><em>{{ $pageInfo->title }}</em></p>
            </div>
        </div>
    </section>
    <section class="view-event-section py-5">
        <div class="container">
            <h2 class="title  text-primary pb-3 mb-4">Top Pitch Velocity </h2>

            <!-- leaderboard table  -->
            <div class="table-responsive">
                <table class="table leaderboard-table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Name of player</th>
                            <th scope="col">School Name</th>
                            <th scope="col" class="text-center">Velocity Record </th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        @foreach ($leaderboards->get()->sortByDesc('statics.top_pitch_velocity')->take(15)
        as $item)
                            <tr>
                                <td scope="row" class="font-weight-bold text-secondary">{{ $loop->iteration }}</td>
                                <td scope="row" class="text-primary font-weight-bold"><a
                                        href="{{ route('home.playerProfile', $item->id) }}">{{ $item->name }}
                                        ({{ $item->state }})
                                    </a>
                                </td>
                                <td scope="row" class="font-weight-bold text-primary">{{ $item->school_name }}</td>

                                <td scope="row" class="text-center">
                                    <span class="tilted-tag  bg-primary text-nowrap px-lg-5 py-1 text-white ">
                                        <span>{{ $item->statics->top_pitch_velocity }}</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <h2 class="title  text-primary pb-3 mb-4">Top 40yard Dash Time
            </h2>

            <!-- leaderboard table  -->
            <div class="table-responsive">
                <table class="table leaderboard-table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Name of player</th>
                            <th scope="col">School Name</th>
                            <th scope="col" class="text-center">40yard Dash Time </th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        <?php $i = 0; ?>
                        @foreach ($leaderboards->get()->sortBy('statics.40yd_sprint_time')->take(15)
        as $item)
                            @if ($item->statics['40yd_sprint_time'])
                                <?php $i++; ?>
                                <tr>
                                    <td scope="row" class="font-weight-bold text-secondary">{{ $i }}</td>
                                    <td scope="row" class="text-primary font-weight-bold"><a
                                            href="{{ route('home.playerProfile', $item->id) }}">{{ $item->name }}
                                            ({{ $item->state }})
                                        </a>
                                    </td>
                                    <td scope="row" class="font-weight-bold text-primary">{{ $item->school_name }}</td>

                                    <td scope="row" class="text-center">
                                        <span class="tilted-tag  bg-primary text-nowrap px-lg-5 py-1 text-white ">
                                            <span>{{ $item->statics['40yd_sprint_time'] }}</span>
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>
                </table>
            </div>
            <h2 class="title  text-primary pb-3 mb-4">Top EXIT VELOCITY
            </h2>

            <!-- leaderboard table  -->
            <div class="table-responsive">
                <table class="table leaderboard-table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Name of player</th>
                            <th scope="col">School Name</th>
                            <th scope="col" class="text-center">Top EXIT VELOCITY </th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">

                        @foreach ($top_exit_velocity as $item)
                            @if ($item)
                                <tr>
                                    <td scope="row" class="font-weight-bold text-secondary">{{ $loop->iteration }}</td>
                                    <td scope="row" class="text-primary font-weight-bold"><a
                                            href="{{ route('home.playerProfile', $item['data']->id) }}">{{ $item['data']->name }}
                                            ({{ $item['data']->state }})
                                        </a>
                                    </td>
                                    <td scope="row" class="font-weight-bold text-primary">
                                        {{ $item['data']->school_name }}
                                    </td>

                                    <td scope="row" class="text-center">
                                        <span class="tilted-tag  bg-primary text-nowrap px-lg-5 py-1 text-white ">
                                            <span>{{ $item['statics']->top_exit_velocity }}</span>
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>
                </table>
            </div>
            <h2 class="title  text-primary pb-3 mb-4">Top Vertical Jump Height
            </h2>

            <!-- leaderboard table  -->
            <div class="table-responsive">
                <table class="table leaderboard-table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Name of player</th>
                            <th scope="col">School Name</th>
                            <th scope="col" class="text-center">Vertical Jump Height </th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        @foreach ($leaderboards->get()->sortByDesc('statics.vertical_jump')->take(15)
        as $item)
                            <tr>
                                <td scope="row" class="font-weight-bold text-secondary">{{ $loop->iteration }}</td>
                                <td scope="row" class="text-primary font-weight-bold"><a
                                        href="{{ route('home.playerProfile', $item->id) }}">{{ $item->name }}
                                        ({{ $item->state }})
                                    </a>
                                </td>
                                <td scope="row" class="font-weight-bold text-primary">{{ $item->school_name }}</td>

                                <td scope="row" class="text-center">
                                    <span class="tilted-tag  bg-primary text-nowrap px-lg-5 py-1 text-white ">
                                        <span>{{ $item->statics->vertical_jump }}</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>


        </div>
    </section>
@endsection
