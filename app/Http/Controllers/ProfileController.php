<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('id');
        
        return view('profiles.index', ['posts' => $posts]);
    }
}
