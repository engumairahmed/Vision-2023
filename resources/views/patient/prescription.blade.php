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
                            <div class="page-header-icon col-auto icon-circle bg-warning">
                                <i class="fas fa-clipboard-list fa-xs text-white"></i>
                            </div>
                            Create Medication Plan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if (Session::has('msg'))
    <div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
        {{Session::get('msg')}} 
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
                    <div class="card-header">Medication Details</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="row gx-3 mb-3">
                            <!-- Form Group (Plan Name)-->
                            <div class="mb-3 col-md-6">
                                <label class="small mb-1" for="inputUsername">Medication Plan Name</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter Plan Name" value="" name="plan_name" required>
                            </div>
                            <!-- Form Group (Medical Condition)-->
                            <div class="col-md-6">                                
                                <label class="small mb-1" for="inputMedicalCondition">Medical Condition</label>
                                <select class="form-control select2" id="inputMedicalCondition" name="medicalCondition[]" type="text" multiple required>
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
                                    <input class="form-control" id="inputDoctorName" type="text" name="doctor_name" value="" placeholder="Enter Doctor Name">                                    
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="selectDoctorName">Select Doctor from list</label>
                                    <select class="js-example-responsive form-control select2" id="selectDoctorName" type="text" name="doctor_id" onchange="toggleInputField()">
                                        <option value="">Select Doctor Name</option>
                                        @foreach ($doctors as $item)
                                        <option value="{{$item->doctor_id}}">{{$item->name}}</option>
                                        @endforeach                                        
                                    </select>
                                </div>                               
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Start Date)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="startDate">Prescription Start Date</label>
                                    <input class="form-control date" type="text" name="start_date" id="startDate" required>
                                </div>
                               <!-- Form Group (End Date)-->
                               <div class="col-md-6">
                                <label class="small mb-1" for="endDate">Prescription End Date</label>
                                <input class="form-control date" type="text" name="end_date" id="endDate" required>
                            </div>
                            </div>
                            <!-- Form Group (Lab-Test name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputTestName">Recommended Test Name</label>
                                <select class="form-control select2" id="inputTestName" type="text" placeholder="Select Test Name" value="" name="test[]"multiple>
                                    @foreach ($tests as $item)
                                        <option value="{{$item->test_id}}">{{$item->test_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form Group (Procedure name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputSurgicalProcedure">Recommended Surgical Procedure</label>
                                <select class="form-control select2" id="inputSurgicalProcedure" type="text" placeholder="Select Surgical Procedure" value="" name="surgicalProcedure">
                                    @foreach ($sp as $item)
                                        <option value="{{$item->test_id}}">{{$item->test_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form Row-->
                            <div id="medicine-container">
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Medicine)-->
                                <div class="col-md-5">
                                    <label class="small mb-1" for="selectMedicine">Medicine</label>
                                    <select name="medicine[]" class="form-control select2" id="selectMedicine" type="tel" placeholder="Select medicine">
                                        <option value="">Select Medicine</option>
                                        @foreach ($medicine as $item)
                                        <option value="{{$item->medic_id}}">{{$item->medicine}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <!-- Form Group (Frequency)-->
                                <div class="col-md-5">
                                    <label class="small mb-1" for="selectFrequency">Medicine Frequency</label>
                                    <input class="form-control" id="selectFrequency" type="number" name="frequency[]" placeholder="Medicine intake frequency" min="1" max="4">
                                </div>
                                <!-- Form Group (Instructions)-->
                                <div class="col-md-5">
                                    <label class="small mb-1" for="selectFrequency">Instructions</label>
                                    <input class="form-control" id="selectFrequency" type="text" name="instruction[]" placeholder="e.g. Before Lunch">
                                </div>
                                 <!-- Form Group (Actions)-->
                                <div class="col-md-1">
                                    <label class="small mb-1" for="addBtn">Add</label>
                                    <button class="add-btn btn btn-info btn-circle btn-sm" id="addBtn" type="button">+</button>                                    
                                </div>                                
                            </div>
                        </div>
                            {{-- @include('dynamic') --}}
                           
                            <!-- Save changes button-->
                            <input class="btn btn-warning text-dark" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('script')
<script>
   
function toggleInputField() {
        var inputDoctorName = document.getElementById('inputDoctorName');
        var selectDoctorName = document.getElementById('selectDoctorName');

        if (selectDoctorName.value) {
            inputDoctorName.disabled = true;
            inputDoctorName.value = null;
        } else {
            inputDoctorName.disabled = false;
        }
    }

$(document).ready(function() {

    // $('#selectDoctorName').prop('selectedIndex', -1);

    function initializeSelect2(element) {
        $(element).select2({
            placeholder: 'Search for options'
            // Other options as needed
        });
    }
    
    initializeSelect2('.select2')
    $('#medicine-container').on('click','.add-btn',function(){
        console.log('button pressed')
        var newMedicineField = `
        <div class="row gx-3 mb-3">
                                <!-- Form Group (Medicine)-->
                                <div class="col-md-5">
                                    <label class="small mb-1" for="selectMedicine">Medicine</label>
                                    <select name="medicine[]" class="form-control select2" id="selectMedicine" type="tel" placeholder="Select medicine">
                                        <option value="">Select Medicine</option>
                                        @foreach ($medicine as $item)
                                        <option value="{{$item->medic_id}}">{{$item->medicine}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <!-- Form Group (Frequency)-->
                                <div class="col-md-5">
                                    <label class="small mb-1" for="selectFrequency">Medicine Frequency</label>
                                    <input class="form-control" id="selectFrequency" type="number" name="frequency[]" placeholder="Medicine intake frequency" min="1" max="4">
                                </div>
                                <!-- Form Group (Instructions)-->
                                <div class="col-md-5">
                                    <label class="small mb-1" for="selectFrequency">Instructions</label>
                                    <input class="form-control" id="selectFrequency" type="text" name="instruction[]" placeholder="e.g. Before Lunch">
                                </div>
                                 <!-- Form Group (Actions)-->
                                <div class="col-md-1">
                                    <label class="small mb-1" for="remove">Remove</label>
                                    <button class="remove-btn btn btn-danger btn-circle btn-sm" id="removeBtn" type="button">-</button>                                    
                                </div>
                                <div class="col-md-1">
                                    <label class="small mb-1" for="addBtn">Add</label>
                                    <button class="add-btn btn btn-info btn-circle btn-sm" id="addBtn" type="button">+</button>                                    
                                </div>
                                
                            </div>
        `;
        $('#medicine-container').append(newMedicineField);
        var newSelectElement = $('#medicine-container').find('.select2').last();
        initializeSelect2(newSelectElement);
            });

        $('#medicine-container').on('click','.remove-btn',function(){
            //  $(this).parent().eq(1).remove()
            $(this).closest('.row').remove();
            initializeSelect2()
            })        
    })
</script>
@endpush


@endsection
{{-- @yield('scripts') --}}