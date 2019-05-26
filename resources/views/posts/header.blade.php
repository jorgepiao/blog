<header class="container-flex space-between">
    <div class="date">
        <span class="c-gris">
            {{ optional($post->fecha_publicacion)->format('M d') }} / {{ $post->owner->name }}
        </span>
    </div>

    @if ($post->categoria)
        <div class="post-category">
            <span class="category">
                <a href="{{ route('categorias.show', $post->categoria) }}">{{ $post->categoria->nombre }}</a>
            </span>
        </div>
    @endif

</header>