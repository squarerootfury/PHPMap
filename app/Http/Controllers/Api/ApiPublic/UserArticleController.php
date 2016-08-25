<?php

namespace App\Http\Controllers\Api\ApiPublic;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserArticleController extends Controller
{
    public function show($id)
    {
        $articles = User::find($id)->blog_entries()->orderBy('created_at', 'desc')->get();

        return response()->json($articles);
    }
}
