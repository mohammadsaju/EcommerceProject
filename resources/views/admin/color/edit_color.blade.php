@extends('layouts.admin_master')
@section('color')
    active
@endsection
@section('title')
    Edit size
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Edit color</h3>
        <a href="{{ route('add.coupon') }}" class="btn btn-success">Add color</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Edit your color</div>
            <div class="card-body">
                <hr>
                <form action="{{ url('update/color/'.$color->id) }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">size Name</label>
                        <input id="cc-pament" name="color_name" type="text" class="form-control" required value="{{ $color->color_name }}">
                        <span class="text-danger">@error('color_name'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          update color
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection