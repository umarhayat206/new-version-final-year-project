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
{{-- <div class="row">
<div class="col-8 offset-2"> --}}
<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">
        <i class="fas fa-edit"></i>
        Create Candidate
      </h2>
    </div>
    <div class="card-body">

        <form action="{{route('candidates.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control form-control-lg" placeholder="Enter Candidate Name" name="name">
            </div>
            <div class="form-group">
            <label>Candidate CNIC</label>
            <input type="text"  data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  name="cnic" class="form-control">
            </div>
            <div class="form-group">
            <label>Candidate Email</label>
            <input  type="email" class="form-control" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
            <label>Candidate image</label>
            <input  type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
              <label>Candidate Password</label>
              <input  type="text" class="form-control" name="password">
              </div>
            <div class="form-group">
            <label>Candidate Contact</label>
            <input type="text"  data-inputmask="'mask': '0399-99999999'" required=""  type = "number" maxlength = "12"  class="form-control" name="contact"
        >            </div>
        {{-- <div class="form-group">
          <label>Multiple</label>
          <select  multiple="multiple" data-placeholder="Select a State"
                  style="width: 100%;"  class="form-control select2">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div> --}}
        <div class="form-group">
          <label>Candidate Area</label>
        <select class="select2 form-control" name="areas[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
          @foreach($areas as $area)
          <option value="{{$area->id}}">{{$area->name}}</option>
          @endforeach
        </select>
        </div>
            <div class="form-group">
              <label>Candidate party</label>
              <select class="form-control" name="party">
                <option value="0">Select Party</option>
                @foreach($parties as $party)
                <option value="{{$party->id}}">{{$party->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label>Candidate Adress</label>
            <input  type="address" class="form-control" name="address" placeholder="Enter Adreess">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Candidate Moto</label>
            <textarea name="moto" class="form-control" rows="6">
            </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          
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
 
  });
  

 </script>
 @endpush