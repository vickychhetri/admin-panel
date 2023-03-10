@extends('user-master')

@section('title', 'Manage Samples')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Manage Orders</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Manage Orders</li>
@endsection

@section('content')
<div class="container-fluid">



    <!-- All Client Table Start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h5 class="card-title">All Orders</h5>
                    <a href="{{ route('order.create') }}" class="btn btn-primary ms-auto">Add Order</a>
                </div>
                <!-- <form action="" method="POST">
                    <select name="limit" onchange="this.form.submit()">
                        <option value="">Show</option>
                        <option value="1">50</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="200">200</option>
                    </select>
                </form>
                <form action="" method="GET">
                    <input type="text" name="search" value="">
                </form> -->
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="basic-2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Type</th>
                                    <th>Sample Name</th>
                                    <th>Sample</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            </tr>
                            <tbody>
                                @forelse ($order as $item)
                                <tr>
                                       <td>{{$item->id}}</td>
                                       <td>{{$item->customer->name}}</td>
                                       @if ($item->type == 1)
                                            <td>Design</td>
                                        @else
                                            <td>Market</td>
                                        @endif
                                       <td>{{$item->sampleName->name}}</td>
                                       <td>{{$item->sample_name}}</td>
                                       <td>
                                        <a href="{{url('sample-approve/'. $item->id )}}">Approve</a>
                                        <a href="{{url('sample-unapprove/'. $item->id )}}">Unapprove</a>
                                       </td>
                                       <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        </td>
                                   @empty
                                       
                                   @endforelse
                                   </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>




    
    @endsection

    @section('script')

    @endsection
   