@extends('layouts.MasterAdmin')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<style>
    .select2-dropdown--above {
        border: 1px solid blue !important;
        ;
        border-bottom: none !important;

    }


    .select2-dropdown--below {
        border: 1px solid blue !important;
        ;
        border-top: none !important;

    }

    span.select2-selection--multiple[aria-expanded=true] {
        border-color: blue !important;
    }

</style>
@section('content')
    <nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('candidates.index') }}">Candidates</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Candidate</li>
        </ol>
    </nav>
    <div class="card card-info card-outline">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-edit"></i>
                Edit Candidate
            </h2>
            <a href="{{ route('candidates.index') }}" class="btn btn-dark float-right">Back to Candidates</a>
        </div>
        <div class="card-body">
            <form action="{{ route('candidates.update',$candidate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Candidate Full Name" name="name"
                            value="{{ $candidate->user->name }}">

                    </div>
                    <div class="form-group col-md-6">
                        <label>CNIC</label>
                        <input type="text" data-inputmask="'mask':'99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X"
                            name="cnic" class="form-control" value="{{ $candidate->user->cnic }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Candidate Email"
                            value="{{ $candidate->user->email }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Candidate Contact</label>
                        <input type="text" data-inputmask="'mask': '0399-99999999'" placeholder="xxxx-xxxxxxx" type="number"
                            maxlength="12" class="form-control" name="contact" value="{{ $candidate->user->contact }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Candidate Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    @if ($candidate->user->image)
                        <div class="form-group col-md-6">
                            <label>Candidate old Image</label>
                            <img alt="Avatar" class="" src="
                                {{ url('images/userImages', $candidate->user->image) }}" height="100px">
                            <input type="hidden" name="old_image" value={{ $candidate->user->image }}>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Voter address"
                        value="{{ $candidate->user->address }}">
                </div>
                {{-- <div class="form-row">
  <div class="form-group col-md-6">
    <label >National Assembley Area</label>
    @php
    $userId=$candidate->user->id;
    $voter=App\Models\Voter::where('user_id',$userId)->first();
        
    @endphp
    <select class="form-control" name="votingNationalArea" style="width: 100%;">
      <option vlaue="">select National Area</option>
      @foreach ($nationalAreas as $area)
      <option value="{{$area->id}}" {{ $voter->national_area_id == $area->id ? 'selected' : '' }}>{{$area->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-md-6">
    <label >Province Assembley Area</label>
    <select class="form-control" name="votingProvinceArea"  style="width: 100%;">
      <option value="">select Province Area</option>
      @foreach ($provinceAreas as $area)
      <option value="{{$area->id}}" {{ $voter->province_area_id == $area->id ? 'selected' : '' }}>{{$area->name}}</option>
      @endforeach
    </select>
  </div>      
</div> --}}
                {{-- <div class="form-group">
  <label>Is Open Candidate ? </label>
  <input type="radio" value="0" name="open" {{$candidate->is_open==0?'checked':''}}><label>NO</label>
  <input type="radio" value="1" name="open" {{$candidate->is_open==1?'checked':''}}><label>YES</label>
</div> --}}
                {{-- <div class="form-group symbol" style="display:none">
  <label>Candidate Symbol Name</label>
  <input type="text" name="symbol" class="form-control">
</div> --}}
                <div class="form-group">
                    <label>Candidate party</label>
                    <select class="form-control" name="party">
                        <option value="0">Select Party</option>
                        @foreach ($parties as $party)
                            <option value="{{ $party->id }}"
                                {{ $candidate->party_id == $party->id ? 'selected' : '' }}>
                                {{ $party->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Candidate Position</label>
                    @foreach ($allPositions as $position)
                        {{-- @foreach ($candidate->positions as $val) --}}
                            <input type="checkbox" value="{{ $position->id }}"
                                {{ $candidate->positions->contains('id',$position->id)== $position->id ? 'checked' : '' }} name="position[]" multiple="multiple"
                                class="cbCheck"><label>{{ $position->title }}</label>
                        {{-- @endforeach --}}
                    @endforeach
                </div>
               
                <div class="form-group">
                    <label>National Assembley Area</label>
                    <select class="select2 form-control area2" name="electionNationalArea[]" multiple="multiple"
                        data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($nationalAreas as $area)
                                {{-- @foreach ($candidate->nationals as $national) --}}
                                    <option value="{{ $area->id }}"
                                        {{ $candidate->nationals->contains('id',$area->id)? 'selected' : '' }}>
                                        {{ $area->name }}</option>
                                {{-- @endforeach --}}
                        @endforeach
                    </select>
                </div>     
                <div class="form-group">
                    <label>Province Assembley Area</label>
                    <select class="select2 form-control area2" name="electionProvinceArea[]" multiple="multiple"
                        data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($provinceAreas as $area)
                            {{-- @foreach ($candidate->provinces as $province) --}}
                                <option value="{{ $area->id }}" {{$candidate->provinces->contains('id',$area->id)? 'selected' : '' }}>
                                    {{ $area->name }}</option>
                            {{-- @endforeach --}}
                        @endforeach
                    </select>
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
    <script>
        $(document).ready(function() {

            $(":input").inputmask();
            $('.select2').select2({
                theme: "classic"
            });
            // $('input[type="checkbox"]').change(function() {
            //     var inputValue = $(this).attr("value");
            //     if (inputValue == 1) {
            //         $(".area1").toggle();

            //     }
            //     if (inputValue == 2) {
            //         $(".area2").toggle();

            //     }
            // });



        });
    </script>
@endpush
