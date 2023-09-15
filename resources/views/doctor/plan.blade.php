@extends('doctor.layout')

@section('title','MedCustodin-Plan Details')
@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="table-secondary">Plan</th>
                    <th class="table-secondary">Patient</th>
                    <th class="table-secondary">Start Date</th>
                    <th class="table-secondary">End Date</th>
                </tr>
            </thead>
            <tbody>
                

                {{-- @foreach ($prescription as $item) --}}
                {{-- {{dd($medicalConditions)}} --}}
                <tr>
                    <td>{{$prescription->plan_name}}</td>
                    <td>{{$prescription->user->name}}</td>                    
                    <td>{{$prescription->start_date}}</td>
                    <td>{{$prescription->end_date}}</td>
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
        @foreach ($medicalConditions as $item)
            <p>{{$item->condition_name}}</p>
        @endforeach
    </div>
    <div class="tab-pane mt-3" id="medication" role="tabpanel" aria-labelledby="medication-tab">
        @foreach ($medications as $item)
            <p>Medicine : {{$item->medicine}} {{$item->dosage}} -> Daily : {{$item->pivot->pm_frequency}} times -> Instructions : {{$item->pivot->pm_instructions}}</p>
        @endforeach
    </div>
    <div class="tab-pane mt-3" id="tests" role="tabpanel" aria-labelledby="tests-tab">
        @foreach ($labTests as $item)
            <p>Medical Test Name : {{$item->test_name}}</p>
        @endforeach
    </div>
    <div class="tab-pane mt-3" id="reports" role="tabpanel" aria-labelledby="reports-tab">
        {{-- {{dd($medicalReports)}} --}}
        @foreach ($medicalReports as $item)
            @if (isset($item->mr_name))
            <div>
                <span>Medical Report: </span><a href="{{asset($item->mr_report)}}" download="{{ $item->mr_name }}">{{ $item->mr_name }}</a>
            </div>
            @else
                <p>No reports found</p>
            @endif
        @endforeach
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

@endsection