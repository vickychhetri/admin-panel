@extends('user-master')

@section('title', 'Manage Employees')

@section('css')
   
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Manage Employees</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Manage Employees</li>
@endsection

@section('content')
    <div class="container-fluid">

        

        <!-- All Client Table Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                    <h5 class="card-title">All Employees</h5>
                    <a href="{{ url('add-employee')}}" class="btn btn-primary ms-auto">Add Employee</a>
                </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>User Role</th>
                                        <th>Created By</th>
                                        {{-- <th>Status </th> --}}
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                    <tr>
                                        <td>{{$Sr++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email }}</td>
                                        <td>{{$item->role_as}}</td>
                                        <td>{{$item->users->name ?? ''}}</td>
                                        {{-- <td>
                                            <span class="text-success {{$item->status != 1 ? 'd-none':''}}">
                                                <i data-feather="check-circle"></i>
                                            </span>
                                            <span class="text-danger {{$item->status != 0 ? 'd-none':''}}">
                                                <i data-feather="x-circle"></i>
                                            </span>
                                        </td> --}}
                                        <td>
                                            <a href="{{ url('edit-employee/'.$item->id)}}" class="text-warning p-1" data-toggle="tooltip" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                            
                                            <a id="Delete-{{$item->id}}" class="text-danger pointer p-1" data-toggle="tooltip" title="Delete">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <script>
                                                $('#Delete-{{$item->id}}').click(function(){
                                                    console.log("hello");
                                                    Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "You won't be able to revert this!",
                                                    icon: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete it!'
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = "{{ url('delete-employee/'.$item->id)}}";
                                                    }
                                                    });
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All Client Table End -->

       



        <script type="text/javascript">
            var session_layout = '{{ session()->get('layout') }}';
        </script>
    @endsection

    @section('script')
   
    @endsection
