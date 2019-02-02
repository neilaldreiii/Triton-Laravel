<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function coaches()
    {
        return view('pages.coaches');
    }
    public function guide()
    {
        return view('pages.guide');
    }
    public function register()
    {
        return view('pages.registration');
    }
    public function policy()
    {
        return view('pages.policies');
    }
}
