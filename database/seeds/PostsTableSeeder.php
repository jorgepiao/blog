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
        $categoria->nombre = "Categoria 1";
        $categoria->save();

        $categoria = new Categoria;
        $categoria->nombre = "Categoria 2";
        $categoria->save();
        
        $post = new Post;
        $post->titulo = "Mi primer post";
        $post->url = str_slug("Mi primer post");
        $post->extracto = "Extracto de mi primer post";
        $post->cuerpo = "<p>Contenido de mi primer post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(4);
        $post->categoria_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['nombre' => 'etiqueta 1']));

        $post = new Post;
        $post->titulo = "Mi segundo post";
        $post->url = str_slug("Mi segundo post");
        $post->extracto = "Extracto de mi segundo post";
        $post->cuerpo = "<p>Contenido de mi segundo post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(3);
        $post->categoria_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['nombre' => 'etiqueta 2']));

        $post = new Post;
        $post->titulo = "Mi tercer post";
        $post->url = str_slug("Mi tercer post");
        $post->extracto = "Extracto de mi tercer post";
        $post->cuerpo = "<p>Contenido de mi tercer post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(2);
        $post->categoria_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['nombre' => 'etiqueta 3']));

        $post = new Post;
        $post->titulo = "Mi cuarto post";
        $post->url = str_slug("Mi cuarto post");
        $post->extracto = "Extracto de mi cuarto post";
        $post->cuerpo = "<p>Contenido de mi cuarto post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(1);
        $post->categoria_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['nombre' => 'etiqueta 4']));
    }
}
