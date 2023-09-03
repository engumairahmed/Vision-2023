@extends('admin.layout')
@section('title','Surgical-Procedures')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-md-6 mb-4">
            <h1 class="h3 mb-2 text-gray-800">Surgical Procedures</h1>
            <p class="mb-4">Below is a list of all surgical procedures currently added in system.</p>
        </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger border-bottom-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Surgical Procedures</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$spCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-danger">
                            <i class="fas fa-file-medical-alt fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="m-4">
                <a href="{{route('admin.add-sp')}}" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Procedure</span>
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($sp as $item)
                                <tr>
                                    <td>{{$item->sp_id}}</td>
                                    <td>{{$item->sp_name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <livewire:show-data />              --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>        
    <!-- /.container-fluid -->
@endsection