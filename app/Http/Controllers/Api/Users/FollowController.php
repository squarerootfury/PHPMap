<?php

namespace App\Http\Controllers\Api\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function follow(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->user()->id === $user->id) {
            return response()->json('You cannot follow yourself', 422);
        }

        if ($request->user()->followers->contains($user)) {
            $request->user()->followtoggle($user);

            return response()->json('You are not longer following '.$user->username, 200);
        }

        $request->user()->followtoggle($user);

        return response()->json('You are now following '.$user->username, 200);
    }
}
