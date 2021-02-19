@extends('layouts.admin_master')
@section('title')
    brand edit
@endsection
@section('brand')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">edit brand</h3>
        <a href="{{ route('brand') }}" class="btn btn-success">Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">update your brand</div>
            <div class="card-body">
                <hr>
                <form action="{{ url('update/brand/'.$brand->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">brand Name</label>
                        <input id="cc-pament" name="brand_name" type="text" class="form-control" required value="{{ $brand->brand_name }}">
                        <span class="text-danger">@error('brand_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">brand image</label>
                        <input id="cc-name" name="brand_image" type="file" class="form-control cc-name valid">
                        <span class="text-danger">@error('brand_image'){{ $message }} @enderror</span>
                    </div>
                    <img src="{{ asset($brand->brand_image) }}" style="height: 120px; width: 105px;" alt="">
                    <div class="mt-3">
                        <button id="payment-button" type="submit" class="btn btn-info">
                          Add brand
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection