@extends('layouts.admin_master')
@section('title')
    Edit Category
@endsection
@section('category')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Edit Category</h3>
        <a href="{{ route('add.category') }}" class="btn btn-success">Add category</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Edit your category</div>
            <div class="card-body">
                <hr>
                <form action="{{ url('update/category/'.$category->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $category->category_image }}">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                        <input id="cc-pament" name="category_name" type="text" class="form-control" required value="{{ $category->category_name }}">
                        <span class="text-danger">@error('category_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">category image</label>
                        <input id="cc-name" name="category_image" type="file" class="form-control cc-name valid">
                        <span class="text-danger">@error('category_image'){{ $message }} @enderror</span>
                    </div>
                    <img src="{{ asset($category->category_image) }}" style="height: 120px; width: 105px;" alt="">
                    <div class="mt-3">
                        <button id="payment-button" type="submit" class="btn btn-info">
                          update category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection