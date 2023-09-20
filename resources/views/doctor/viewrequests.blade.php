@extends('doctor.layout')
@section('title','Requests')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="row">
        <div class="col-xl-8 col-md-6 mb-4">
            <h1 class="h3 mb-2 text-gray-800">Medicine Request</h1>
            <p class="mb-4">Below is a list of all requests.</p>
        </div>
         <!-- Total Messages Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info border-bottom-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Requests Made</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$reqCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-info">
                            <i class="far fa-envelope fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Dated</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Subject</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Dated</th>
                                <th>View</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($requests as $item)
                                
                            <tr>
                                <td>{{$item->subject}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><a href="/admin/queries/message/{{$item->id}}" class="btn btn-circle btn-sm btn-warning"><i class="far fa-envelope-open"></i></a></td>
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