<?php

namespace app\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }
}
