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
    <li class="breadcrumb-item active" aria-current="page">Candidates</li>
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
      <h3 class="card-title">Candidates</h3>
      <a href="{{route('candidates.create')}}" class="btn btn-dark float-right">Register Candidate</a>
    </div>
    <div class="card-body">
      <table class="table table-borderd projects" id="candidateTable">
          <thead>
              <tr>
                  <th style="width:15%">
                    Name
                  </th>
                  <th>
                    CNIC
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Candidate Party
                  </th>
                  {{-- <th>
                    Cnadidate Position
                  </th> --}}
                  <th>Candidate Areas</th>
                  {{-- <th>
                    Created At
                  </th> --}}
                  <th style="width:25%">
                      Actions
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($candidates as $candidate)
              <tr>
                <input type="hidden"class="delete_val_id" value="{{$candidate->id}}">
                  <td>{{$candidate->user->name}}</td>
                  <td>
                    {{$candidate->user->cnic}}
                  </td>
                  <td>
                   
                  <img alt="Avatar" class="" src="{{url('images/userImages',$candidate->user->image)}}" height="100px">
                        
                  </td>
                  <td>
                    {{$candidate->party->name}}
                  </td>
                  {{-- <td>
                    <ul>
                      @foreach($candidate->positions as $position)
                     <li>{{$position->title}}</li>
                    @endforeach
                    </ul>
                  </td> --}}
                  <td>
                    <ul>
                      @if($candidate->nationals)
                      @foreach($candidate->nationals as $national)
                      <li>{{$national->name}}</li>
                     @endforeach
                     @endif
                      @foreach($candidate->provinces as $province)
                     <li>{{$province->name}}</li>
                    @endforeach
                    </ul>
                  </td>
                  {{-- <td class="project-state">
                    {{$candidate->created_at->format('M d, H:i')}}
                  </td> --}}
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{route('candidates.show',$candidate->id)}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('candidates.edit',$candidate->id)}}">
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

   $('#candidateTable').DataTable();

  // function for confirmation and deletion
  $('#candidateTable').on('click', '.del', function(e){
  
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
                          url:'/candidate/'+delete_id, 
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