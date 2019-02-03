<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;

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
    public function registerAthletes()
    {
        $attributes = request()->validate([
            'gender' => ['required', 'min:3'],
            'birth_month' => ['required', 'min:1'],
            'birth_day' => ['required', 'max:2'],
            'birth_year' => ['required', 'max:4'],
            'firstname' => ['required', 'min:1'],
            'middlename' => ['required', 'min:1'],
            'lastname' => ['required', 'min:1'],
            'school' => ['required', 'min:1'],
            'parent' => ['required', 'min:1'],
            'mobile' => ['required', 'min:10'],
        ]);

        Registration::create($attributes);
        return redirect('/registration');
    }
}
