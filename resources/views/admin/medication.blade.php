@extends('admin.layout')
@section('title','Medication')

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Medication</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

                <div class="m-4">
                    <a href="{{route('admin.add-medication')}}" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Medication</span>
                    </a>
                </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Medication Tables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Dosage</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Dosage</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($medicines as $medic)
                                <tr>
                                <td>{{$medic->medic_id}}</td>
                                <td>{{$medic->medicine}}</td>
                                <td>{{$medic->dosage}}</td>
                                <td>{{$medic->medic_description}}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
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