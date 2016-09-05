<?php

namespace app\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.settings');
    }
}
