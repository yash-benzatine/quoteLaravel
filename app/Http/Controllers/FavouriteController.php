<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;


class FavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $favourites = Favourite::with('user','quote')->orderBy('id','desc')->get();
        return view('favourite.index', compact('favourites'));
    }
}
