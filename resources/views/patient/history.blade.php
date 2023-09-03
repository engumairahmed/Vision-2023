@extends('patient.layout')

@section('title','MedCustodin-History')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Medical History</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                                <th>View</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Plan</th>
                                <th>Consultant</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>View</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($result as $item)
                                
                            <tr>
                                <td>{{$item->plan_name}}</td>
                                @isset($item->doctor_id)
                                <td>{{$item->name}}</td>
                                @endisset
                                <td>{{$item->start_date}}</td>
                                <td>{{$item->end_date}}</td>
                                <td><a href="#" class="btn btn-circle btn-sm btn-info"><i class="fas fa-info-circle"></i></a></td>

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