<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function home()
    {
        $posts = Post::latest('fecha_publicacion')->get();

        return view('welcome', compact('posts'));
    }
}
