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
    <li class="breadcrumb-item active" aria-current="page">Positions</li>
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
<div class="card">
    <div class="card-header">
      <h3 class="card-title">All Positons</h3>
      <a href="{{route('positions.create')}}" class="btn btn-dark float-right">Add New Position</a>
      {{-- <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div> --}}
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped" id="candidateTable">
          <thead>
              <tr>
                  <th>
                   Position Name
                  </th>
                  <th>
                    Created At
                  </th>
                  <th>
                      Actions
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($positions as $position)
                <tr>
                  <input type="hidden"class="delete_val_id" value="{{$position->id}}">
                    <td>{{$position->title}}</td>
                    <td>{{$position->created_at}}</td>
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="{{route('positions.edit',$position->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm del"><i class="fas fa-trash">
                        </i>Delete</button>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
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

   $('#candidateTable').DataTable();
   $('.del').click(function(e){
      e.preventDefault();
      var delete_id=$(this).closest("tr").find('.delete_val_id').val();
      // alert(delete_id);
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
                          url:'/position/'+delete_id, 
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