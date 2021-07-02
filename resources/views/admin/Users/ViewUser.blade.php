@extends('layouts.MasterAdmin')
@section('content')
    <div class="col-md-8">
        {{-- @include('layouts._messages') --}}
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
                    <div class="col-sm-9">
                        <form method="POST" action="{{route('users.delete',$user->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection