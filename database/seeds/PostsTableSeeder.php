<?php

use App\Post;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Categoria::truncate();

        $categoria = new Categoria;
        $categoria->nombre = "Categoria 1";
        $categoria->save();

        $categoria = new Categoria;
        $categoria->nombre = "Categoria 2";
        $categoria->save();
        
        $post = new Post;
        $post->titulo = "Mi primer post";
        $post->extracto = "Extracto de mi primer post";
        $post->cuerpo = "<p>Contenido de mi primer post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(4);
        $post->categoria_id = 1;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi segundo post";
        $post->extracto = "Extracto de mi segundo post";
        $post->cuerpo = "<p>Contenido de mi segundo post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(3);
        $post->categoria_id = 1;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi tercer post";
        $post->extracto = "Extracto de mi tercer post";
        $post->cuerpo = "<p>Contenido de mi tercer post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(2);
        $post->categoria_id = 2;
        $post->save();

        $post = new Post;
        $post->titulo = "Mi cuarto post";
        $post->extracto = "Extracto de mi cuarto post";
        $post->cuerpo = "<p>Contenido de mi cuarto post</p>";
        $post->fecha_publicacion = Carbon::now()->subDays(1);
        $post->categoria_id = 2;
        $post->save();
    }
}
