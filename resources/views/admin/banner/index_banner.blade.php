@extends('layouts.admin_master')
@section('banner')
    active
@endsection
@section('title')
    Banner
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">Banner</h3>
        <a href="{{ route('add.banner') }}" class="btn btn-success">Add banner</a>
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
                                            <th>collection name</th>
                                            <th>discount</th>
                                            <th>short describtion</th>
                                            <th>btn text</th>
                                            <th>btn link</th>
                                            <th>image</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ $banner->id }}</td>
                                            <td>{{ $banner->collection_name }}</td>
                                            <td>{{ $banner->discount }}%</td>
                                            <td>{{ $banner->short_describtion }}</td>
                                            <td>{{ $banner->btn_txt }}</td>
                                            <td>{{ $banner->btn_link }}</td>
                                            <td>
                                                <img src="{{ asset($banner->image) }}" style="height: 70px; width: 70px;" alt="">
                                            </td>
                                            <td>
                                                @if($banner->status === 1)
                                                <span class="badge badge-success">active</span>
                                                @else
                                                <span class="badge badge-danger">inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('edit/banner/'.$banner->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ url('delete/banner/'.$banner->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                @if($banner->status === 1)
                                                <a href="{{ url('inactive/banner/'.$banner->id) }}" class="btn btn-warning btn-sm">inactive</a>
                                                @else
                                                <a href="{{ url('active/banner/'.$banner->id) }}" class="btn btn-success btn-sm">active</a>
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