<?php

namespace App\Http\Controllers\ApiPublic;

use App\Models\UserPost;
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
        $posts = User::find($id)
            ->posts()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($posts);
    }
    
    /**
     * Returns the latest posts
     */
    public function latest() {
        return response()->json(UserPost::with('author')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get());
    }
}
