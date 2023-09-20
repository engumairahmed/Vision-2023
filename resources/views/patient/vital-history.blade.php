@extends('patient.layout')

@section('title','Vitals-History')
@section('content')

    <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vitals History</h1>
        <p class="mb-4">Below, you'll find a comprehensive list of previously recorded vitals.</p>

        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vitals</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>BP</th>
                                <th>Temperature</th>
                                <th>Weight</th>
                                <th>Pulse Rate</th>
                                <th>Respiratory Rate</th>
                                <th>SpO2</th>
                                <th>Sugar Level</th>
                                <th>Recorded By</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Record ID</th>
                                <th>BP</th>
                                <th>Temperature</th>
                                <th>Weight</th>
                                <th>Pulse Rate</th>
                                <th>Respiratory Rate</th>
                                <th>SpO2</th>
                                <th>Sugar Level</th>
                                <th>Recorded By</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{dd($result)}} --}}
                            @foreach ($vitals as $item)
                                
                            <tr>
                                <td>{{$item->vital_id}}</td>
                                <td>{{$item->blood_pressure}}</td>
                                <td>{{$item->body_temperature}}</td>
                                <td>{{$item->body_weight}}</td>
                                <td>{{$item->pulse_rate}}</td>
                                <td>{{$item->respiratory_rate}}</td>
                                <td>{{$item->oxygen_saturation}}</td>
                                <td>{{$item->blood_glucose_levels}}</td>
                                @if ($item->vital_created_by==auth()->user()->id)
                                <td>Self</td>
                                @else
                                <td>Dr.{{$item->createdByUser->name}}</td>
                                @endif
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