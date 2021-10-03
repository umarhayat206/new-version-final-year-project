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
    <li class="breadcrumb-item active" aria-current="page">Voters</li>
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
      <h3 class="card-title">Voters</h3>
      <a href="{{route('voters.create')}}" class="btn btn-dark float-right">Add New Voter</a>
    </div>
    <div class="card-body">
      <table class="table" id="voterTable">
          <thead>
              <tr>
                  <th style="width: 20%">
                    Name
                  </th>
                  <th>
                    CNIC
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                  Nationl Assembley
                  </th>
                  <th>
                    Province Assembley
                  </th>
                  <th>
                    Created At
                  </th>
                  <th style="width:25%">
                      Actions
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($voters as $voter)
              <tr>
                <input type="hidden"class="delete_val_id" value="{{$voter->id}}">
                  <td>{{$voter->user->name}}</td>
                  <td>
                    {{$voter->user->cnic}}
                  </td>
                  <td>
                  <img alt="Avatar" class="" src="{{url('images/userImages',$voter->user->image)}}" height="100px">  
                  </td>
                  <td>
                 {{$voter->nationalArea->name}}
                  </td>
                  <td>
                    {{$voter->provinceArea->name}}
                  </td>
                  <td class="project-state">
                    {{$voter->created_at->format('M d, H:i')}}
                  </td>
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{route('voters.show',$voter->id)}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('voters.edit',$voter->id)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      @if(Auth()->user()->hasRole('super-admin'))
                      <button class="btn btn-danger btn-sm del"><i class="fas fa-trash">
                      </i>Delete</button>
                      @endif
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

   $('#voterTable').DataTable();

  // function for confirmation and deletion
  $('#voterTable').on('click', '.del', function(e){
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
                          url:'/voter/'+delete_id, 
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