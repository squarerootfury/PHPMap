<?php

namespace App\Http\Controllers\Backend\Postcards;

use App\Http\Requests\Postcards\CreatePostcard;
use App\Models\Postcard;
use App\Notifications\Users\PostcardAdded;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcards = Postcard::all();

        return view('backend.postcards.manage', compact('postcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.postcards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostcard $request)
    {
        $user = User::findByUsername($request->get('username'));

        $user->postcards->create($request->all());

        $postcard = Postcard::latest()->first();

        $user->notify(new PostcardAdded($postcard));

        return redirect()->back();
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
        $postcard = Postcard::find($id);

        return view('backend.postcards.edit', compact('postcard'));
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
        $postcard = Postcard::find($id);

        return view('backend.postcards.edit', compact('postcard'));
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
        $postcard = Postcard::find($id);
        $postcard->update($request->all());

        return redirect()->back();
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
        $postcard = Postcard::find($id);
        $postcard->delete();

        return redirect()->back();
    }
}
