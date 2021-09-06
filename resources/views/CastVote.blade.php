@extends('layouts.app')
<style>
    .cast-vote-div1 {
        margin-top: -20px;
    }

    .card-outline {
        border-top: 3px solid #007bff;
    }

    .profile-user-img {
        /* border: 3px solid #adb5bd; */
        margin: 0 auto;
        padding: 3px;
        width: 100px;
    }

    .img-circle {
        border-radius: 50%;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .profile-username {
        font-size: 21px;
        margin-top: 5px;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .list-group {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
    }

    .list-group-unbordered>.list-group-item {
        border-left: 0;
        border-radius: 0;
        border-right: 0;
        padding-left: 0;
        padding-right: 0;
    }

</style>
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            {{-- <div class="col-lg-3">
                <div class="card">

                    <div class="card-body">
                        <h2 class="card-title text-center">Candidates</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#menu1">National Assembley Candidate</a></li>
                            <li class="list-group-item"><a href="#menu2">Province Assembley Candidate</a></li>

                        </ul>
                    </div>

                </div>
            </div> --}}
            <div class="col-lg-12">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form>
                    {{-- {{ csrf_field() }} --}}
                    <div class="card" id="menu1">
                        <div class="card-header font-weight-bold">
                            National Assembley Candidate
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($nationalcandidates as $nationalcandidate)
                                    <div class="col-lg-3">
                                        <div class="card  card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <img class="profile-user-img img-fluid img-circle"
                                                        src="{{ url('images/userImages', $nationalcandidate->user->image) }}"
                                                        alt="User profile picture">
                                                </div>

                                                <h3 class="profile-username text-center">
                                                    {{ $nationalcandidate->user->name }}</h3>

                                                <p class="text-muted text-center">MNA</p>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Party</b> <a
                                                            class="float-right">{{ $nationalcandidate->party->name }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Party Logo</b>
                                                        <img class="img-fluid img-circle"
                                                            src="{{ url('images/partiesImages', $nationalcandidate->party->image) }}">
                                                    </li>
                                                </ul>
                                                <div class="justify-content-center">
                                                    <center><input type="radio" value="{{ $nationalcandidate->id }}"
                                                            name="nationalcandidate"><span>Select</span></center>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div><br>

                    <div class="card tab-pane" id="menu2">
                        <div class="card-header font-weight-bold">
                            Province Assembley Candidate
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($provincecandidates as $provincecandidate)
                                    <div class="col-lg-3">
                                        <div class="card  card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <img class="profile-user-img img-fluid img-circle"
                                                        src="{{ url('images/userImages', $provincecandidate->user->image) }}"
                                                        alt="User profile picture">
                                                </div>

                                                <h3 class="profile-username text-center">
                                                    {{ $provincecandidate->user->name }}</h3>

                                                <p class="text-muted text-center">MPA</p>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Party</b> <a
                                                            class="float-right">{{ $provincecandidate->party->name }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Party Logo</b> <a
                                                            class="float-right">{{ $provincecandidate->id }}</a>
                                                    </li>
                                                </ul>
                                                <div class="justify-content-center">
                                                    <center><input type="radio" value="{{ $provincecandidate->id }}"
                                                            name="provincecandidate"><span>Select</span></center>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div><br>
                    <Center><button class="btn btn-primary submit" style="width:50%;height:40px;"> Submit Your
                            Vote</button></Center><br>
                </form>
            </div>

        </div>

    </div>

    <br><br>
@endsection
@push('js')

    <script>
        $(document).ready(function() {
            $('.submit').click(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var nationalcandidate = $("input[name='nationalcandidate']:checked").val();
                var provincecandidate = $("input[name='provincecandidate']:checked").val();

                // alert('national area cndidate' + nationalcandidate + ' ' + 'province area candidate' +
                //     provincecandidate);
                swal({
                    title: "Are you sure?",
                    text: "Once The vote is casted, you will not be able to change this.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('castvote.store') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                nationalcandidate: nationalcandidate,
                                provincecandidate: provincecandidate
                            },
                            success: function(response) {

                                if ($.isEmptyObject(response.error)) {
                                    swal(response.success, {
                                        icon: "success",
                                    }).then((result) => {
                                        window.location = response.url;
                                    });

                                } else {
                                   

                                    // swal({
                                    //     title: "Error",
                                    //     icon: "warning",
                                    //     text: values+'<br>',
                                    //     timer: 5000,
                                    //     showConfirmButton: false,
                                    //     type: "error"
                                    // })

                                    swal({
                                        title: "Error",
                                        text:"Please Select Both National and Province Candidate.",
                                        
                                    })
                                    console.log(response.error);
                                    printErrorMsg(response.error);
                                }

                            }

                        });

                    }

                });

            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endpush
