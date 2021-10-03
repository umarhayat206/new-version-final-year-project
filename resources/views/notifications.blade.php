@extends('layouts.app')
@section('css')

{{-- <link rel="stylesheet" href="{{asset('DataTables/css/jquery.dataTables.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="text-center">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><h2>Notifications</h2></div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="candidateTable">
                                <thead>
                                    <tr>
                                        <th>
                                          Notification Title
                                        </th>
                                        <th>
                                          Notification Description
                                        </th>
                                        <th>View</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($notifications as $item)
                                  <tr>
                                    <td style="width:30%"><b>{{$item->title}}</b></td>
                                    <td>{{ Illuminate\Support\Str::limit($item->description,150)}}</td>
                                    <td style="width:20%"><a href="{{route('public.view.notification',$item->id)}}">Click to view</a></td>
                                  </tr>
                                 
                              @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
              
            </div>
        </div>

    </div>
    <br>
    <br>

@endsection
@push('js')
    {{-- <script src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script> --}}
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
 $(document).ready( function () {

   $('#candidateTable').DataTable();
  
 });

</script>
@endpush



