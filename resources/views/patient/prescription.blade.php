@extends('patient.layout')

@section('title','MedCustodin-History')
@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon col-auto icon-circle bg-primary">
                                <i class="fas fa-capsules fa-lg text-white"></i>
                            </div>
                            Create Medication Plan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">        
        <div class="row">
            <div class="col-xl-8">
                <!-- Plan details card-->
                <div class="card mb-4">
                    <div class="card-header">Medication Details</div>
                    <div class="card-body">
                        <form method="">
                            <div class="row gx-3 mb-3">
                            <!-- Form Group (Plan Name)-->
                            <div class="mb-3 col-md-6">
                                <label class="small mb-1" for="inputUsername">Medication Plan Name</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter Plan Name" value="">
                            </div>
                            <!-- Form Group (Medical Condition)-->
                            <div class="col-md-6">                                
                                <label class="small mb-1" for="inputMedicalCondition">Medical Condition</label>
                                <select class="form-control" id="inputMedicalCondition" type="text">
                                    <option value="0">Select Medical Condition</option>
                                    @foreach ($conditions as $item)
                                    <option value="{{$item->condition_id}}">{{$item->condition_name}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                           
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Doctor Name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputDoctorName">Doctor Name</label>
                                    <input class="form-control" id="inputDoctorName" type="text">                                    
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="selectDoctorName">Select Doctor from list</label>
                                    <select class="js-example-responsive  form-control" id="selectDoctorName" type="text" style="">
                                        <option value="0">Select Doctor Name</option>
                                        @foreach ($conditions as $item)
                                        <option value="{{$item->condition_id}}">{{$item->condition_name}}</option>
                                        @endforeach                                        
                                    </select>
                                </div>                               
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Start Date)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="startDate">Prescription Start Date</label>
                                    <input class="form-control date" type="text" name="startDate" id="startDate">
                                </div>
                               <!-- Form Group (End Date)-->
                               <div class="col-md-6">
                                <label class="small mb-1" for="endDate">Prescription End Date</label>
                                <input class="form-control date" type="text" name="endDate" id="endDate">
                            </div>
                            </div>
                            <!-- Form Group (Lab-Test name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputTestName">Recommended Test Name</label>
                                <select class="form-control" id="inputTestName" type="email" placeholder="Select Test Name" value="" multiple>
                                    @foreach ($tests as $item)
                                        <option value="{{$item->lab_id}}">{{$item->test_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection