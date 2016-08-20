<?php

Route::resource('users', 'Intern\Users\UserController');
Route::resource('profile/posts', 'Intern\Profile\PostController');

Route::resource('meetups', 'Api\Meetups\MeetupController');

Route::post('profile/info', 'Intern\Profile\InfoController@update');
Route::get('users/getPosts/{id}', 'Intern\Users\PostController@get');
Route::post('users/follow/{id}', 'Intern\Users\FollowController@follow');
Route::post('profile/password', 'Intern\Profile\PasswordController@changePassword');