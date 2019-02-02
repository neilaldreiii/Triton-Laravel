<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\BoardMembers;

class BoardMemberController extends Controller
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
        $members = BoardMembers::orderBy('member', 'ASC')->get();
        return view('board-members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board-members.create');
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
            'member' => ['required', 'min:3'],
            'position' => ['required', 'min:3'],
            'member_dp' => ['required', 'image', 'max:1999']
        ]);

        //handle member_dp files
        if($request->hasFile('member_dp')) {

            $filenameWithExt = $request->file('member_dp')->getClientOriginalName();
            
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('member_dp')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('member_dp')->storeAs('public/uploads', $fileNameToStore);
        
        } else {

            $filenameToStore = 'nomember_dp.jpg';

        }

        $attributes['member_dp'] = $fileNameToStore;

        $events = BoardMembers::create($attributes);
        return redirect('/board');
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
        $member = BoardMembers::findOrFail($id);

        return view('board-members.edit', compact('member'));
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
            'member' => ['required', 'min:3'],
            'position' => ['required', 'min:3'],
            'member_dp' => ['nullable', 'image', 'max:1999']
        ]);

        if($request->hasFile('member_dp'))
        {
            $filenameWithExt = $request->file('member_dp')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('member_dp')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('member_dp')->storeAs('public/uploads', $fileNameToStore);
        }

        $members = BoardMembers::findOrFail($id);

        $members->member = $request->input('member');
        $members->position = $request->input('position');

       if($request->hasFile('member_dp')) {
           $members->member_dp = $fileNameToStore;
       }

        if($members->save()) {
            return redirect('/board');
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
        $member = BoardMembers::findOrFail($id);
        $member->delete();

        if($member->member_dp != 'noimage.jpg') {
            Storage::delete('public/uploads/'.$member->member_dp);
        }

        return redirect('/board');
    }
}
