<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(Categoria $categoria)
    {
        return view('pages.home', [
            'titulo' => "Publicaciones de la categoria '{$categoria->nombre}'",
            'posts' => $categoria->posts()->paginate(1)
        ]);
    }
}
