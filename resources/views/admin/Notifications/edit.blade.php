@extends('layouts.MasterAdmin')
@section('css')
@endsection
@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('notifications.index')}}">Notifications</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Notification</li>
  </ol>
</nav>
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title font-weight-bold">
        <i class="fas fa-edit"></i>
        Create Notification
      </h2>
    </div>
<div class="card-body">   
<form action="{{route('notifications.update',$notification->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
 @method('put')
        <div class="form-group">
        <label>Notification Title</label>
        
        <input type="text"  class="form-control {{$errors->has('title')?'is-invalid':''}}" placeholder="Enter Position Title" name="title" value="{{$notification->title}}">
        @if($errors->has('title'))
            <div class="invalid-feedback">
            <strong>{{$errors->first('title')}}</strong>
            </div>
        @endif  
       </div>
       <div class="form-group">
        <label>Description</label>
        <textarea name="description"class="form-control {{$errors->has('description')?'is-invalid':''}}" rows="6">
        {{$notification->description}}
        </textarea>
        @error('description')
        <p style=" color: #dc3545;font-weight:bold;font-size: 80%;">The Description field is required</p>
        @enderror
       </div>
     
    <button type="submit" class="btn btn-secondary"  style="width: 100%">Save Position</button>
  </form>
</div>
</div>
@endsection
@push('js')
<script>
   $(document).ready( function () {
  
    $('form input[type=text]').focus(function(){
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });
    
 
  });
  

 </script>
 @endpush

