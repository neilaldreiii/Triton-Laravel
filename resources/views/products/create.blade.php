@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="container">
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="m-3">Add Product</h4>
            <div class="row mt-3 mb-3">
                <div class="form-group m-3 col-sm">
                    <input type="text" name="title" class="form-control" placeholder="Product Name">
                </div>
                <div class="form-group m-3 col-sm">
                    <input type="text" name="price" class="form-control" placeholder="Product Price">
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="form-group m-3 col-sm">
                    <label for="image">Product Thumbnail</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col m-3 col-sm">
                    <input type="submit" value="Save" class="btn btn-outline-primary float-right">
                </div>
            </div>
        </form>
    </div>
@endsection