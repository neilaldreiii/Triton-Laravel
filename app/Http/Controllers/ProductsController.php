<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'price' => ['required'],
            'image' => ['required', 'image', 'max:1999']
        ]);

        if($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/uploads', $filenameToStore);
        
        } else {

            $filenameToStore = 'noimage.jpg';

        }

        $attributes['image'] = $filenameToStore;

        $products = Products::create($attributes);
        return redirect('/products')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);

        return view('products.edit', compact('product'));
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
            'price' => ['required'],
            'image' => ['nullable', 'image', 'max:1999']
        ]);

        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploads', $fileNameToStore);
        }

        $product = Products::findOrFail($id);

        $product->title = $request->input('title');
        $product->price = $request->input('price');

       if($request->hasFile('image')) {
           $product->image = $fileNameToStore;
       }

        if($product->save()) {
            return redirect('/products')->with('success', 'Edited '.$product->title);
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
        $product = Products::findOrFail($id);
        $product->delete();

        if($product->image != 'noimage.jpg') {
            Storage::delete('public/uploads/'.$product->image);
        }

        return redirect('/products')->with('success', 'Removed '.$product->title);
    }
}
