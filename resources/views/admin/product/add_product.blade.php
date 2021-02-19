@extends('layouts.admin_master')
@section('title')
    Add product
@endsection
@section('product')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Manage product</h3>
        <a href="{{ route('show.product') }}" class="btn btn-success">show product</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Add your product</div>
            <div class="card-body">
                <hr>
                <form action="{{ route('insert.product') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">product Name</label>
                        <input id="cc-pament" name="product_name" type="text" class="form-control" required>
                        <span class="text-danger">@error('product_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">product price</label>
                        <input id="cc-pament" name="product_price" type="text" class="form-control" required>
                        <span class="text-danger">@error('product_price'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">product code</label>
                        <input id="cc-name" name="product_code" type="text" class="form-control cc-name valid" required>
                        <span class="text-danger">@error('product_code'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">product quantity</label>
                        <input id="cc-pament" name="product_quantity" type="text" class="form-control" required>
                        <span class="text-danger">@error('product_quantity'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">category</label>
                        <select name="category_id" id="cc-payment" data-placeholder="choose category" class="form-control">
                            <option value="">choose category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('category_id'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">brands</label>
                        <select name="brand_id" id="cc-payment" data-placeholder="choose category" class="form-control">
                            <option value="">choose brands</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('brand_id'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">short describtion</label>
                       <textarea name="short_describtion" id="cc-name" cols="8" rows="" class="form-control"></textarea>
                        <span class="text-danger">@error('short_describtion'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">long describtion</label>
                        <textarea name="long_describtion" id="cc-name" cols="8" rows="" class="form-control"></textarea>
                        <span class="text-danger">@error('long_describtion'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">image one</label>
                        <input id="cc-name" name="image_one" type="file" class="form-control cc-name valid" required>
                        <span class="text-danger">@error('image_one'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">image two</label>
                        <input id="cc-name" name="image_two" type="file" class="form-control cc-name valid" required>
                        <span class="text-danger">@error('image_two'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">image three</label>
                        <input id="cc-name" name="image_three" type="file" class="form-control cc-name valid" required>
                        <span class="text-danger">@error('image_three'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          Add product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



