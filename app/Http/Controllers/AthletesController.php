<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Athletes;

class AthletesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athletes = Athletes::orderBy('fullname', 'ASC')->get();
        return view('athletes.index', compact('athletes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Athletes $athletes)
    {
        return view('athletes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'fullname' => ['required', 'min:3'],
            'nickname' => ['required'],
            'school' => ['required', 'min:3'],
            'introduction' => ['required', 'min:5'],
            'category' => ['required', 'min:3'],
            'main_dp' => ['required', 'image', 'max:1999'],
            'secondary_dp' => ['required', 'image', 'max:1999']
        ]);

        //handle image files
        if($request->hasFile('main_dp', 'secondary_dp')) {

            $filenameWithExtFirst = $request->file('main_dp')->getClientOriginalName();
            $filenameWithExtSecond = $request->file('secondary_dp')->getClientOriginalName();
            
            $filenameFirst = pathinfo($filenameWithExtFirst, PATHINFO_FILENAME);
            $filenameSec = pathinfo($filenameWithExtSecond, PATHINFO_FILENAME);

            $extension = $request->file('main_dp')->getClientOriginalExtension();
            $extensionSec = $request->file('secondary_dp')->getClientOriginalExtension();

            $fileNameToStoreF = $filenameFirst.'_'.time().'.'.$extension;
            $fileNameToStoreS = $filenameSec.'_'.time().'.'.$extensionSec;

            $path = $request->file('main_dp')->storeAs('public/uploads', $fileNameToStoreF);
            $pathS = $request->file('secondary_dp')->storeAs('public/uploads',$fileNameToStoreS);
        
        } else {

            $filenameToStore = 'noimage.jpg';

        }

        $attributes['main_dp'] = $fileNameToStoreF;
        $attributes['secondary_dp'] = $fileNameToStoreS;

        $athlete = Athletes::create($attributes);
        return redirect('/athletes')->with('success','Athlete added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $athlete = Athletes::findOrFail($id);
        
        return view('athletes.edit', compact('athlete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => ['required', 'min:3'],
            'nickname' => ['required', 'min:3'],
            'school' => ['required', 'min:3'],
            'introduction' => ['required', 'min:3'],
            'category' => ['required', 'min:3'],
            'main_dp' => ['nullable', 'image', 'max:1999'],
            'secondary_dp' => ['nullable', 'image', 'max:1999']
        ]);

        if($request->hasFile('main_dp', 'secondary_dp'))
        {
            $filenameWithExtFirst = $request->file('main_dp')->getClientOriginalName();
            $filenameWithExtSecond = $request->file('secondary_dp')->getClientOriginalName();
            
            $filenameFirst = pathinfo($filenameWithExtFirst, PATHINFO_FILENAME);
            $filenameSec = pathinfo($filenameWithExtSecond, PATHINFO_FILENAME);

            $extension = $request->file('main_dp')->getClientOriginalExtension();
            $extensionSec = $request->file('secondary_dp')->getClientOriginalExtension();

            $fileNameToStoreF = $filenameFirst.'_'.time().'.'.$extension;
            $fileNameToStoreS = $filenameSec.'_'.time().'.'.$extensionSec;

            $path = $request->file('main_dp')->storeAs('public/uploads', $fileNameToStoreF);
            $pathS = $request->file('secondary_dp')->storeAs('public/uploads',$fileNameToStoreS);
        }

        $athletes = Athletes::findOrFail($id);
        $athletes->fullname = $request->input('fullname');
        $athletes->nickname = $request->input('nickname');
        $athletes->school = $request->input('school');
        $athletes->introduction = $request->input('introduction');
        $athletes->category = $request->input('category');

       if($request->hasFile('main_dp') || $request->hasFile('secondary_dp')) {
           $athletes->main_dp = $fileNameToStoreF;
           $athletes->secondary_dp = $fileNameToStoreS;
       }

        if($athletes->save()) {
            return redirect('/athletes')->with('success','Edited '.$athletes->fullname);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $athlete = Athletes::findOrFail($id);
        $athlete->delete();

        if($athlete->main_dp != 'noimage.jpg' || $athlete->secondary_dp != 'noimage.jpg') {
            Storage::delete('public/uploads/'.$athlete->main_dp);
            Storage::delete('public/uploads/'.$athlete->secondary_dp);
        }

        return redirect('/athletes')->with('success', 'Removed '.$athlete->fullname);
    }
}
