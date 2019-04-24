<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Categoria;
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
}
