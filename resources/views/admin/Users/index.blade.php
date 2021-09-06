@extends('layouts.MasterAdmin')

@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">System Users</li>
  </ol>
</nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
                <div class="card">
                    <div class="card-header">All Users
                        <a href="{{route('users.create')}}" class="btn btn-dark float-right">Add New User</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="userTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Roles</th>

                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                 <input type="hidden"class="delete_val_id" value="{{$user->id}}">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><img alt="Avatar" class="" src="{{url('images/userImages',$user->image)}}" height="100px"></td> 

                                    <td>
                                        @foreach($user->roles as $role)
                                            <div>
                                                {{$role->display_name?$role->display_name:'No Role'}}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="{{route('users.show',$user->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{route('users.edit',$user->id)}}">
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
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('js')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
 $(document).ready( function () {

   $('#userTable').DataTable();
   $('#userTable').on('click', '.del', function(e){
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
                          url:'/user/'+delete_id, 
                          data:{
                                "_token": "{{ csrf_token() }}",
                            },
                          success:function (response) {
                            console.log(response.status);
                          
                            if(response.status==2)
                            {
                                swal('user deleted successfully', {
                                icon: "success",
                                }).then((result)=>{
                                   location.reload();
                                  
                                }); 

                            }
                            if(response.status==1)
                            {
                                swal('You cannot delete Yourself', {
                                icon: "warning",
                                }); 

                            }
                             
                            }

                         });
                 
                }
                
              });
   
   });
 });

</script>
@endpush



