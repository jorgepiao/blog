<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.posts.create', compact('categorias'));
    }
}
