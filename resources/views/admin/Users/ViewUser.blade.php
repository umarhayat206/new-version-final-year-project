@extends('layouts.MasterAdmin')
@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="{{$user->image?url('images/userImages',$user->image):'https://bootdey.com/img/Content/avatar/avatar7.png'}}" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{$user->name}}</h4>
                {{-- <p class="text-secondary mb-1">Full Stack Developer</p>
                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> --}}
                {{-- <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button> --}}
              </div>
            </div>
          </div>
        </div>
       
      </div>
      <div class="col-md-8">
        
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$user->email}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Roles</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @foreach($user->roles as $role)
                            <div>
                                {{$role->display_name?$role->display_name:'No Role'}}
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Created At</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     {{$user->created_at->diffForHumans()}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Updated At</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$user->updated_at->diffForHumans()}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <a class="btn btn-info "  href="{{route('users.edit',$user->id)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
 
   
        @endsection