<?php

namespace App\Http\Controllers\Api\Users;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('scope:manage-profile');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find($request->user()->id);
        $user->update(['password' => bcrypt($request->get('password'))]);
    }
}
