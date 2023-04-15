<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.albums.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.albums.index';
        }
        return redirect()->route($home);
    }

    public function artistIndex(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.artists.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.artists.index';
        }
        return redirect()->route($home);
    }
}
