@extends('layouts.admin_master')
@section('title')
    customer page
@endsection
@section('customer')
    active
@endsection
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-3"  style="color: #808080;">customer details</h3>
        <a href="{{ route('customer') }}" class="btn btn-primary">back</a>
    </div>
</div>
<div class="row m-t-30">
                        <div class="col-md-8">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <tbody>
                                        <tr>
                                            <td><b> name</b></td>
                                            <td>{{ $customer->name }}</td>
                                        </tr>
                                        <tr>                                           
                                            <td><b> email</b></td>
                                            <td>{{ $customer->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> mobile</b></td>
                                            <td>{{ $customer->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> password</b></td>
                                            <td>{{ $customer->password }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> address</b></td>
                                            <td>{{ $customer->address }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> city</b></td>
                                            <td>{{ $customer->city }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> state</b></td>
                                            <td>{{ $customer->state }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> zip</b></td>
                                            <td>{{ $customer->zip }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> company</b></td>
                                            <td>{{ $customer->company }}</td>
                                        </tr>
                                        <tr>
                                            <td><b> status</b></td>
                                            <td>{{ $customer->status }}</td>
                                        </tr> 
                                        <tr>
                                            <td><b> created at</b></td>
                                            <td>{{ $customer->created_at }}</td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
                        </div>
</div>
@endsection
