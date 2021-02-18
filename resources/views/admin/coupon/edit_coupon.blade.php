@extends('layouts.admin_master')
@section('title')
    Edit coupon
@endsection
@section('coupon')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Edit coupon</h3>
        <a href="{{ route('add.coupon') }}" class="btn btn-success">Add coupon</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Edit your coupon</div>
            <div class="card-body">
                <hr>
                <form action="{{ url('update/coupon/'.$coupon->id) }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">coupon Name</label>
                        <input id="cc-pament" name="coupon_name" type="text" class="form-control" required value="{{ $coupon->coupon_name }}">
                        <span class="text-danger">@error('coupon_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">coupon code</label>
                        <input id="cc-name" name="coupon_code" type="text" class="form-control cc-name valid" required value="{{ $coupon->coupon_code }}">
                        <span class="text-danger">@error('coupon_code'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">coupon discount</label>
                        <input id="cc-name" name="coupon_discount" type="text" class="form-control cc-name valid" required value="{{ $coupon->coupon_discount }}">
                        <span class="text-danger">@error('coupon_discount'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          update coupon
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection