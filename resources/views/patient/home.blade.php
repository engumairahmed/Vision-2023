@extends('patient.layout')

@section('title','MedCustodin')
@section('content')
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Active Medications -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Active Medication Plans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-warning">
                            <i class="fas fa-clipboard-list fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card border border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Latest Vitals recorded on: {{$vital->created_at}}</div>
                                @if ($vital!==Null)
                                <div class=" mb-0 font-weight-bold text-gray-800">
                                    BP: {{$vital->blood_pressure}} | 
                                    Temperature: {{$vital->body_temperature}} °F | 
                                    Weight: {{$vital->body_weight}} | 
                                    SpO2: {{$vital->oxygen_saturation}}
                                    
                                </div>
                                <div class=" mb-0 font-weight-bold text-gray-800">
                                    Pulse Rate: {{$vital->pulse_rate}} | 
                                    Respiratory Rate: {{$vital->respiratory_rate}} | 
                                    Sugar Level: {{$vital->blood_glucose_levels}}

                                </div>
                                @else

                                <div class=" mb-0 font-weight-bold text-gray-800">Your last recorded Vitals will show here</div>
                                    
                                @endif
                        </div>
                        <div class="col-auto icon-circle bg-info">
                            <i class="fas fa-heartbeat fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Medical History</h1>
    <p class="mb-4">Below, you'll find a comprehensive list of all medication plans.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Prescription Plans</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Plan</th>
                                <th>Consultant</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Plan</th>
                                <th>Consultant</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>View Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{dd($doctor)}} --}}
                            @foreach ($result as $item)
                                
                            <tr>
                                <td>{{$item->plan_name}}</td>
                                <td>{{$item->doc_name}}</td>
                                <td>{{$item->start_date}}</td>
                                <td>{{$item->end_date}}</td>
                                <td><a href="{{ route('user.plan', ['id' => $item->presc_id]) }}" class="btn btn-circle btn-sm btn-info"><i class="fas fa-info-circle"></i></a></td>
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