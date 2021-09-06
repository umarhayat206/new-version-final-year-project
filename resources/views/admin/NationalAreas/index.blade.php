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
    <li class="breadcrumb-item active" aria-current="page">National Areas</li>
  </ol>
</nav>
<div class="card">
    <div class="card-header">
      <h3 class="card-title font-weight-bold">National Areas</h3>
      <a href="{{route('nationalareas.create')}}" class="btn btn-dark float-right">Add New Area</a>

    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped" id="nationalTable">
          <thead>
              <tr>
                  <th>
                   Area Name
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
              @foreach ($nationalareas as $nationalarea)
                <tr>
                  <input type="hidden"class="delete_val_id" value="{{$nationalarea->id}}">
                    <td>{{$nationalarea->name}}</td>
                    <td>{{$nationalarea->created_at}}</td>
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="{{route('nationalareas.edit',$nationalarea->id)}}">
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

//    $('#candidateTable').DataTable();
   $('#nationalTable').DataTable({
    "ordering": false,    
   });
   $('#nationalTable').on('click', '.del', function(e){
    e.preventDefault();
      var delete_id=$(this).closest("tr").find('.delete_val_id').val();
    //  alert(delete_id);
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
                          url:'/nationalarea/'+delete_id, 
                          data:{
                                "_token": "{{ csrf_token() }}",
                            },
                          success:function (response) {
                               swal(response.status, {
                                icon: "success",
                                }).then((result)=>{
                                   location.reload();
                                  // location.reload(history.back());
                                }); 
                            }

                         });
                 
                }
                
              });
   
   });
  //  $('.del').click(function(e){
  //     e.preventDefault();
  //     var delete_id=$(this).closest("tr").find('.delete_val_id').val();
  //    alert(delete_id);
  //     swal({
  //       title: "Are you sure?",
  //       text: "Once deleted, you will not be able to recover this imaginary file!",
  //       icon: "warning",
  //       buttons: true,
  //       dangerMode: true,
  //         }).then((willDelete) => {
  //                 if (willDelete) {
  //                        $.ajax({
  //                         type:"DELETE",
  //                         url:'/nationalarea/'+delete_id, 
  //                         data:{
  //                               "_token": "{{ csrf_token() }}",
  //                           },
  //                         success:function (response) {
  //                              swal(response.status, {
  //                               icon: "success",
  //                               }).then((result)=>{
  //                                 location.reload();
  //                               }); 
  //                           }

  //                        });
                 
  //               }
                
  //             });
  //  });
 });

</script>
@endpush