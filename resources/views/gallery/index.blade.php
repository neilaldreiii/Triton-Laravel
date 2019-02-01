@extends('layouts.app')

@section('title', 'Triton | Gallery')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <div class="col-sm">
                <h1>Gallery</h1>
            </div>
            @auth
                <div class="col-sm">
                    <a href="/gallery/create" class="btn btn-primary float-right">Create</a>
                </div>
            @endauth
        </div>
        <div class="row">
            @foreach ($gallery as $image)
                <div class="col-sm mt-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="/storage/uploads/{{ $image->image }}" style="height:275px;" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ $image->description }}</p>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary float-left">View</button>
                            @auth
                            <form action="gallery/{{ $image->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection