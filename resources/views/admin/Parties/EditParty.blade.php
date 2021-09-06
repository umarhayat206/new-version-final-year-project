@extends('layouts.MasterAdmin')

@section('content')
    <nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('voters.index') }}">Parties</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Party</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i>Edit Party</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('parties.update',$party->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Party Name</label>
                                <input type="text" class="form-control" value="{{ $party->name }}"
                                    placeholder="Enter Party Name" name="name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Party Symbol</label>
                                    <input id="name" type="file" class="form-control" name="image">
                                </div>
                                @if ($party->image)
                                    <div class="form-group col-md-6">
                                        <label>Party old Symbol</label>
                                        <img alt="Avatar" class="" src="{{ url('images/partiesImages', $party->image) }}"
                                            height="100px">
                                        <input type="hidden" name="old_image" value={{ $party->image }}>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Party Moto</label>
                                <textarea name="moto" class="form-control" rows="6">
                                       {{ $party->moto }}
                                        </textarea>
                            </div>

                            <!-- /.card-body -->


                            <center><button type="submit" class="btn btn-secondary" style="width:50%">Submit</button>
                            </center>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
