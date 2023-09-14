@extends('patient.layout')

@section('title','MedCustodin-Reports')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Medical Reports</h1>
            <p class="mb-4">Below, you'll find a list of all uploaded medical reports.</p>

            <!-- Session Messages -->
            @if (Session::has('msg'))
            <div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
                {{Session::get('msg')}} 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <!-- Session Messages -->
            @if (Session::has('error'))
            <div class="alert alert-warning shadow-sm alert-dismissible fade show" role="alert">
                {{Session::get('error')}} 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Prescription</th>
                                    <th>Report</th>
                                    <th>Download</th>
                                    <th>Uploaded On</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Prescription</th>
                                    <th>Report</th>
                                    <th>Download</th>
                                    <th>Uploaded On</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($reports as $report)                                    
                                @foreach ($report->medicalReports as $item)
                                <tr>
                                    <td>{{$report->plan_name}}</td>
                                    <td>{{$item->mr_name}}</td>
                                    <td><a href="{{asset($item->mr_report)}}" download="{{ $item->mr_name }}">Click to download</a></td>   
                                    <td>{{$item->created_at}}</td>
                                    <td><a href="/patient/reports/delete/{{$item->id}}" class="btn btn-circle btn-sm btn-danger"><i class="far fa-trash-alt"></i></a></td>

                                </tr>
                                @endforeach    
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- /.container-fluid -->

@endsection