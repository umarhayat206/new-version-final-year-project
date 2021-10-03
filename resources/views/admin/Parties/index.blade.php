@extends('layouts.MasterAdmin')

@section('css')

{{-- <link rel="stylesheet" href="{{asset('DataTables/css/jquery.dataTables.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Parties</li>
  </ol>
</nav>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
                <div class="card">
                    <div class="card-header">All Parties
                        <a href="{{route('parties.create')}}" class="btn btn-dark float-right">Register New Party</a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="partiesTable">
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
                                    <input type="hidden"class="delete_val_id" value="{{$party->id}}">
                                    <td>{{$party->name}}</td>
                                    <td><img  height="80px" src="{{url('images/partiesImages',$party->image)}}"></td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{route('parties.edit',$party->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm del" href="" >
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
    {{-- <script src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script> --}}
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
 $(document).ready( function () {
    
   $('#partiesTable').DataTable({
        'columnDefs': [ {
        'targets': [1,2], /* column index */
        'orderable': false, /* true or false */
     }]
   
       
   });
   $('#partiesTable').on('click', '.del', function(e){
      e.preventDefault();
      var delete_id=$(this).closest("tr").find('.delete_val_id').val();
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
          }).then((willDelete) => {
                  if (willDelete) {
                         $.ajax({
                          type:"DELETE",
                          url:'/party/'+delete_id, 
                          data:{
                                "_token": "{{ csrf_token() }}",
                            },
                          success:function (response) {
                               swal(response.status, {
                                icon: "success",
                                }).then((result)=>{
                                  location.reload();
                                }); 
                            }

                         });
                 
                }
                
              });
   });

 });

</script>
@endpush



