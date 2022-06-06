@extends('layouts.app')
@section('title', 'Subscribe')

@section('content')
    <section id="CommonBanner" class="banner-blog">
        <div class="content text-center text-white">
            <div class="container">
                <h1 class="text-uppercase mb-3">{{ $pageInfo->name }}</h1>
                <p><em>{{ $pageInfo->header }}</em></p>
            </div>
        </div>
    </section>
    <section class="EventSection py-5  text-center ">
        <div class="container text-center">
            <div class="row text-center justify-content-center">
                {!! $pageInfo->content !!}
            </div>
        </div>
    </section>
@endsection
