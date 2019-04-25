<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categorias', 'tags'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'titulo' => 'required',
            'cuerpo' => 'required',
            'categoria' => 'required',
            'tags' => 'required',
            'extracto' => 'required'
        ]);
        // return Post::create($request->all());
        $post = new Post;
        $post->titulo = $request->get('titulo');
        $post->cuerpo = $request->get('cuerpo');
        $post->extracto = $request->get('extracto');
        $post->fecha_publicacion = $request->has('fecha_publicacion') ? Carbon::parse($request->get('fecha_publicacion')) : null;
        $post->categoria_id = $request->get('categoria');
        $post->save();
        
        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicacion ha sido creada');
    }
}
