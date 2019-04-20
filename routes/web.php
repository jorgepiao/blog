<?php

Route::get('/', function () {
    $posts = App\Post::latest('fecha_publicacion')->get();

    return view('welcome', compact('posts'));
});

// Route::get('posts', function(){
//     return App\Post::all();
// });

Route::get('admin', function(){
    return view('admin.dashboard');
});