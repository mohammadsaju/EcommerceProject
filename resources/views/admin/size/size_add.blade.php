@extends('layouts.admin_master')
@section('title')
    size add
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Manage size</h3>
        <a href="{{ route('size') }}" class="btn btn-success">Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Add your size</div>
            <div class="card-body">
                <hr>
                <form action="{{ route('insert.size') }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">size Name</label>
                        <input id="cc-pament" name="size" type="text" class="form-control" required>
                        <span class="text-danger">@error('size'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          Add size
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection