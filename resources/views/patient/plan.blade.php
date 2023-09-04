@extends('patient.layout')

@section('title','MedCustodin-Plan Details')
@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="table-secondary">Plan</th>
                    <th class="table-secondary">Consultant</th>
                    <th class="table-secondary">Start Date</th>
                    <th class="table-secondary">End Date</th>
                </tr>
            </thead>
            <tbody>
                

                {{-- @foreach ($prescription as $item) --}}
                {{-- {{dd($medicalConditions)}} --}}
                <tr>
                    <td>{{$prescription->plan_name}}</td>
                    @isset($prescription->doctor->user->name)
                    <td>{{$prescription->doctor->user->name}}</td>
                    @else
                    <td>{{$prescription->doctor_name}}</td>
                    @endisset
                    <td>{{$prescription->start_date}}</td>
                    <td>{{$prescription->end_date}}</td>
                </tr>
                {{-- <tr>
                    <th>Medical Condition</th>                    
                    <th>Medications</th>                    
                </tr>
                
                @foreach ($medicalConditions as $item)
                @foreach ($medications as $item2)
                    <tr>
                        <td class="table-info">{{$item->condition_name}}</td>
                        <td class="table-info">{{$item2->medicine}}</td>
                    </tr>
                @endforeach
                @endforeach --}}
                
                

                {{-- @endforeach --}}
               
            </tbody>
        </table>

    </div>
</div>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item m-2" role="presentation">
      <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Medical Condition</button>
    </li>
    <li class="nav-item m-2" role="presentation">
      <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Medication</button>
    </li>
    <li class="nav-item m-2" role="presentation">
      <button class="nav-link" id="messages-tab" data-toggle="tab" data-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Medical Tests</button>
    </li>
  </ul>
  
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane mt-3 active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @foreach ($medicalConditions as $item)
            <p>{{$item->condition_name}}</p>
        @endforeach
    </div>
    <div class="tab-pane mt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @foreach ($medications as $item)
            <p>Medicine : {{$item->medicine}} {{$item->dosage}} -> Daily : {{$item->pivot->pm_frequency}} times -> Instructions : {{$item->pivot->pm_instructions}}</p>
        @endforeach
    </div>
    <div class="tab-pane mt-3" id="messages" role="tabpanel" aria-labelledby="messages-tab">
        @foreach ($labTests as $item)
            <p>Medical Test Name : {{$item->test_name}}</p>
        @endforeach
    </div>
  </div>

@endsection