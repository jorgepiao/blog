@extends('layout')

@section('meta-title', $post->titulo)
@section('meta-description', $post->extracto)

@section('content')
    <article class="post container">
        @if ($post->photos->count() === 1)
            <figure><img src="{{ $post->photos->first()->url }}" alt="" class="img-responsive"></figure>
        @endif
        <div class="content-post">
        <header class="container-flex space-between">
            <div class="date">
            <span class="c-gris">{{ $post->fecha_publicacion->format('M d') }}</span>
            </div>
            <div class="post-category">
            <span class="category ">{{ $post->categoria->nombre }}</span>
            </div>
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

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush