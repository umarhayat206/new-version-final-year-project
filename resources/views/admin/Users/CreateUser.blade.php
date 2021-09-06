@extends('layouts.MasterAdmin')
<style>
    .checkboxes input{
        margin: 0 5px 0 30px;
    }
</style>
@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">All Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create User</li>
  </ol>
</nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                     <div class="card-header">
                     <h2 class="card-title font-weight-bold">
                     <i class="fas fa-edit"></i>
                      Create User
                     </h2>
                    </div>
                    <div class="card-body">
                        <form method="POST"  action="{{route('users.store')}}" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{old('name')}}" name="name" placeholder="Enter Name">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="Email" class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{old('email')}}" name="email" placeholder="Enter Email" >
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </div>
                                @endif
                            </div>
                            
                             <div class="form-group">
                               <label>User Image</label>
                               <input  type="file" class="form-control {{$errors->has('image')?'is-invalid':''}}" name="image">
                                 @if($errors->has('image'))
                                <div class="invalid-feedback">
                               <strong>{{$errors->first('image')}}</strong>
                               </div>
                                @endif
                            </div><br>
                          
                            <div class="form-group checkboxes">
                                <label>Select Role :</label>
                                @foreach($roles as $role)
                                    <input type="radio" value="{{$role->id}}"{{ old('role') == $role->id ? 'checked' : '' }} name="role"> {{$role->display_name }}</input>
                                @endforeach
                                @error('role')
                                <strong><p style="color:#dc3545;font-size: 80%;">{{ $message }}</p></strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" name="password" placeholder="Enter Password">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Confirm Password :</label>
                                <input type="password" class="form-control {{$errors->has('password_confirmation')?'is-invalid':''}}" name="password_confirmation" placeholder="Confirm Password">
                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('password_confirmation')}}</strong>
                                    </div>
                                @endif
                            </div><br>
                            <center><button type="submit" class="btn btn-secondary btn-block">Save</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



