<?php

Route::get('/users', 'Api\Users\UserController@index');
Route::get('/users/getPosts/{id}', 'Api\ApiPublic\PostController@show');

Route::resource('/meetups', 'Api\ApiPublic\MeetupController@index');
