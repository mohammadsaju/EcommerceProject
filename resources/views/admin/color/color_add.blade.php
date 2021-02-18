@extends('layouts.admin_master')
@section('color')
    active
@endsection
@section('title')
    color add
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Manage color</h3>
        <a href="{{ route('color') }}" class="btn btn-success">Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Add your color</div>
            <div class="card-body">
                <hr>
                <form action="{{ route('insert.color') }}" method="POST" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">color Name</label>
                        <input id="cc-pament" name="color_name" type="text" class="form-control" required>
                        <span class="text-danger">@error('color_name'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-info">
                          Add color
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection