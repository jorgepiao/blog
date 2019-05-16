<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(Categoria $categoria)
    {
        return view('welcome', [
            'categoria' => $categoria,
            'posts' => $categoria->posts()->paginate(1)
        ]);
    }
}
