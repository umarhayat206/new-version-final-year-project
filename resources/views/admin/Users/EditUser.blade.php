@extends('layouts.MasterAdmin')
<style>
    .checkboxes input{
        margin: 0 5px 0 30px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('users.update',$user->id)}}" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name" placeholder="Enter Name" value="{{$user->name}}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="Email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" placeholder="Enter Email" value="{{$user->email}}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group checkboxes">
                                <label>Select Role :</label>
                                {{--                                <select class="form-control" name="role[]" multiple>--}}
                                {{--                                    <option value="">Chose Role</option>--}}
                                {{--                                    @foreach($roles as $role)--}}
                                {{--                                        <option value="{{$role->id}}" {{in_array($role->id,$rolesIds)?'selected':''}}>{{$role->display_name}}</option>--}}
                                {{--                                    @endforeach--}}
                                {{--                                </select>--}}
                                @foreach($roles as $role)
                                    <input type="checkbox" value="{{$role->id}}" name="role[]"{{in_array($role->id,$rolesIds)?'checked':''}}> {{$role->display_name }}</input>
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
                            </div>
                            <center><button type="submit" class="btn btn-secondary btn-block">Save</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



