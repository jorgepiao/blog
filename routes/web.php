<?php

// Route::get('email', function() {
//   return new App\Mail\LoginCredentials(App\User::first(), 'asd123');
// });

Route::get('/', 'PaginasController@home')->name('pages.home');
Route::get('nosotros', 'PaginasController@about')->name('pages.about');
Route::get('archivo', 'PaginasController@archive')->name('pages.archive');
Route::get('contacto', 'PaginasController@contact')->name('pages.contact');

Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{categoria}', 'CategoriasController@show')->name('categorias.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

Route::group([
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'auth'
    ], function(){
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('users', 'UsersController', ['as' => 'admin']);
    Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

    
    // Route::get('posts', 'PostsController@index')->name('admin.posts.index');
    // Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
    // Route::post('posts', 'PostsController@store')->name('admin.posts.store');
    // Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
    // Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
    // Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');
    
    Route::middleware('role:Administrador')
		->put('users/{user}/roles', 'UsersRolesController@update')
		->name('admin.users.roles.update');
    Route::middleware('role:Administrador')
		->put('users/{user}/permissions', 'UsersPermissionsController@update')
		->name('admin.users.permissions.update');

    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

    // rutas de administracion
});


// Authentication Routes...
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