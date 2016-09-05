<?php

namespace App\Http\Controllers\ApiPublic;

use App\User;
use App\Http\Controllers\Controller;

class UserArticleController extends Controller
{
    public function show($id)
    {
        $articles = User::find($id)->blog_entries()->orderBy('created_at', 'desc')->get();

        return response()->json($articles);
    }
}
