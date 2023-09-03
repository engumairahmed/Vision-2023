@extends('admin.layout')
@section('title','MedCustodian-Medication')

@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon col-auto icon-circle bg-primary">
                                <i class="fas fa-capsules fa-xs text-white"></i>
                            </div>
                            Add Medicine / Medication
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if (Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session::get('msg')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">        
        <div class="row">
            <div class="col-xl-12">
                <!-- Plan details card-->
                <div class="card mb-4">
                    <div class="card-header">Medication Details</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="row gx-3 mb-3">
                            <!-- Form Group (Plan Name)-->
                            <div class="mb-3 col-md-6">
                                <label class="small mb-1" for="inputMedicationName">Medication Name</label>
                                <input class="form-control" id="inputMedicationName" type="text" placeholder="Enter Medicine Name" value="" name="medic_name">
                            </div>
                            <!-- Form Group (Medical Condition)-->
                            <div class="col-md-6">                                
                                <label class="small mb-1" for="inputDosage">Dosage</label>
                                <input class="form-control select2" id="inputDosage" name="dosage" type="text">
                            </div>
                           
                            </div>
                                <!-- Form Group (Medicine Description)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputMedicineDescription">Details & Description</label>
                                    <textarea class="form-control" id="inputMedicineDescription" name="description" placeholder="Enter Description" cols="30" rows="10"></textarea>                                  
                                </div>                           
                            <!-- Save changes button-->
                            
                            <input class="btn btn-primary" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection