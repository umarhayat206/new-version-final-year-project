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
                        <a href="{{route('users.create')}}" class="btn btn-dark float-right">Add New User</a>
                       
                        {{-- <div class="float-right form-group">
                            <form class="form-inline" action="{{route('users.search')}}">
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Search By Name, Email"
                                       name="search">
                                <button type="submit" class="btn btn-dark mb-2">Search User</button>
                            </form>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <table class="table" id="userTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>

                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <div>
                                                {{$role->display_name?$role->display_name:'No Role'}}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="project-actions text-right">
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
                           {{-- <form method="POST" action="{{route('users.delete',$user->id)}}" id="deleteUser">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-secondary">Delete</button>
                                        </form> --}}
                          <a class="btn btn-danger btn-sm" href="{{route('users.delete',$user->id)}}" onclick="return confirm('Are you sure you want to delete this item?');">
                              <i class="fas fa-trash">
                              </i>Delete
                            
                          </a>
                      </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- {{$users->links('pagination::bootstrap-4')}} --}}
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
        'targets': [3], /* column index */
        'orderable': false, /* true or false */
     }]
   
       
   });

 });

</script>
@endpush



