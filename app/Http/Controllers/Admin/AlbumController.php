<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');


        $albums = Album::with('genre')->with('artists')->get();


        return view('admin.albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $genres = Genre::get();
        $artists = Artist::all();

        return view('admin.albums.create')->with('genres', $genres)->with('artists', $artists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $albums = Album::get();

        // dd($request);
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'year' => 'required',
            // 'album_image' => 'file|image',
            'rating' => 'required',
            'genre_id' => 'required',
            // 'artists' => ['required', 'exists:artists,id']
        ]);

        // dd($request);
        $album_image = $request->file('album_image');
        $extension = $album_image->getClientOriginalExtension();

        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;

        $path = $album_image->storeAs('public/images', $filename);

        $album = Album::create([
            'user_id' => '1',
            'title' => $request->title,
            'desc' => $request->desc,
            'album_image' => $filename,
            'year' => $request->year,
            'genre_id' => $request->genre_id,
            'rating' => $request->rating

        ]);

        $album->artists()->attach($request->artists);

        $albums->genre_id = $request->input('genre_id');

        return to_route('admin.albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.albums.show')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $artists = Artist::get();
        $genres = Genre::get();

        return view('admin.albums.edit')->with('album', $album)->with('genres', $genres)->with('artists', $artists);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // dd($request);
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'year' => 'required',
            'rating' => 'required',
        ]);


        $album->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'year' => $request->year,
            'rating' => $request->rating
        ]);

        return to_route('admin.albums.show', $album)->with('success', 'Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');
        $album->delete();

        return to_route('admin.albums.index')->with('success', 'Album deleted successfully');
    }
}
