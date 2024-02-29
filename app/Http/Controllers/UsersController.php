<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersMaster;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = UsersMaster::all();
        return view('users.index', compact('users'));
    }

    public function destroy(UsersMaster $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
