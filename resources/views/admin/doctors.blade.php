@extends('admin.layout')
@section('title','Doctors')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Doctors</h1>
        <p class="mb-4">Below are the detils of registered doctors</p>

        <!-- Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Details</h6>
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
                                <th>Verification</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Specializaion</th>
                                <th>DOB</th>
                                <th>Age</th>
                                <th>Verification</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Details</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->specialization}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{$ages[$user->doctor_id]}}</td>
                                @if ($user->email_verified_at)
                                {{-- {{dd($user)}} --}}
                                <td>Verified</td>                                    
                                @else
                                <td>Un-Verified</td>
                                @endif
                                @if ($user->is_active)
                                <td>Active</td>
                                <td><a href="{{ route('disable.user', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Deactivate</a></td>
                                @else
                                <td>Disabled</td>                                
                                <td><a href="{{ route('enable.user', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Activate</a></td>
                                @endif
                                <td><a href="{{ route('view.doctors', ['id' => $user->id]) }}" class="btn btn-info btn-sm">View</a></td>
                               

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