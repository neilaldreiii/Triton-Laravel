<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registration;
use App\Orders;

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
        $users = User::where('email_verified_at', 'false')->get();
        $registrations = Registration::orderBy('created_at', 'DESC')->get();
        $orders = Orders::orderBy('created_at', 'DESC')->get();

        return view('home', compact('users', 'registrations', 'orders'));
    }
}
