<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Models\Quote;
use App\Models\Category;
use App\Models\UsersMaster;
use App\Models\Theme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quote = Quote::count();
        $category = Category::count();
        $theme = Theme::count();
        $users = UsersMaster::count();
        return view('home', compact('quote','category','theme','users'));
    }
}
