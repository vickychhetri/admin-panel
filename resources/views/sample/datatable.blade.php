<table class="display" id="basic-test2">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Name</th>
            <th>Quantity</th>
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
                            window.location.href = "{{ url('delete-1sample/'.$item->id)}}";
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
<div class="mb-3">
    {{ $sample->onEachSide(1)->links() }}
</div>