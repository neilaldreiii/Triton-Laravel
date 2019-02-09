@extends('layouts.app')

@section('title') {{ ucwords($product->title) }} @endsection

@section('content')
    <div class="container">
        <form action="/products/{{ $product->id }}/orders" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col">
                    <div class="card m-auto" style="width: 30rem;">
                        <img src="/storage/uploads/{{ $product->image }}" class="card-img-top">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h1><input type="text" readonly class="form-control-plaintext" id="staticProduct" name="product" value="{{ $product->title }}"></h1>
                                </li>
                                <li class="list-group-item">
                                    <input type="text" readonly class="form-control-plaintext" id="staticPrice" name="price" value="{{ $product->price }}">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col m-3">
                    <h1 class="mt-2">Order</h1>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="Address" name="address">
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="Size" name="size">
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number">
                    </div>
                    <div class="form-group m-2">
                        <input type="submit" value="Send" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection