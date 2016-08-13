<?php

namespace App\Http\Controllers\Intern\Profile;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
//        return $request->get('intro');
        $user = User::find(auth()->user()->id);
        $user->update([
            'intro' => $request->get('intro')
        ]);

        $user->save();
    }
}
