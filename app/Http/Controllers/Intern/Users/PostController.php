<?php

namespace PHPMap\Http\Controllers\Intern\Users;

use Illuminate\Http\Request;

use PHPMap\Http\Requests;
use PHPMap\Http\Controllers\Controller;
use PHPMap\User;

class PostController extends Controller
{
    public function get($id)
    {
        $posts = User::find($id)->posts()->orderBy('created_at', 'desc')->get();

        return response()->json($posts);
    }
}
