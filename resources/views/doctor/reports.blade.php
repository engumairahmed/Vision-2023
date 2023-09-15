@extends('doctor.layout')

@section('title','MedCustodin-Medicine Info')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-md-6 mb-4">
                <h1 class="h3 mb-2 text-gray-800">Reports</h1>
                <p class="mb-4">Below is a list of all reports associated with your provided prescriptions.</p>
            </div>
        </div>
    
            <!-- Medicine Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Prescription</th>
                                    <th>Patient</th>
                                    <th>Report</th>
                                    <th>Download</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Prescription</th>
                                    <th>Patient</th>
                                    <th>Report</th>
                                    <th>Download</th>
                                    <th>View</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                {{-- {{dd($medicalReportsWithUsers)}} --}}
                                @foreach ($medicalReportsWithUsers as $medic)
                                    
                                <tr>
                                    <td>{{ $medic['plan_name'] }}</td>
                                    <td>{{ $medic['user']['name'] }}</td>
                                    <td>{{ $medic['report']['mr_name'] }}</td>
                                    <td><a href="{{ asset($medic['report']['mr_report']) }}" download="{{$medic['report']['mr_report']}}">Click to Donwload</a></td>
                                    <td><a href="{{ asset($medic['report']['mr_report']) }}">View</a></td>
                                </tr>
    
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- /.container-fluid -->

@endsection