<?php

namespace app\Http\Controllers\Api\Meetups;

use App\Models\Meetup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetups = Meetup::where('published', true)->get();

        return response()->json($meetups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()
            ->meetups()
            ->create([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'location' => $request->get('location'),
                'address' => $request->get('address'),
                'city' => $request->get('city'),
                'country' => $request->get('country'),
                'lat' => $request->get('lat'),
                'lng' => $request->get('lng'),
                'website' => $request->get('website'),
                'from_date' => $request->get('from_date'),
                'to_date' => $request->get('to_date'),
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meetup = Meetup::find($id);

        return response()->json($meetup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meetup = Meetup::find($id);
        $meetup->update($request);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meetup = Meetup::find($id);
        $meetup->delete();

        return back();
    }
}
