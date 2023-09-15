@extends('admin.layout')
@section('title','Account Settings')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Content Row -->
    <div class="row">

        <!-- Users count Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary border-right shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Prescriptions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$presc_count}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-primary">
                            <i class="fas fa-clipboard-list fa-lg text-white"></i>
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
                                Total Vitals</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$vitalsCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-success">
                            <i class="fas fa-heartbeat fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Doctors count Card -->
    <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Reports</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$reportCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-warning">
                            <i class="fas fa-file-medical-alt fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Reports</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$reportCount}}</div>
                        </div>
                        <div class="col-auto icon-circle bg-info">
                            <i class="fas fa-clipboard-list fa-lg text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- Users count Card  -->
          @if ($user->is_active)
            
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-bottom-success shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                  Status</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Active</div>
                          </div>
                          <div class="col-auto icon-circle bg-success">
                              <i class="far fa-check-circle fa-lg text-white"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @else
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-bottom-danger shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                  Status</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Deactive</div>
                          </div>
                          <div class="col-auto icon-circle bg-danger">
                              <i class="far fa-times-circle fa-lg text-white"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endif

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
          
                <tbody>
                    <tr>
                        <th class="table-secondary" colspan="1">Name</th>
                        <th class="table-secondary">Email</th>
                        <th class="table-secondary">Joined On</th>
                    </tr>
                    
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <th colspan="3" class="table-secondary">Personal Information</th>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <th class="table-secondary">Contact</th>
                        <th class="table-secondary">Gender</th>
                        <th class="table-secondary">DOB</th>
                    </tr>
                    <tr>
                        <td>{{$patientData->pat_contact}}</td>
                        <td>{{$patientData->pat_gender}}</td>
                        <td>{{$patientData->pat_DOB}}</td>
                    </tr>
                    <tr>
                        <th class="table-secondary">Father's Name</th>
                        <th class="table-secondary">Spouse Name</th>
                        <th class="table-secondary">Blood Group</th>
                    </tr>
                    <tr>
                        <td>{{$patientData->father_name}}</td>
                        <td>{{$patientData->husband_name}}</td>
                        <td>{{$patientData->blood_group}}</td>
                    </tr>
                    <tr>
                        <th class="table-secondary" colspan="3">Address</th>
                    </tr>
                    <tr>
                        <td colspan="3">{{$patientData->pat_address}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection