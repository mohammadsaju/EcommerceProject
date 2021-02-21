@extends('layouts.admin_master')
@section('title')
    edit banner
@endsection
@section('banner')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">edit banner</h3>
        <a href="{{ route('banner') }}" class="btn btn-success">Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">upate your banner</div>
            <div class="card-body">
                <hr>
                <form action="{{ url('update/banner/'.$banner->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $banner->image }}">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">collection Name</label>
                        <input id="cc-pament" name="collection_name" type="text" class="form-control" required value="{{ $banner->collection_name }}">
                        <span class="text-danger">@error('collection_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">discount</label>
                        <input id="cc-pament" name="discount" type="number" class="form-control" required value="{{ $banner->discount }}">
                        <span class="text-danger">@error('discount'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">short describtion</label>
                       <textarea name="short_describtion" id="cc-name" cols="8" rows="" class="form-control">{{ $banner->short_describtion }}</textarea>
                        <span class="text-danger">@error('short_describtion'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">btn text</label>
                        <input id="cc-pament" name="btn_txt" type="text" class="form-control" required value="{{ $banner->btn_txt }}">
                        <span class="text-danger">@error('btn_txt'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">btn link</label>
                        <input id="cc-pament" name="btn_link" type="text" class="form-control" required value="{{ $banner->btn_link }}">
                        <span class="text-danger">@error('btn_link'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">image</label>
                        <input id="cc-name" name="image" type="file" class="form-control cc-name valid">
                        <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                    </div>
                    <img src="{{ asset($banner->image) }}" style="height: 250px; width: 350px;" alt="">
                    <div class="mt-3">
                        <button id="payment-button" type="submit" class="btn btn-info">
                          update banner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection