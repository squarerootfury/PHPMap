<?php

namespace App\Http\Controllers\Intern\Users;

use App\Http\Controllers\Controller;
use App\User;

class PostController extends Controller
{
    public function get($id)
    {
        $posts = User::find($id)->posts()->orderBy('created_at', 'desc')->get();

        return response()->json($posts);
    }
}
