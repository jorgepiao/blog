<?php

use App\Tag;
use App\Post;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');

        Post::truncate();
        Categoria::truncate();
        Tag::truncate();

        $categoria = new Categoria;
        $categoria->nombre = "Laravel";
        $categoria->save();

        $categoria = new Categoria;
        $categoria->nombre = "PHP";
        $categoria->save();

        $categoria = new Categoria;
        $categoria->nombre = "Javascript";
        $categoria->save();

        $categoria = new Categoria;
		$categoria->nombre = "VueJS";
        $categoria->save();
        
		$categoria = new categoria;
		$categoria->nombre = "Django";
		$categoria->save();
        
        $tag = new Tag;
        $tag->nombre = "Etiqueta 1";
        $tag->save();

        $tag = new Tag;
        $tag->nombre = "Etiqueta 2";
        $tag->save();

        $tag = new Tag;
        $tag->nombre = "Etiqueta 3";
        $tag->save();

        $tag = new Tag;
        $tag->nombre = "Etiqueta 4";
        $tag->save();

        $tag = new Tag;
        $tag->nombre = "Etiqueta 5";
        $tag->save();

        $tag = new Tag;
        $tag->nombre = "Etiqueta 6";
        $tag->save();

		$post = new Post;
		$post->titulo = "Lorem ipsum";
		$post->url =str_slug("Lorem ipsum");
		$post->extracto = "Extracto de Lorem ipsum";
		$post->cuerpo = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.";
		$post->fecha_publicacion = Carbon::now()->subDays(4);
		$post->categoria_id = 1;
		$post->user_id = 1;
		$post->save();
        //$post->tags()->attach(Tag::create(['nombre' => 'Etiqueta 1']));
        
		$post = new Post;
		$post->titulo = "Cicero";
		$post->url =str_slug("Cicero");
		$post->extracto = "Cicero";
		$post->cuerpo = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.";
		$post->fecha_publicacion = Carbon::now()->subDays(2);
		$post->categoria_id = 2;
		$post->user_id = 1;
        $post->save();
        
		$post = new Post;
		$post->titulo = "Li Europan lingues";
		$post->url =str_slug("Li Europan lingues");
		$post->extracto = "Li Europan";
		$post->cuerpo = "Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.";
		$post->fecha_publicacion = Carbon::now()->subDays(1);
		$post->categoria_id = 2;
		$post->user_id = 2;
        $post->save();
        
		$post = new Post;
		$post->titulo = "Muy lejos, más allá...";
		$post->url =str_slug("Muy lejos, más allá...");
		$post->extracto = "Muy lejos";
		$post->cuerpo = "Un riachuelo llamado Pons fluye por su pueblo y los abastece con las normas necesarias. Hablamos de un país paraisomático en el que a uno le caen pedazos de frases asadas en la boca.";
		$post->fecha_publicacion = Carbon::now();
		$post->categoria_id = 1;
		$post->user_id = 2;
        $post->save();
        
		// Llenar la tabla post_tag
		for ($i=1; $i <=4 ; $i++) {
			$post = Post::find($i);
			for ($j=1; $j <=2 ; $j++) {
				// Asignarle al Post un id de la Etiqueta (Tag)
				// attach - Adjuntar
				$post->tags()->attach(rand(1, 6));
			}
		}
	}
}
