<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function coaches()
    {
        return view('pages.coaches');
    }
}
