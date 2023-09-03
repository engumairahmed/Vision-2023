@extends('admin.layout')
@section('title','Medication')

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-md-6 mb-4">
            <h1 class="h3 mb-2 text-gray-800">Medications</h1>
            <p class="mb-4">Below is a list of all medicines currently added in system.</p>
        </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info border-bottom-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Medicines</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$medicineCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-info">
                            <i class="fas fa-pills fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            {{-- <livewire:show-data />              --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>        
    <!-- /.container-fluid -->


@endsection