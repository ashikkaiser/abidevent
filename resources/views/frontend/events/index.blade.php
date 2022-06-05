@extends('layouts.app')
@section('title', $pageInfo->title)

@section('content')
    <section id="CommonBanner" class="banner-events">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $pageInfo->name }}</h1>
                <p><em>{{ $pageInfo->title }}</em></p>
            </div>
        </div>
    </section>
    <section class="upcoming-event-section py-5">
        <div class="container">
            <h2 class="title title-2 text-secondary pb-3 mb-4">{{ $pageInfo->header }}</h2>
            <div class="table-responsive mobile-table">
                <table class="table players-list-table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Event</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        @foreach ($events as $key => $item)
                            <tr>
                                <td scope="row" class="font-weight-bold text-secondary">{{ $key + 1 }}</td>
                                <td scope="row" class="text-primary font-weight-bold">
                                    <div class="player">
                                        <a href="{{ route('home.viewEvent', $item->id) }}">
                                            <p style="margin-bottom: 0px">Name : {{ $item->name }}
                                            </p>
                                            <p style="margin-bottom: 0px">State : {{ $item->state }}
                                            </p>
                                            <p style="margin-bottom: 0px">Location :
                                                {{ $item->location }}</p>
                                        </a>

                                    </div>
                                <td scope="row" class="text-center"><span
                                        class="tilted-tag  bg-light-2  bg-secondary text-nowrap text-primary">
                                        <span>{{ $item->date->format('dS,F Y') }}</span>
                                        <br />
                                        <span>{{ $item->date->format('h:i A') }}</span>
                                    </span></td>

                                </td>



                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="table-responsive  web-table">
                <table class="table upcoming-events-table">
                    <thead>
                        <tr>
                            <th scope="col">Showcase</th>
                            <th scope="col">State</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody class="font-italic">
                        @foreach ($events as $item)
                            <tr>
                                <td scope="row" class="font-weight-bold text-secondary"><a
                                        href="{{ route('home.viewEvent', $item->id) }}"
                                        rel="noopener noreferrer">{{ $item->name }}</a> </td>
                                <td scope="row" class="text-primary font-weight-bold">{{ $item->state }}</td>
                                <td scope="row" class="text-center"><span
                                        class="tilted-tag  bg-light-2  bg-secondary text-nowrap text-primary">
                                        <span>{{ $item->date->format('dS,F Y h:i A') }}</span>
                                    </span></td>
                                <td scope="row" class="font-weight-medium text-primary">{{ $item->location }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <!-- pagination  -->
            {{ $events->links() }}


        </div>
    </section>
@endsection
