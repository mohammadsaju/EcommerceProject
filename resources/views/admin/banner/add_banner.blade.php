@extends('layouts.admin_master')
@section('title')
    add banner
@endsection
@section('banner')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Manage banner</h3>
        <a href="{{ route('banner') }}" class="btn btn-success">Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Add your banner</div>
            <div class="card-body">
                <hr>
                <form action="{{ route('insert.banner') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">collection Name</label>
                        <input id="cc-pament" name="collection_name" type="text" class="form-control" required>
                        <span class="text-danger">@error('collection_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">discount</label>
                        <input id="cc-pament" name="discount" type="number" class="form-control" required>
                        <span class="text-danger">@error('discount'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">short describtion</label>
                       <textarea name="short_describtion" id="cc-name" cols="8" rows="" class="form-control"></textarea>
                        <span class="text-danger">@error('short_describtion'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">btn text</label>
                        <input id="cc-pament" name="btn_txt" type="text" class="form-control" required>
                        <span class="text-danger">@error('btn_txt'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">btn link</label>
                        <input id="cc-pament" name="btn_link" type="text" class="form-control" required>
                        <span class="text-danger">@error('btn_link'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">image</label>
                        <input id="cc-name" name="image" type="file" class="form-control cc-name valid">
                        <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          Add banner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection