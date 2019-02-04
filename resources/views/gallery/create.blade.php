@extends('layouts.app')

@section('title', 'Add Image')

@section('content')
    <div class="container border-bottom">
        <form action="/gallery" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="m-3">Add Image</h4>
            <div class="form-group m-3">
                <input type="text" name="description" placeholder="Description" id="" class="form-control">
            </div>
            <div class="form-group m-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="row m-3">
                <div class="form-group col-sm">
                    <input type="submit" value="Save" class="btn btn-outline-primary float-right">
                </div>
            </div>
        </form>
    </div>
@endsection