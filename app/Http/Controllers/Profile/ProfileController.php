<?php

namespace PHPMap\Http\Controllers\Profile;

use Illuminate\Http\Request;

use PHPMap\Http\Requests;
use PHPMap\Http\Controllers\Controller;

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
