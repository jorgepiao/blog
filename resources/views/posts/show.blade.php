@extends('layout')

@section('meta-title', $post->titulo)
@section('meta-description', $post->extracto)

@section('content')
    <article class="post container">

        @if ($post->photos->count() === 1)
            <figure><img src="{{ url($post->photos->first()->url) }}" alt="" class="img-responsive"></figure>
        @elseif ($post->photos->count() > 1)
            @include('posts.carousel')

        @elseif($post->iframe)
	        <div class="video">
	    		{!! $post->iframe !!}
			</div> 
	    @endif

        <div class="content-post">
        <header class="container-flex space-between">
            <div class="date">
                <span class="c-gris">{{ optional($post->fecha_publicacion)->format('M d') }}</span>
            </div>

            @if ($post->categoria)
                <div class="post-category">
                    <span class="category ">{{ $post->categoria->nombre }}</span>
                </div>
            @endif


        </header>
        <h1>{{ $post->titulo }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->cuerpo !!}
            </div>

            <footer class="container-flex space-between">
            
                @include('partials.social-links', ['description' => $post->titulo])
            
            <div class="tags container-flex">
                @foreach($post->tags as $tag)
                    <span class="tag c-gris text-capitalize">#{{ $tag->nombre }}</span>
                @endforeach
            </div>
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