<?php

namespace App\Http\Controllers\ApiPublic;

use App\User;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $posts = User::find($id)->posts()->orderBy('created_at', 'desc')->get();

        return response()->json($posts);
    }
}
