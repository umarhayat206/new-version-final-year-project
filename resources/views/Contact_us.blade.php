@extends('layouts.app')

@section('content')
    <div class="jumbotron" id="contcatus-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contactus-div1">
                        <h2 class="h1-responsive font-weight-bold text-center my-4" style="padding-top:20px">Contact us</h2>
                        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate
                            to contact us directly. Our team will come back to you within
                            a matter of hours to help you.</p>
                    </div>
                </div>
            </div><br><br>

            <!--Section description-->

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div id="contactus-detail-div">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text">
                                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="contactus-detail-div">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text">
                                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="contactus-detail-div">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text">
                                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="contactus-detail-div">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-globe"></span>
                            </div>
                            <div class="text">
                                <p><span>Website</span> <a href="#">yoursite.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <iframe
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=islamabad%20Pakistan+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        width="100%" height="550px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class=" col-lg-6 col-md-6" data-aos="fade-left">
                    <div id="contactus-input-div">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('contactus.submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="contactus-input" placeholder="Enetr Email Address"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div><br />
                            <div class="form-group">
                                <input type="text" name="subject" id="contactus-input" placeholder="Enetr subject"
                                    class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                    value="{{ old('subject') }}" />
                                @if ($errors->has('subject'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" name="name" id="contactus-input" placeholder="Enter your name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ old('name') }}" />
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <textarea class="form-control text {{ $errors->has('message') ? 'is-invalid' : '' }}"
                                    style="height:150px;" name="message" placeholder="Enter Your Message Here">
                                        {{ old('message') }}
                                    </textarea><br>
                            </div>
                            <button type="submit" class="btn btn-secondary">Send message</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>



@endsection
@push('js')
    <script>
        $(document).ready(function() {



            $('input[type=text]').focus(function() {
                $(this).siblings(".invalid-feedback").hide();
                $(this).removeClass('is-invalid');
            });

            $('input[type=email]').focus(function() {
                $(this).siblings(".invalid-feedback").hide();
                $(this).removeClass('is-invalid');
            });
            $('.text').focus(function() {
                $(this).siblings(".invalid-feedback").hide();
                $(this).removeClass('is-invalid');
            });



        });
    </script>

@endpush
