@extends('layouts.app')

@section('title') Edit {{ $event->title  }} @endsection

@section('content')
    <div class="container border-bottom">
        <h1 class="m-3">Edit {{ $event->title }}</h1>
        <form action="/events/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group m-3">
                <input type="text" name="title" value="{{ $event->title }}" placeholder="Title" id="" class="form-control">
            </div>
            <div class="form-group m-3">
                <textarea name="description" placeholder="description" id="" cols="30" rows="3" class="form-control">{{ $event->description }}</textarea>
            </div>
            <div class="form-group m-3">
                <label for="attachment">Image {{ $event->attachment }}</label>
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