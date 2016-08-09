<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::resource('users', 'Users\UserController');

Route::get('@{username}', 'Users\UserController@show');

Route::resource('blogs', 'Blog\UserController');
Route::resource('blogs.articles', 'Blog\ArticleController');

Route::group(['prefix' => 'intern'], function () {
    Route::resource('usr', 'Intern\Users\UserController');
});

Route::get('/test', function () {
    $users = factory(\PHPMap\User::class, 100)->create();

//    $user = \PHPMap\User::findByUsername('fwartner');
//
//    $user->update([
//        'avatar' => 'https://avatars0.githubusercontent.com/u/6692500?v=3&s=460'
//    ]);
//
//    $user->reindex();
});