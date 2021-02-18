@extends('layouts.admin_master')
@section('title')
    category add
@endsection
@section('category')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Manage Category</h3>
        <a href="{{ route('category') }}" class="btn btn-success">Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Add your category</div>
            <div class="card-body">
                <hr>
                <form action="{{ route('insert.category') }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                        <input id="cc-pament" name="category_name" type="text" class="form-control" required>
                        <span class="text-danger">@error('category_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">category slug</label>
                        <input id="cc-name" name="category_slug" type="text" class="form-control cc-name valid" required>
                        <span class="text-danger">@error('category_slug'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          Add category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection