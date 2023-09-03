@extends('admin.layout')
@section('title','MedCustodian-Medical Test')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-md-6 mb-4">
            <h1 class="h3 mb-2 text-gray-800">Medical Test</h1>
            <p class="mb-4">Below is a list of all medical tests currently added in system.</p>
        </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Medical Tests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$testCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-warning">
                            <i class="fas fa-microscope fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="m-4">
            <a href="{{route('admin.lab-test')}}" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Test</span>
            </a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($tests as $test)
                                
                            <tr>
                                <td>{{$test->test_id}}</td>
                                <td>{{$test->test_name}}</td>
                                <td>{{$test->description}}</td>
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