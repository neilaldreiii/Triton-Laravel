@extends('layouts.app')

@section('title', 'Triton | Products')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <div class="col-sm">
                <h1>Products</h1>
            </div>
            @auth
                <div class="col-sm">
                    <a href="/products/create" class="btn btn-primary float-right">Create</a>
                </div>
            @endauth
        </div>
        <div class="row mt-3 mb-3">
            @foreach($products as $product)
                <div class="col">
                    <div class="card" style="width:20rem;">
                        <div class="card-header text-center">
                            <h4>{{ $product->title }}</h4>
                        </div>
                        <img src="/storage/uploads/{{ $product->image }}" alt="" class="card-img-top" style="height: 20rem;">
                        <div class="card-body">
                            <p class="card-text text-center">Php. {{ $product->price }}</p>
                        </div>
                        <div class="card-body">
                            <a href="/products/{{ $product->id }}" class="btn btn-primary btn-block">Buy</a>
                        </div>
                        <div class="card-body">
                            @auth
                                <a href="/products/{{ $product->id }}/edit" class="btn btn-warning float-left">Edit</a>
                                <form action="products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
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