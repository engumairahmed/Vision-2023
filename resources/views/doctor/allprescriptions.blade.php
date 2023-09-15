@extends('doctor.layout')

@section('title','MedCustodin-Medicine Info')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-md-6 mb-4">
                <h1 class="h3 mb-2 text-gray-800">Patients</h1>
    <p class="mb-4">Below, you'll find a comprehensive list of all the patients for whom you've provided prescriptions.</p>
            </div>
            <!-- Medicines Count Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Prescriptions</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
                            </div>
                            <div class="col-auto icon-circle bg-warning">
                            <i class="fas fa-clipboard-list fa-lg text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Patients Table -->
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
                                <th>Patient</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Plan</th>
                                <th>Patient</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>View Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($patients as $item)
                                
                            <tr>
                                <td>{{$item->plan_name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->start_date}}</td>
                                <td>{{$item->end_date}}</td>
                                <td><a href="{{ route('doctor.plan', ['id' => $item->presc_id]) }}" class="btn btn-circle btn-sm btn-info"><i class="fas fa-info-circle"></i></a></td>
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