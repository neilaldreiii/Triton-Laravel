@extends('layouts.app')

@section('title') Edit {{ ucwords($product->title) }} @endsection

@section('content')
    <div class="container">
        <h1 class="m-3">Edit {{ ucwords($product->title) }}</h1>
        <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group m-3">
                <input type="text" name="title" value="{{ $product->title }}" placeholder="Title" id="" class="form-control">
            </div>
            <div class="form-group m-3">
                <textarea name="price" placeholder="description" id="" cols="30" rows="3" class="form-control">{{ $product->price }}</textarea>
            </div>
            <div class="form-group m-3">
                <label for="attachment">Image {{ $product->image }}</label>
                <input type="file" name="image" class="form-control" id="attachment">
            </div>
            <div class="row m-3">
                <div class="form-group col-sm">
                    <input type="submit" value="Save" class="btn btn-outline-primary float-right">
                </div>
            </div>
        </form>
    </div>
@endsection