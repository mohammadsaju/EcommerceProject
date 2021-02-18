@extends('layouts.admin_master')
@section('coupon')
    active
@endsection
@section('title')
    coupon
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">coupon</h3>
        <a href="{{ route('add.coupon') }}" class="btn btn-success">Add Coupon</a>
    </div>
</div>
<div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                @if(Session::has('success'))
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="alert-success">{{ Session('success') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                @if(Session::has('danger'))
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="alert-danger">{{ Session('danger') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                @if(Session::has('warning'))
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="">{{ Session('warning') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Sl:</th>
                                            <th>coupon_name</th>
                                            <th>coupon_code</th>
                                            <th>coupon_discount</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->id }}</td>
                                            <td>{{ $coupon->coupon_name }}</td>
                                            <td>{{ $coupon->coupon_code }}</td>
                                            <td>{{ $coupon->coupon_discount }}%</td>
                                            <td>
                                                @if($coupon->coupon_status === 1)
                                                <span class="badge badge-success">active</span>
                                                @else
                                                <span class="badge badge-danger">inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('edit/coupon/'.$coupon->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('delete/coupon/'.$coupon->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                @if($coupon->coupon_status === 1)
                                                <a href="{{ url('inactive/coupon/'.$coupon->id) }}" class="btn btn-warning btn-sm">inactive</a>
                                                @else
                                                <a href="{{ url('active/coupon/'.$coupon->id) }}" class="btn btn-success btn-sm">active</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
                        </div>
</div>
@endsection