<?php

namespace App\Http\Controllers\Intern\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateLocation(Request $request)
    {
        $user = $request->user();
        $user->update([
            'address' => $request->get('address'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
        ]);

        return back();
    }
}
