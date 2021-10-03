@extends('layouts.MasterAdmin')
@section('css')
@endsection
@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('notifications.index')}}">Notifications</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Notification</li>
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
<form action="{{route('notifications.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
   
        <div class="form-group">
        <label>Notification Title</label>
        
        <input type="text"  class="form-control" placeholder="Enter Position Title" name="title" value="{{old('title')}}">
        @error('title')
        <p style=" color: #dc3545;font-weight:bold;font-size: 80%;">The Description field is required</p>
        @enderror
       </div>
       <div class="form-group">
        <label>Notification Image</label>
        <input type="file"  class="form-control" name="image" >
        @error('image')
        <p style=" color: #dc3545;font-weight:bold;font-size: 80%;">The Description field is required</p>
        @enderror
       </div>
       <div class="form-group">
        <label>Description</label>
        <textarea name="description"class="form-control" rows="6">
        {{old('description')}}
        </textarea>
        @error('description')
        <p style=" color: #dc3545;font-weight:bold;font-size: 80%;">The Description field is required</p>
        @enderror
       </div>
     
    <button type="submit" class="btn btn-secondary"  style="width: 100%">Create Notification</button>
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

