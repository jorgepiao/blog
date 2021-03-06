@extends('layout')

@section('meta-title', $post->titulo)
@section('meta-description', $post->extracto)

@section('content')
    <article class="post container">

        @include($post->viewType())

        <div class="content-post">

        @include('posts.header')

        <h1>{{ $post->titulo }}</h1>
        <div class="divider"></div>

        <div class="image-w-text">
            {!! $post->cuerpo !!}
        </div>

        <footer class="container-flex space-between">
        
            @include('partials.social-links', ['description' => $post->titulo])
        
            @include('posts.tags')

        </footer>

        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
            @include('partials.disqus-script')        
        </div><!-- .comments -->
        </div>
    </article>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/twitter-bootstrap.css"
@endpush

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="/js/twitter-bootstrap.js"></script>
@endpush