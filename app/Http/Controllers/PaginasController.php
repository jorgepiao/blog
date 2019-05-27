<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Categoria;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function home()
    {
        $posts = Post::published()->paginate(3);

        return view('pages.home', compact('posts'));
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function archive()
    {
        // return view('pages.archive');
        return view('pages.archive', [
            'authors' 	 => User::latest()->take(4)->get(),
            'categorias' => Categoria::take(7)->get(),
            'posts' 		 => Post::latest()->take(5)->get()
        ]);
    }

    public function contact()
    {
    	return view('pages.contact');
    }
}
