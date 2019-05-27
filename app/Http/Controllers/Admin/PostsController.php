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
        // $posts = Post::all();
        // $posts = Post::where('user_id', auth()->id())->get();
        // $posts = auth()->user()->posts;

        $posts = Post::allowed()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        
        $this->validate($request, ['titulo' => 'required|min:3']);

        // $post = Post::create( $request->only('titulo'));

        $post = Post::create([
			'titulo' => $request->get('titulo'),
			'user_id' => auth()->id()
        ]);
        
        // $post = Post::create($request->all());

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            'post'	=> $post,
            'tags'	=> Tag::all(),
            'categorias'	=> Categoria::all()
        ]);
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()
            ->route('admin.posts.edit', $post)
            ->with('flash', 'La publicacion ha sido guardada');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La publicacion ha sido eliminada');
    }
}
