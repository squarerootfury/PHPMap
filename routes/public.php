<?php

Route::get('/users', 'Api\Users\UserController@index');
Route::get('/users/getPosts/{id}', 'Api\ApiPublic\PostController@show');

Route::get('/users/getArticles/{id}', 'Api\ApiPublic\ArticleController@show');

Route::resource('/meetups', 'Api\ApiPublic\MeetupController@index');
Route::resource('/articles', 'Api\ApiPublic\ArticleController');
