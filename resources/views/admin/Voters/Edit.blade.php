@extends('layouts.MasterAdmin')
@section('css')
@endsection
@section('content')
<nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('voters.index')}}">Voters</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Voter</li>
  </ol>
</nav>
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">
        <i class="fas fa-edit"></i>
        Edit Voter
      </h2>
      <a href="{{route('voters.index')}}" class="btn btn-dark float-right">Back to voters</a>
    </div>
<div class="card-body">   
<form action="{{route('voters.update',$voter->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text"  class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Voter Name" name="name" value="{{$voter->user->name}}">
        @if($errors->has('name'))
            <div class="invalid-feedback">
            <strong>{{$errors->first('name')}}</strong>
            </div>
        @endif  
       </div>
       <div class="form-group col-md-6">
       <label>CNIC</label>
       <input type="text"  data-inputmask="'mask':'99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  name="cnic" class="form-control {{$errors->has('cnic')?'is-invalid':''}}" value="{{$voter->user->cnic}}">
       @if($errors->has('cnic'))
            <div class="invalid-feedback">
            <strong>{{$errors->first('cnic')}}</strong>
            </div>
        @endif
       </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Email</label>
        <input  type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" placeholder="Voter Email" value="{{$voter->user->email}}">
        @if($errors->has('email'))
        <div class="invalid-feedback">
        <strong>{{$errors->first('email')}}</strong>
        </div>
        @endif
        </div>
        <div class="form-group col-md-6">
          <label>Voter Contact</label>
          <input type="text"  data-inputmask="'mask': '0399-99999999'"  placeholder="xxxx-xxxxxxx" type = "number" maxlength = "12"  class="form-control {{$errors->has('contact')?'is-invalid':''}}" name="contact" value="{{$voter->user->contact}}">            
          @if($errors->has('contact'))
          <div class="invalid-feedback">
          <strong>{{$errors->first('contact')}}</strong>
          </div>
          @endif
        </div>
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Voter Image</label>
        <input  type="file" class="form-control {{$errors->has('image')?'is-invalid':''}}" name="image">
        @if($errors->has('image'))
        <div class="invalid-feedback">
        <strong>{{$errors->first('image')}}</strong>
        </div>
        @endif
    </div>
    @if($voter->user->image)
    <div class="form-group col-md-6">
      <label>Voter old Image</label>
      <img alt="Avatar" class="" src="{{url('images/userImages',$voter->user->image)}}" height="100px"> 
      <input type="hidden" name="old_image" value={{$voter->user->image}}>
    </div>
    @endif
  </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>National Assembley Area</label>
        <select class="form-control {{$errors->has('nationalArea')?'is-invalid':''}}" id="
          area" name="nationalArea" style="width: 100%;">
        <option value="">Select  Area</option>
        @foreach($nationalAreas as $area)
        <option value="{{$area->id}}" {{ $voter->national_area_id == $area->id ? 'selected' : '' }}>{{$area->name}}</option>
        @endforeach
      </select>
      @if($errors->has('nationalArea'))
      <div class="invalid-feedback">
      <strong>{{$errors->first('nationalArea')}}</strong>
      </div>
      @endif
      </div>
      <div class="form-group col-md-6">
        <label>Province Assembley Area</label>
        <select class="form-control {{$errors->has('provinceArea')?'is-invalid':''}}" id="
          area" name="provinceArea" style="width: 100%;">
        <option value="">Select  Area</option>
        @foreach($provinceAreas as $area)
        <option value="{{$area->id}}" {{ $voter->province_area_id == $area->id ? 'selected' : '' }}>{{$area->name}}</option>
        @endforeach
      </select>
      @if($errors->has('provinceArea'))
      <div class="invalid-feedback">
      <strong>{{$errors->first('area')}}</strong>
      </div>
      @endif
      </div> 
    </div>
    <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control {{$errors->has('address')?'is-invalid':''}}" name="address" placeholder="Enter Voter address" value="{{$voter->user->address}}">
      @if($errors->has('address'))
        <div class="invalid-feedback">
        <strong>{{$errors->first('address')}}</strong>
        </div>
        @endif
    </div>
   
    <button type="submit" class="btn btn-secondary"  style="width: 100%">Save Voter</button>
  </form>
</div>
</div>
@endsection
@push('js')
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
   $(document).ready( function () {
    
    $(":input").inputmask();

    $('form input[type=text]').focus(function(){
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });
    
    $('form input[type=email]').focus(function(){
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });

    $('form input[type=file]').click(function(){
     $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });
    $('#area').change(function(){
     $('#area').siblings(".invalid-feedback").hide();
    $('#area').removeClass('is-invalid');
    });
 
  });
  

 </script>
 @endpush






















{{-- 
@extends('layouts.MasterAdmin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<style>
  
  .select2-dropdown--above {
    border: 1px solid blue !important;;
    border-bottom: none !important;	 
	
}


.select2-dropdown--below{
    border: 1px solid blue !important;;
    border-top: none !important;	 
	
}

span.select2-selection--multiple[aria-expanded=true] {
    border-color: blue !important;   
}


</style>
@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">
        <i class="fas fa-edit"></i>
        Create Voter
      </h2>
    </div>
<div class="card-body">   
<form action="{{route('voters.update',$voter->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
   
    <button type="submit" class="btn btn-secondary"  style="width: 100%">Save Voter</button>
  </form>
</div>
</div>
@endsection
@push('js')
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
   $(document).ready( function () {
    
    $(":input").inputmask();

    $('.select2').select2({
    theme: "classic"
    });
    
    $('form input[type=text]').focus(function(){
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });
    
    $('form input[type=email]').focus(function(){
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });

    $('form input[type=file]').click(function(){
     $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });
 
  });
  

 </script>
 @endpush --}}
