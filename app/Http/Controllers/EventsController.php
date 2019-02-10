<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Events;

class EventsController extends Controller
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
        $events = Events::orderBy('created_at', 'DESC')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'attachment' => ['required', 'image', 'max:1999']
        ]);

        //handle attachment files
        if($request->hasFile('attachment')) {

            $filenameWithExt = $request->file('attachment')->getClientOriginalName();
            
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('attachment')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('attachment')->storeAs('public/uploads', $fileNameToStore);
        
        } else {

            $filenameToStore = 'noattachment.jpg';

        }

        $attributes['attachment'] = $fileNameToStore;

        $events = Events::create($attributes);
        return redirect('/events')->with('success', 'Event created');
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
        $event = Events::findOrFail($id);

        return view('events.edit', compact('event'));
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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'attachment' => ['nullable', 'image', 'max:1999']
        ]);

        if($request->hasFile('attachment'))
        {
            $filenameWithExt = $request->file('attachment')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('attachment')->storeAs('public/uploads', $fileNameToStore);
        }

        $event = Events::findOrFail($id);

        $event->title = $request->input('title');
        $event->description = $request->input('description');

       if($request->hasFile('attachment')) {
           $event->attachment = $fileNameToStore;
       }

        if($event->save()) {
            return redirect('/events')->with('success', 'Edited '.$event->title);
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
        $event = Events::findOrFail($id);
        $event->delete();

        if($event->attachment != 'noimage.jpg') {
            Storage::delete('public/uploads/'.$event->attachment);
        }

        return redirect('/events')->with('success', 'Removed '.$event->title);
    }
}
