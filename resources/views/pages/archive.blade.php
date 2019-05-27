@extends('layout')

@section('content')
<section class="pages container">
    <div class="page page-archive">
        <h1 class="text-capitalize">archive</h1>
        <p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
        <div class="divider-2" style="margin: 35px 0;"></div>
        <div class="container-flex space-between">
            <div class="authors-a">
                <h3 class="text-capitalize">Autores</h3>
                <ul class="list-unstyled">
                    <li>Ryan Killen</li>
                    <li>Lisa Stewart</li>
                    <li>James Lambert</li>
                    <li>Mark Singer</li>
                </ul>
                <h3 class="text-capitalize">categorias</h3>
                <ul class="list-unstyled">
                    {{-- <li class="text-capitalize">i do travel</li>
                    <li class="text-capitalize">i do observe</li>
                    <li class="text-capitalize">i do photos</li>
                    <li class="text-capitalize">i do watch</li>
                    <li class="text-capitalize">i do listen</li>
                    <li class="text-capitalize">i do quote</li>
                    <li class="text-capitalize">i do explore</li> --}}
					@foreach ($categorias as $categoria)
						<li class="text-capitalize">
							<a href="{{ route('categorias.show', $categoria) }}">
								{{ $categoria->name }}
							</a>
						</li>
					@endforeach
            </div>
            <div class="latest-posts">
                <h3 class="text-capitalize">Ultimas publicaciones</h3>
                {{-- <p>No Difference How Many Peaks You Reach If There Was No Pleasure In The Climb.</p>
                <p>You Know, I'd Rather Argue With You, Then Laugh With Anyone Else. </p>
                <p>Everything In The Universe Has A Rhythm, Everything Dances.</p>
                <p>As human beings, we have a natural compulsion to fill empty spaces.</p>
                <p>Nature and Books belong to the eyes that see them.</p> --}}
				@foreach ($posts as $post)
					<p>
						<a href="{{ route('posts.show', $post) }}">{{ $post->titulo }}</a>
					</p>
				@endforeach


                <h3 class="text-capitalize">posts by month</h3>
                <ul class="list-unstyled">
                    <li>August 2015</li>
                    <li>September 2015</li>
                    <li>October 2015</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection






{{-- @extends('layout')

@section('content')

	<section class="pages container">
		<div class="page page-archive">
			<h1 class="text-capitalize">archive</h1>
			<p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
			<div class="divider-2" style="margin: 35px 0;"></div>
			<div class="container-flex space-between">
				<div class="authors-a">
					<h3 class="text-capitalize">authors</h3>
					<ul class="list-unstyled">
						@foreach($authors as $author)
							<li>{{ $author->name }}</li>
						@endforeach
					</ul>
					<h3 class="text-capitalize">a</h3>
					<ul class="list-unstyled">
						@foreach($a as $category)
							<li class="text-capitalize">
								<a href="{{ route('a.show', $category) }}">{{ $category->name }}</a>
							</li>
						@endforeach

					</ul>
				</div>
				<div class="latest-posts">
					<h3 class="text-capitalize">latest posts</h3>
					@foreach($posts as $post)
						<p><a href="{{ route('posts.show', $post) }}">{{ $post->title}}</a></p>
					@endforeach
					<h3 class="text-capitalize">posts by month</h3>
					<ul class="list-unstyled">
						@foreach($archive as $date)
							<li class="text-capitalize">
								<a href="{{ route('pages.home', ['month' => $date->month, 'year' => $date->year ]) }}">
									{{ $date->monthname }} {{ $date->year }} ({{ $date->posts }})
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>

@endsection  --}}