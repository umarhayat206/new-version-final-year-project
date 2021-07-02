@extends('layouts.MasterAdmin')
@section('css')

<link rel="stylesheet" href="{{asset('DataTables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Candidates</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped projects" id="candidateTable">
          <thead>
              <tr>
                  <th style="width: 20%">
                    Name
                  </th>
                  <th style="width: 30%">
                    CNIC
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Candidate Party
                  </th>
                  <th>
                      Actions
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($candidates as $candidate)
              <tr>
                  <td>{{$candidate->name}}</td>
                  <td>
                    {{$candidate->cnic}}
                  </td>
                  <td class="project_progress">
                   
                  <img alt="Avatar" class="" src="{{url('images/candidateImages/',$candidate->image)}}" height="100px">
                        
                  </td>
                  <td class="project-state">
                    {{$candidate->candidateParty->party_name}}
                  </td>
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{route('candidates.show',$candidate->id)}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('candidates.edit',$candidate->id)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                      </a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

    
@endsection
@push('js')
    <script src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script>
 $(document).ready( function () {
    
   $('#candidateTable').DataTable();

 });

</script>
@endpush