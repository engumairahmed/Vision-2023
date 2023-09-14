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

        <!-- Doctors count Card -->
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

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="table-secondary">Name</th>
                        <th class="table-secondary">Email</th>
                        <th class="table-secondary">DOB</th>
                        <th class="table-secondary">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>{{$user->name}}</td>
                        @isset($user->name)
                        <td>{{$user->name}}</td>
                        @else
                        <td>{{$user->name}}</td>
                        @endisset
                        <td>{{$user->dob}}</td>
                        <td>{{$user->end_date}}</td>
                    </tr>
                
                </tbody>
            </table>

        </div>
    </div>

<!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item m-2" role="presentation">
      <button class="nav-link active" id="condition-tab" data-toggle="tab" data-target="#condition" type="button" role="tab" aria-controls="condition" aria-selected="true">Medical Condition</button>
    </li>
    <li class="nav-item m-2" role="presentation">
      <button class="nav-link" id="medication-tab" data-toggle="tab" data-target="#medication" type="button" role="tab" aria-controls="medication" aria-selected="false">Medication</button>
    </li>
    <li class="nav-item m-2" role="presentation">
      <button class="nav-link" id="tests-tab" data-toggle="tab" data-target="#tests" type="button" role="tab" aria-controls="tests" aria-selected="false">Medical Tests</button>
    </li>
    <li class="nav-item m-2" role="presentation">
        <button class="nav-link" id="reports-tab" data-toggle="tab" data-target="#reports" type="button" role="tab" aria-controls="reports" aria-selected="false">Medical Reports</button>
      </li>
  </ul>
  
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane mt-3 active" id="condition" role="tabpanel" aria-labelledby="condition-tab">
        {{-- @foreach ($medicalConditions as $item)
            <p>{{$item->condition_name}}</p>
        @endforeach --}}
    </div>
    <div class="tab-pane mt-3" id="medication" role="tabpanel" aria-labelledby="medication-tab">
        {{-- @foreach ($medications as $item)
            <p>Medicine : {{$item->medicine}} {{$item->dosage}} -> Daily : {{$item->pivot->pm_frequency}} times -> Instructions : {{$item->pivot->pm_instructions}}</p>
        @endforeach --}}
    </div>
    <div class="tab-pane mt-3" id="tests" role="tabpanel" aria-labelledby="tests-tab">
        {{-- @foreach ($labTests as $item)
            <p>Medical Test Name : {{$item->test_name}}</p>
        @endforeach --}}
    </div>
    <div class="tab-pane mt-3" id="reports" role="tabpanel" aria-labelledby="reports-tab">
        {{-- {{dd($medicalReports)}} --}}
        {{-- @foreach ($medicalReports as $item)
            @if (isset($item->mr_name))
            <div>
                <span>Medical Report: </span><a href="{{asset($item->mr_report)}}" download="{{ $item->mr_name }}">{{ $item->mr_name }}</a>
            </div>
            @else
                <p>No reports found</p>
            @endif
        @endforeach --}}
        <div class="m-4">
            <a href="{{route('user.add-reports')}}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Upload Reports</span>
            </a>
        </div>
    </div>
  </div>
</div>
@endsection