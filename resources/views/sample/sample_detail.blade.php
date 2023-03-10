@endphp
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
                    <h5 class="card-title">Sample - {{$sample[0]->name}}</h5>
                    <a href="{{ route('sample.create') }}" class="btn btn-primary ms-auto">Add Sample</a>
                </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <select name="type" id="" >
                                <option value="">Select Type</option>
                                <option value="1">Approved</option>
                                <option value="2">Un Approved</option>
                            </select>
                            <select name="limit" id="">
                            <form action="{{ route('sample-list.index') }}" method="GET">
                            <input type="text" name="search" value="">
                            </form>
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Label Name</th>
                                        <th>Quantity</th>
                                        <th>Created By</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($sample[0]->sample as $item)
                                <tr>
                                    <input type="hidden" value="{{$item->id}}" name="sampleListId">
                                       <td>{{$item->id}}</td>
                                        
                                       </td>
                                       <td>{{$item->name}}</td>
                                       <td>{{$item->quantity}}</td>
                                     
                                       <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>

                                       <td>
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
                                                        window.location.href = "{{ url('sample-list-delete/'.$item->id)}}";
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

       


        <script type="text/javascript">
            var session_layout = '{{ session()->get('layout') }}';
        </script>
    @endsection

    @section('script')
   
    @endsection
