@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="text-center">
            <h1>All Results</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Province Assembley Results</div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="candidateTable">
                                <thead>
                                    <tr>
                                        <th>
                                          Candidate Name
                                        </th>
                                        <th>
                                          Candidate Party
                                        </th>
                                        <th>
                                          Party Logo
                                        </th>
                                        <th>Vote Count</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($provincecandidates as $item)
                                  <tr>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->party->name}}</td>
                                    <td><img src="{{url('images/partiesImages',$item->party->image)}}" style="border-radius: 50%;height:80px;"></td>
                                    @foreach ($item->provinceAreas as $item2)
                                      @if($item2->province_area_id==$id)
                                      <td>{{$item2->vote_count}}</td>
                                      @endif
                                    @endforeach

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



