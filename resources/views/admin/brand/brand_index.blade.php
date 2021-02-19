@extends('layouts.admin_master')
@section('brand')
    active
@endsection
@section('title')
    brand
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Brand</h3>
        <a href="{{ route('add.brand') }}" class="btn btn-success">Add Brand</a>
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
                                            <th>brand_name</th>
                                            <th>brand_image</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td>
                                                <img src="{{ asset($brand->brand_image) }}" style="height: 70px; width: 70px;" alt="brand image">
                                            </td>
                                            <td>
                                                @if($brand->brand_status === 1)
                                                <span class="badge badge-success">active</span>
                                                @else
                                                <span class="badge badge-danger">inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('edit/brand/'.$brand->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('delete/brand/'.$brand->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                @if($brand->brand_status === 1)
                                                <a href="{{ url('inactive/brand/'.$brand->id) }}" class="btn btn-warning btn-sm">inactive</a>
                                                @else
                                                <a href="{{ url('active/brand/'.$brand->id) }}" class="btn btn-success btn-sm">active</a>
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