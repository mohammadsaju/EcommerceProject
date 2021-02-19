@extends('layouts.admin_master')
@section('product')
    active
@endsection
@section('title')
    product list
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">product list</h3>
        <a href="{{ route('product') }}" class="btn btn-success">Add product</a>
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
                                            <th>Sl no:</th>
                                            <th>product name</th>
                                            <th>image</th>
                                            <th> quantity</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>
                                                <img src="{{ asset($product->image_one) }}" style="height: 70px; width: 70px;" alt="">
                                            </td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>
                                                @if($product->status === 1)
                                                <span class="badge badge-success">active</span>
                                                @else
                                                <span class="badge badge-danger">inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('edit/product/'.$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('delete/product/'.$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                @if($product->status === 1)
                                                <a href="{{ url('inactive/product/'.$product->id) }}" class="btn btn-warning btn-sm">inactive</a>
                                                @else
                                                <a href="{{ url('active/product/'.$product->id) }}" class="btn btn-success btn-sm">active</a>
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