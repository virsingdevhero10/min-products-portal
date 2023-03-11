<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

    public function index(){
        $users =  User::where('status', '=', TRUE)->get();
        return view('admin.dashboard', compact('users'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.admin.login')->with('success','Your logged out successfully!');
    }
}
