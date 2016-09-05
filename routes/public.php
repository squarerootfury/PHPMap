<?php

Route::get('users', 'ApiPublic\UserController@index');
Route::get('users/getPosts/{id}', 'ApiPublic\PostController@show');

Route::get('posts/latest', 'ApiPublic\PostController@latest');

Route::get('users/getArticles/{id}', 'ApiPublic\UserArticleController@show');

Route::resource('usergroups', 'ApiPublic\UsergroupController');
Route::resource('articles', 'ApiPublic\ArticleController');

Route::get('postcards', 'ApiPublic\PostcardController@index');
