@extends('layouts.MasterAdmin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 offset-3">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Register New Party</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('parties.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Party Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Party Name" name="name">
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

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
