@extends('patient.layout')
@section('title','Vitals')

@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon col-auto icon-circle bg-info">
                                <i class="fas fa-clipboard-list fa-xs text-white"></i>
                            </div>
                             Vitals
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--Session messages-->
    @if (Session::has('msg'))
        <div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
            {{Session::get('msg')}} 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>         
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Main page content-->
    <div class="container-xl px-8 mt-4">        
        <div class="row">
            <div class="col-xl-10">
                <!-- Plan details card-->
                <div class="card mb-4">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (BP Systolic)-->
                                <div class="mb-3 col-md-6">
                                    <label class="small mb-1" for="inputSystolic">Blood Pressure(top)</label>
                                    <input class="form-control" id="inputSystolic" type="number" placeholder="Enter Systolic Pressure (on the top)" value="{{ old('systolic') }}" name="systolic">
                                </div>
                                <!-- Form Group (BP Diastolic)-->
                                <div class="col-md-6">                                
                                    <label class="small mb-1" for="inputDiastolic">Blood Pressure(below)</label>
                                    <input class="form-control" id="ipnutDiastolic" type="number" placeholder="Enter Diastolic Pressure (below)" value="{{ old('diastolic') }}" name="diastolic">
                                </div>                         
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Body Temperature)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputTemperature">Body Temperature (°Farhenheit)</label>
                                    <input class="form-control" id="inputTemperature" type="number" name="body_temp" value="{{ old('body_temp') }}" placeholder="Enter Body Temperature" min="97" max="106">                                    
                                </div>
                                <!-- Form Group (Body Weight)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="selectDoctorName">Body Weight (Kilogram)</label>
                                    <input class="form-control" id="inputDoctorName" type="number" name="body_weight" value="{{ old('body_weight') }}" placeholder="Enter Body Weight">                                 
                                </div>                               
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Pulse Rate)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="startDate">Pulse Rate (BPM)</label>
                                    <input class="form-control" id="startDate" type="number" name="pulse_rate" value="{{ old('pulse_rate') }}" placeholder="Enter Pulse Rate">
                                </div>
                               <!-- Form Group (SpO2)-->
                               <div class="col-md-6">
                                    <label class="small mb-1" for="inputSpO2">Oxygen Saturation Rate</label>
                                    <input class="form-control" id="inputSpO2" type="number" name="spo2" value="{{ old('spo2') }}" placeholder="Oxygen Saturation Rate / SpO2">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div id="medicine-container">
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Medicine)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputResiratoryRate">Respiratory Rate</label>
                                        <input class="form-control" id="inputResiratoryRate" type="number" name="respiratory_rate" value="{{ old('respiratory_rate') }}" placeholder="Enter Respiratory Rate">    
                                    </div>
                                    <!-- Form Group (Frequency)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBloodGlucoseLevel">Blood Glucose Levels (mg/dL)</label>
                                        <input class="form-control" id="inputBloodGlucoseLevel" type="number" name="blood_glucose" value="{{ old('blood_glucose') }}" placeholder="Enter Blood Glucose Levels">
                                    </div>                               
                                </div>
                            </div>                           
                            <!-- Save changes button-->
                            <input class="btn btn-info text-light" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection