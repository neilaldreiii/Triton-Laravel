@extends('layouts.app')

@section('title', 'Add Event')

@section('content')
    <div class="container border-bottom">
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group m-3">
                <input type="text" name="title" placeholder="Title" id="" class="form-control">
            </div>
            <div class="form-group m-3">
                <textarea name="description" placeholder="description" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group m-3">
                <label for="attachment">Image</label>
                <input type="file" name="attachment" class="form-control" id="attachment">
            </div>
            <div class="row m-3">
                <div class="form-group col-sm">
                    <input type="submit" value="Save" class="btn btn-outline-primary float-right">
                </div>
            </div>
        </form>
    </div>
@endsection