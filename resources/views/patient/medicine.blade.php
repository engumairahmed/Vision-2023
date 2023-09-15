@extends('patient.layout')

@section('title','MedCustodin-Medicine Info')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Page Heading -->
            <div class="col-xl-8 col-md-6 mb-4">
                <h1 class="h3 mb-2 text-gray-800">Medications</h1>
                <p class="mb-4">Below is a list of all medicines currently added in system.</p>
            </div>
            <!-- Medicines Count Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Medicines</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$medicineCount}}</div>
                            </div>
                            <div class="col-auto icon-circle bg-info">
                                <i class="fas fa-pills fa-lg text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
            <!-- Medicines Tables -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Medicines</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Medicine</th>
                                    <th>Dosage</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Medicine</th>
                                    <th>Dosage</th>
                                    <th>Details</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                {{-- {{dd($doctor)}} --}}
                                @foreach ($medicines as $medic)
                                    
                                <tr>
                                    <td>{{$medic->medicine}}</td>
                                    <td>{{$medic->dosage}}</td>
                                    <td>{{$medic->medic_description}}</td>
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