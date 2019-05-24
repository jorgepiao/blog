<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

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

    public function update(Post $post, StorePostRequest $request)
    {
        
        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicacion ha sido guardada');
    }
}
