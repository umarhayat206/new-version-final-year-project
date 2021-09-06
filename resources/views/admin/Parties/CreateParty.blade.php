@extends('layouts.MasterAdmin')

@section('content')
    <nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-top:-35px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('voters.index') }}">Parties</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Party</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i>Register New Party</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('parties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Party Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Party Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Party Symbol</label>
                                <input id="name" type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Party Moto</label>
                                <textarea name="moto" class="form-control" rows="6">

                                    </textarea>
                            </div>

                            <!-- /.card-body -->


                            <center><button type="submit" class="btn btn-secondary" style="width:50%">Submit</button></center>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
