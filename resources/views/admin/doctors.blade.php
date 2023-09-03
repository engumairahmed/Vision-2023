@extends('admin.layout')
@section('title','Doctors')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Doctors</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the</p>

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
                                <th>Name</th>
                                <th>Specializaion</th>
                                <th>DOB</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Specializaion</th>
                                <th>DOB</th>
                                <th>Age</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->speacialization}}</td>
                                <td>{{$user->doc_DOB}}</td>
                                <td>{{$ages[$user->doctor_id]}}</td>

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