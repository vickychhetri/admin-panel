@extends('user-master')

@section('title', 'Manage Samples')

@section('css')
   
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Manage Samples</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Manage Samples</li>
@endsection

@section('content')
    <div class="container-fluid">

        

        <!-- All Client Table Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                    <h5 class="card-title">All Samples</h5>
                    <a href="{{ route('sample.create') }}" class="btn btn-primary ms-auto">Add Samples</a>
                </div>
                <!-- <form action="{{ route('sample.index') }}" method="POST">
                    <select name="limit" onchange="this.form.submit()">
                        <option value="">Show</option>
                        <option value="1">50</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="200">200</option>
                    </select>
                            </form>
                <form action="{{ route('sample.index') }}" method="GET">
                            <input type="text" name="search" value="{{$search}}">
                            </form> -->
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($sample as $item)
                                <tr>
                                       <td>{{$item->id}}</td>
                                       @if ($item->type == 1)
                                            <td>Design</td>
                                        @else
                                            <td>Market</td>
                                        @endif
                                       <td>{{$item->name}}</td>
                                       <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>

                                       <td>
                                       <a href="{{ url('sample-list/'.$item->id)}}" class="text-warning p-1" data-toggle="tooltip" title="Show">
                                                <i data-feather="list"></i>
                                            </a>

                                            <a href="{{ url('sample/'.$item->id . '/edit')}}" class="text-warning p-1" data-toggle="tooltip" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                            
                                            <a id="Delete-{{$item->id}}" class="text-danger pointer p-1" data-toggle="tooltip" title="Delete">
                                                <i data-feather="trash-2"></i>
                                                @method('DELETE')
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
                                                        window.location.href = "{{ url('delete-sample/'.$item->id)}}";
                                                    }
                                                    });
                                                });
                                            </script>
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
        <!-- All Client Table End -->


    @endsection

    @section('script')
    <script>
    //         
       </script>
    @endsection
