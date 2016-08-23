<?php

Route::get('/users', 'Api\Users\UserController@index');
Route::get('/users/getPosts/{id}', 'Api\Users\PostController@show');

Route::resource('/meetups', 'Api\Meetups\MeetupController@index');
