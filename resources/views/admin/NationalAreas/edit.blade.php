@extends('layouts.MasterAdmin')
@section('css')
@endsection
@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title font-weight-bold">
        <i class="fas fa-edit"></i>
        Edit National Area
      </h2>
      <a href="{{route('nationalareas.index')}}" class="btn btn-dark float-right">Back To Areas</a>
    </div>
<div class="card-body">   
<form action="{{route('nationalareas.update',$area->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
   @method('PUT')
        <div class="form-group">
        <label>Area Name</label>
        <input type="text"  class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Enter Area Name" name="name" value="{{$area->name}}">
        @if($errors->has('name'))
            <div class="invalid-feedback">
            <strong>{{$errors->first('name')}}</strong>
            </div>
        @endif  
       </div>
       <div class="form-group">
        <label>Important Notes</label>
        <textarea name="notes"class="form-control" rows="6">
         {{$area->notes}}
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

