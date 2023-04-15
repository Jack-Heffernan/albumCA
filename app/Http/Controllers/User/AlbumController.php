<?php

namespace App\Http\Controllers\User;

use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $albums = Album::where('user_id', Auth::id())->latest('updated_at')->paginate(1);

        $albums = Album::get();


        return view('user.albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $albums = Album::get();
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {

        return view('user.albums.show')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
    }
}
