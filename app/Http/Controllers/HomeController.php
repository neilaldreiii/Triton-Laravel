<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registration;

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
        $users = User::orderBy('name', 'ASC')->get();
        $registrations = Registration::orderBy('created_at', 'ASC')->get();

        return view('home', compact('users', 'registrations'));
    }
}
