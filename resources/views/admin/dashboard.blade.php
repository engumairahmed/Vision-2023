@extends('admin.layout')

@section('title','Admin-MedCustodian')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Users count Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary border-right shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Clientele</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$userCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-primary">
                            <i class="fas fa-user fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctors count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Medical Personnel</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$doctorCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-success">
                            <i class="fas fa-user-md fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Total prescriptions count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cumulative Prescriptions
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$presc_count}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-info">
                            <i class="fas fa-clipboard-list fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Total prescriptions count Card -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today's Queries
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$queryCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-info">
                            <i class="far fa-envelope fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection