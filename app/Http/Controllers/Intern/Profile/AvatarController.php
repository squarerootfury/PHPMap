<?php

namespace App\Http\Controllers\Intern\Profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateAvatar(Request $request)
    {
        if ($request->user()->avatar != $request->file('avatar'))
        {
           unlink(storage_path('app/public/'.$request->user()->avatar));
        }

        $path = $request->file('avatar')->store('avatars');
        $request->user()->update([
            'avatar' => $path
        ]);

        return back();
    }
}
