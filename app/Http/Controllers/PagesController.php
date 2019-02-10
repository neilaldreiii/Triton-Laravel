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
    public function registerAthletes(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required',
            'birth_month' => 'required',
            'birth_day' => 'required',
            'birth_year' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'school' => 'required',
            'parent' => 'required',
            'mobile' => 'required',
        ]);

        //storing to database without auth
        $registration = new Registration();

        $registration->gender = request('gender');
        $registration->birth_month = request('birth_month');
        $registration->birth_day = request('birth_day');
        $registration->birth_year = request('birth_year');
        $registration->firstname = request('firstname');
        $registration->middlename = request('middlename');
        $registration->lastname = request('lastname');
        $registration->school = request('school');
        $registration->parent = request('parent');
        $registration->mobile = request('mobile');

        $registration->save();
        return redirect('/registration')->with('success', 'Thank you for joining triton swim club. You will receive a message or a call from a triton official regarding the registration.');
    }
}
