@extends('patient.layout')

@section('title','MedCustodin-Medicine Info')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Medical History</h1>
            <p class="mb-4">Below, you'll find a list of all medications.</p>
    
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