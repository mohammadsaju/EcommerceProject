@extends('layouts.admin_master')
@section('title')
    update product
@endsection
@section('product')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">update product</h3>
        <a href="{{ route('show.product') }}" class="btn btn-success">back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">update your product</div>
            <div class="card-body">
                <hr>
                <form action="{{ url('update/product/content/'.$product->id) }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">product Name</label>
                        <input id="cc-pament" name="product_name" type="text" class="form-control" required value="{{ $product->product_name }}">
                        <span class="text-danger">@error('product_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">product price</label>
                        <input id="cc-pament" name="product_price" type="text" class="form-control" required value="{{ $product->product_price }}">
                        <span class="text-danger">@error('product_price'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">product code</label>
                        <input id="cc-name" name="product_code" type="text" class="form-control cc-name valid" required value="{{ $product->product_code }}">
                        <span class="text-danger">@error('product_code'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">product quantity</label>
                        <input id="cc-pament" name="product_quantity" type="text" class="form-control" required value="{{ $product->product_quantity }}">
                        <span class="text-danger">@error('product_quantity'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">category</label>
                        <select name="category_id" id="cc-payment" data-placeholder="choose category" class="form-control">
                            <option value="">choose category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"{{ $category->id == $product->category_id ? "selected" : "" }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('category_id'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">brands</label>
                        <select name="brand_id" id="cc-payment" data-placeholder="choose category" class="form-control">
                            <option value="">choose brands</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? "selected" : "" }}>{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('brand_id'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">short describtion</label>
                       <textarea name="short_describtion" id="cc-name" cols="8" rows="" class="form-control">{{ $product->short_describtion }}</textarea>
                        <span class="text-danger">@error('short_describtion'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">long describtion</label>
                        <textarea name="long_describtion" id="cc-name" cols="8" rows="" class="form-control">{{ $product->long_describtion }}</textarea>
                        <span class="text-danger">@error('long_describtion'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          update product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('update/image/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="img_one" value="{{ $product->image_one }}">
            <input type="hidden" name="img_two" value="{{ $product->image_two }}">
            <input type="hidden" name="img_three" value="{{ $product->image_three }}">

            <div class="form-group has-success" style="display: inline-block;">
                <label for="cc-name" class="control-label mb-1">image one</label>
                <input id="cc-name" name="image_one" type="file" class="cc-name valid">
                <span class="text-danger">@error('image_one'){{ $message }} @enderror</span>
            </div>
            <div class="form-group has-success" style="display: inline-block;">
                <label for="cc-name" class="control-label mb-1">image two</label>
                <input id="cc-name" name="image_two" type="file" class="cc-name valid">
                <span class="text-danger">@error('image_two'){{ $message }} @enderror</span>
            </div>
            <div class="form-group has-success" style="display: inline-block;">
                <label for="cc-name" class="control-label mb-1">image three</label>
                <input id="cc-name" name="image_three" type="file" class="cc-name valid">
                <span class="text-danger">@error('image_three'){{ $message }} @enderror</span>
            </div>
            <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($product->image_one) }}" style="height: 200px; width: 150px;" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset($product->image_two) }}" style="height: 200px; width: 150px;" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset($product->image_three) }}" style="height: 200px; width: 150px;" alt="">
                    </div>
            </div>
            <div class="mt-3">
                <button id="payment-button" type="submit" class="btn btn-info">
                  update image
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
