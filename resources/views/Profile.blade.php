@extends('layouts.app')

@section('content')
    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        /* .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        } */

        /* .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        } */

        /* .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        } */

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }

    </style>
    <div class="container emp-profile">

        <div class="row">
            <div class="col-md-4">
                <div style="text-align: center;">
                    <img src="{{url('images/userImages',Auth()->user()->image)}}" 
                        alt="" height="200px" width="70%"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{Auth()->user()->name}}
                    </h5>
                    <h6>
                        Web Developer and Designer
                    </h6><br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Change Password</a>
                        </li>
                    </ul>
                </div>
            </div>
          
        </div>
        <div class="row" style="transform: translateY(-70px)">
            <div class="col-md-4">
                <div class="profile-work">
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>Kshiti123</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth()->user()->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth()->user()->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth()->user()->contact}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{Auth()->user()->address}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>National Area</label>
                            </div>
                            <div class="col-md-6">
                                @php
                                    $nationalArea=App\Models\NationalArea::where('id',Auth()->user()->voters->national_area_id)->first();
                                    $provinceArea=App\Models\ProvinceArea::where('id',Auth()->user()->voters->province_area_id)->first();
                                @endphp
                                <p>{{$nationalArea->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Province Area</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$provinceArea->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <form id="change-password-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <input type="password" id="contactus-input" placeholder="Enetr Old Password"
                                            class="form-control" name="oldpassword" />
                                        <span class="text-danger error-text oldpassword_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="contactus-input" placeholder="Enetr New Password"
                                            class="form-control" name="newpassword" />
                                        <span class="text-danger error-text newpassword_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="contactus-input" placeholder="Re Enetr New Password"
                                            class="form-control" name="cnewpassword" />
                                        <span class="text-danger error-text cnewpassword_error"></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div><br><br>
@endsection
@push('js')

    <script>
        $(document).ready(function() {
            $('#change-password-form').on('submit', function(e) {
                e.preventDefault();
                // alert("done");
                var data = this;
                $.ajax({
                    type: "POST",
                    url: "{{ route('update.password') }}",
                    data: new FormData(data),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(response) {
                        if (response.status == 0) {
                            $.each(response.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            })
                        } else {
                            $('#change-password-form')[0].reset();
                            swal(response.msg, {
                                        icon: "success",
                                    })
                            // alert(response.msg);
                        }
                    }

                })


            });

        });
    </script>
@endpush
