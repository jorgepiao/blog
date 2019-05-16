<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        return view('welcome', [
            'titulo' => "Publicaciones de la etiqueta '{$tag->nombre}'",
            'posts' => $tag->posts()->paginate()
        ]);
    }
}
