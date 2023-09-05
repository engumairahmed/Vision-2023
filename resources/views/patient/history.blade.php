@extends('patient.layout')

@section('title','MedCustodin-History')
@section('content')

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