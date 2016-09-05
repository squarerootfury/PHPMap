<?php

namespace App\Http\Controllers\Intern\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            'intro' => $request->get('intro'),
        ]);

        $user->save();
    }
}
