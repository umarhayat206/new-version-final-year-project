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
            <li class="breadcrumb-item active" aria-current="page">Create Candidate</li>
        </ol>
    </nav>
    <div class="card card-info card-outline">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-edit"></i>
                Create Candidate
            </h2>
        </div>
        <div class="card-body">
            <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Candidate Full Name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                                {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>CNIC</label>
                        <input type="text" data-inputmask="'mask':'99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X"
                            name="cnic" class="form-control" value="{{ old('cnic') }}">
                            @error('cnic')
                            <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                                {{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Candidate Email"
                            value="{{ old('email') }}">
                            @error('email')
                            <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                                {{ $message }} </p>
                        @enderror    
                     
                    </div>
                    <div class="form-group col-md-6">
                        <label>Candidate Contact</label>
                        <input type="text" data-inputmask="'mask': '0399-99999999'" placeholder="xxxx-xxxxxxx" type="number"
                            maxlength="12" class="form-control" name="contact" value="{{ old('contact') }}">
                            @error('contact')
                            <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                                {{ $message }} </p>
                        @enderror   
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Candidate Image</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                                {{ $message }} </p>
                        @enderror   
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Voter address"
                        value="{{ old('address') }}">
                        @error('address')
                        <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                            {{ $message }} </p>
                    @enderror       
                   
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>National Assembley Area</label>
                    <select class="form-control" name="votingNationalArea" style="width: 100%;">
                    <option value="">Select  Area</option>
                    @foreach($nationalAreas as $area)
                    <option value="{{$area->id}}" {{ old('votingNationalArea') == $area->id ? 'selected' : '' }}>{{$area->name}}</option>
                    @endforeach
                  </select>
                  @error('votingNationalArea')
                  <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                      {{ $message }} </p>
              @enderror 
                  </div>
                    {{-- <div class="form-group col-md-6">
                        <label>National Assembley Area</label>
                        <select class="form-control" name="votingNational" style="width: 100%;">
                            <option vlaue="">select National Area</option>
                            @foreach ($nationalAreas as $area)
                                <option value="{{ $area->id }}"
                                    {{ old('votingNationalArea') == $area->id ? 'selected' : '' }}>{{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('votingNationalArea')
                        <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                            {{ $message }} </p>
                    @enderror  
                      
                    </div> --}}
                    <div class="form-group col-md-6">
                        <label>Province Assembley Area</label>
                        <select class="form-control" name="votingProvinceArea" style="width: 100%;">
                            <option value="">select Province Area</option>
                            @foreach ($provinceAreas as $area)
                                <option value="{{ $area->id }}"
                                    {{ old('votingProvinceArea') == $area->id ? 'selected' : '' }}>{{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('votingProvinceArea')
                        <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                            {{ $message }} </p>
                    @enderror 
                    </div>
                </div>
                {{-- <div class="form-group">
  <label>Is Open Candidate ? </label>
  <label style="margin-left:20px"><input type="radio" value="0" name="open"><span style="margin-left:5px;">No</span></label>
  <label style="margin-left:20px"><input type="radio" value="1" name="open"><span style="margin-left:5px;">Yes</span></label>
</div> --}}
                {{-- <div class="form-group symbol" style="display:none">
  <label>Candidate Symbol Name</label>
  <input type="text" name="symbol" class="form-control">
</div> --}}
                <div class="form-group party">
                    <label>Candidate party</label>
                    <select class="form-control" name="party">
                        <option value="">Select Party</option>
                        @foreach ($parties as $party)
                            <option value="{{ $party->id }}">{{ $party->name }}</option>
                        @endforeach
                    </select>
                    @error('party')
                    <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                        {{ $message }} </p>
                @enderror
                </div>
                <div class="form-group">
                    <label>Candidate Position</label>
                    @foreach ($positions as $position)
                        <input type="checkbox" value="{{ $position->id }}" name="position[]" multiple="multiple"
                            class="cbCheck"><label>{{ $position->title }}</label>
                    @endforeach
                    @error('position')
                        <p style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;font-weight: bolder;">
                            {{ $message }} </p>
                    @enderror
                </div>
                <div style="display: none" class="area1">
                    <div class="form-group">
                        <label>National Assembley Area</label>
                        <select class="select2 form-control  naa" name="electionNationalArea[]" multiple="multiple"
                            data-placeholder="Select a State" style="width: 100%;">
                            @foreach ($nationalAreas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group area2" style="display: none">
                    <label>Province Assembley Area</label>
                    <select class="select2 form-control  paa" name="electionProvinceArea[]" multiple="multiple"
                        data-placeholder="Select a State" style="width: 100%;">
                        @foreach ($provinceAreas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $(":input").inputmask();
            $('.select2').select2({
                theme: "classic"
            });
            $('input[type="checkbox"]').change(function() {
                var inputValue = $(this).attr("value");
                if (inputValue == 1) {
                    $(".area1").toggle();
                    $(".naa").attr("required", true);

                }
                if (inputValue == 2) {
                    $(".area2").toggle();
                    $(".paa").attr("required", true);

                }
            });

            $('input[type="radio"]').change(function() {
                var inputValue = $(this).attr("value");
                // alert(inputValue);
                if (inputValue == 1) {
                    $(".symbol").show();
                    $(".party").hide();

                }
                if (inputValue == 0) {
                    $(".symbol").hide();
                    $(".party").show();

                }

            });






        });
    </script>
@endpush
