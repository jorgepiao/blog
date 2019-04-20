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

<<<<<<< HEAD
// Authentication Routes...

=======
<<<<<<< HEAD
// Authentication Routes...
=======
>>>>>>> 390b983cc6aeebfd2855693da1061072852daa4b
>>>>>>> c1ba39fcb9efdc029a05aa72b0886db8e3ebf421
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');