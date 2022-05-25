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
                <div class="col-lg-12">
                    <h2 class="text-primary title pb-2 mb-4">{{ $pageInfo->header }}</h2>
                    <div class="row events-list">

                        {!! $pageInfo->content !!}
                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection
