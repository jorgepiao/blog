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

    // public function create()
    // {
    //     $categorias = Categoria::all();
    //     $tags = Tag::all();

    //     return view('admin.posts.create', compact('categorias', 'tags'));
    // }

    public function store(Request $request)
    {
        $this->validate($request, ['titulo' => 'required']);

        $post = Post::create( $request->only('titulo'));

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categorias = Categoria::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categorias', 'tags', 'post'));
    }

    public function update(Post $post, Request $request)
    {

        $this->validate($request, [
            'titulo' => 'required',
            'cuerpo' => 'required',
            'categoria' => 'required',
            'tags' => 'required',
            'extracto' => 'required'
        ]);
        // return Post::create($request->all());
        $post->titulo = $request->get('titulo');
    
        $post->cuerpo = $request->get('cuerpo');
        $post->iframe = $request->get('iframe');
        $post->extracto = $request->get('extracto');
        $post->fecha_publicacion = $request->has('fecha_publicacion')
                                    ? Carbon::parse($request->get('fecha_publicacion'))
                                    : null;

        $post->categoria_id = Categoria::find($cat = $request->get('categoria'))
                                ? $cat
                                : Categoria::create(['nombre' => $cat])->id;
        
        $post->save(); 

        
        $tags = [];

        foreach ($request->get('tags') as $tag){
            $tags[] = Tag::find($tag)
                        ? $tag
                        : Tag::create(['nombre' => $tag])->id;
        }
        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicacion ha sido guardada');
    }
}
