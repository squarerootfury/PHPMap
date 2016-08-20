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

Route::get('auth/github', 'Auth\SocialController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\SocialController@handleProviderCallback');

Route::resource('users', 'Users\UserController');

Route::get('@{username}', 'Users\UserController@show');

Route::resource('blogs', 'Blog\UserController');
Route::resource('blogs.articles', 'Blog\ArticleController');


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
Route::get('/settings', 'Profile\SettingsController@index');

Route::post('/updateLocation', 'Intern\Profile\LocationController@updateLocation');
Route::post('/updateAvatar', 'Intern\Profile\AvatarController@updateAvatar');

Route::group(['prefix' => 'backend', 'middleware' => 'admin'], function() {
    Route::get('/', 'Backend\BackendController@index');
    Route::resource('users', 'Backend\Users\UserController');
    Route::resource('articles', 'Backend\Blogs\ArticleController');
});