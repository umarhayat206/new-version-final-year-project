@extends('layouts.MasterAdmin')
@section('css')
@endsection
@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('nationalareas.index')}}">Province Areas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Area</li>
  </ol>
</nav>
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title font-weight-bold">
        <i class="fas fa-edit"></i>
        Create Province Area
      </h2>
    </div>
<div class="card-body">   
<form action="{{route('provinceareas.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
   
        <div class="form-group">
        <label>Area Name</label>
        <input type="text"  class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Enter Area Name" name="name" value="{{old('name')}}">
        @if($errors->has('name'))
            <div class="invalid-feedback">
            <strong>{{$errors->first('name')}}</strong>
            </div>
        @endif  
       </div>
       <div class="form-group">
        <label>Important Notes</label>
        <textarea name="notes"class="form-control" rows="6">
         {{old('notes')}}
        </textarea>

       </div>
     
    <button type="submit" class="btn btn-secondary"  style="width: 100%">Save Area</button>
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

