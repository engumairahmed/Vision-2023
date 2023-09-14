@extends('patient.layout')

@section('title','MedCustodin-Reports')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Medical Reports</h1>
            <p class="mb-4">Below, you'll find a list of all uploaded medical reports.</p>
    
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
                                    <th>Report</th>
                                    <th>Prescription</th>
                                    <th>Uploaded On</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Report</th>
                                    <th>Prescription</th>
                                    <th>Uploaded On</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                {{-- {{dd($doctor)}} --}}
                                {{-- {{dd($reports)}} --}}
                                @foreach ($reports as $item)
                                    
                                <tr>
                                    <td>{{$item->mr_name}}</td>
                                    <td>{{$item->dosage}}</td>
                                    <td>{{$item->medic_description}}</td>
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