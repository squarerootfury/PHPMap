<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/imprint', function () {
    return view('pages.static.imprint');
});

Route::get('/terms', function () {
    return view('pages.static.terms');
});

Auth::routes();

Route::resource('users', 'Users\UserController');

Route::get('@{username}', 'Users\UserController@show');

Route::resource('blogs', 'Blog\UserController');
Route::resource('blogs.articles', 'Blog\ArticleController');

Route::group(['prefix' => 'intern'], function () {
    Route::resource('usr', 'Intern\Users\UserController');
    Route::resource('profile/posts', 'Intern\Profile\PostController');
    Route::post('profile/info', 'Intern\Profile\InfoController@update');

    Route::get('users/getPosts/{id}', 'Intern\Users\PostController@get');
    Route::post('users/follow/{id}', 'Intern\Users\FollowController@follow');
});

Route::get('/test', function () {
//    $users = factory(\PHPMap\User::class, 10)->create();

    return auth()->user()->followers;
//    return str_random(20).'.'.str_random(5).'_'.str_random(15);

//    $user = \PHPMap\User::findByUsername('fwartner');
//
//    $user->update([
//        'avatar' => 'https://avatars0.githubusercontent.com/u/6692500?v=3&s=460'
//    ]);
//
//    $user->reindex();
});

Route::get('/profile', 'Profile\ProfileController@index');