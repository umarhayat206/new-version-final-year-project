@extends('layouts.MasterAdmin')
@section('css')
@endsection
@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('positions.index')}}">Positions</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Position</li>
  </ol>
</nav>
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">
        <i class="fas fa-edit"></i>
        Create Position
      </h2>
    </div>
<div class="card-body">   
<form action="{{route('positions.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
   
        <div class="form-group">
        <label>Position Title</label>
        <input type="text"  class="form-control {{$errors->has('title')?'is-invalid':''}}" placeholder="Enter Position Title" name="title" value="{{old('title')}}">
        @if($errors->has('title'))
            <div class="invalid-feedback">
            <strong>{{$errors->first('title')}}</strong>
            </div>
        @endif  
       </div>
       <div class="form-group">
        <label>Important Notes</label>
        <textarea name="notes"class="form-control" rows="6">

        </textarea>

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

