@extends('layouts.app')

@section('title') {{ ucwords($product->title) }} @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card m-auto" style="width: 25rem;">
                    <img src="/storage/uploads/{{ $product->image }}" class="card-img-top">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h1>{{ $product->title }}</h1>
                            </li>
                            <li class="list-group-item">
                                <p>{{ $product->price }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection