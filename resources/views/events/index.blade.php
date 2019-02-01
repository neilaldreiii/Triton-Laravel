@extends('layouts.app')

@section('title', 'Triton | Events')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <div class="col-sm">
                <h1 class="">Events</h1>
            </div>
            @auth
                <div class="col-sm">
                    <a href="/events/create" class="btn btn-primary float-right">Create</a>
                </div>
            @endauth
        </div>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-sm mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $event->title }}</h3>
                        </div>
                        <img src="/storage/uploads/{{ $event->attachment }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                        @auth
                            <div class="card-body">
                                <a href="/events/{{ $event->id }}/edit" class="btn btn-warning float-left">Edit</a>
                                <form action="events/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection