<?php

Route::resource('users', 'Api\Users\UserController');
Route::resource('profile/posts', 'Api\Users\PostController');

Route::resource('meetups', 'Api\Meetups\MeetupController');

Route::post('profile/info', 'Api\Users\InfoController@update');
Route::get('users/getPosts/{id}', 'Api\Users\PostController@show');
Route::post('users/follow/{id}', 'Api\Users\FollowController@follow');
Route::post('profile/password', 'Api\Users\PasswordController@changePassword');