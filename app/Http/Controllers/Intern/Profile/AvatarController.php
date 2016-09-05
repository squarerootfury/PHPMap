<?php

namespace App\Http\Controllers\Intern\Profile;

use App\Http\Requests\Users\AvatarRequest;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateAvatar(AvatarRequest $request)
    {
        if ($request->user()->avatar != $request->file('avatar')) {
            try {
                unlink(storage_path('app/public/'.$request->user()->avatar));
            } catch (\Exception $e) {
            }
        }

        $path = $request->file('avatar')->store('avatars');
        $request->user()->update([
            'avatar' => 'storage/'.$path,
        ]);

        return back();
    }
}
