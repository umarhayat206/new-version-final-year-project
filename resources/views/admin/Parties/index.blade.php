@extends('layouts.MasterAdmin')

@section('css')

<link rel="stylesheet" href="{{asset('DataTables/css/jquery.dataTables.min.css')}}">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
                <div class="card">
                    <div class="card-header">All Users
                        <a href="{{route('parties.create')}}" class="btn btn-dark float-right">Register New Party</a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="userTable">
                            <thead>
                            <tr>
                                <th>Party Name</th>
                                <th>Party Symbol</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parties as $party)
                                <tr>
                                    <td>{{$party->name}}</td>
                                    <td><img  height="80px" src="{{url('images/partiesImages',$party->image)}}"></td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm" href="" >
                                            <i class="fas fa-trash">
                                            </i>Delete
                                          
                                        </a>
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
    
@endsection

@push('js')
    <script src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script>
 $(document).ready( function () {
    
   $('#userTable').DataTable({
        'columnDefs': [ {
        'targets': [1,2], /* column index */
        'orderable': false, /* true or false */
     }]
   
       
   });

 });

</script>
@endpush



