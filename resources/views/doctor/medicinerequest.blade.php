@extends('doctor.layout')

@section('title','MedCustodin-Medicine Info')
@section('content')
<div class="col-xl-8 col-md-6 mb-4">
    <h1 class="h3 mb-2 text-gray-800">Medications</h1>
    <p class="mb-4">Your request will be submitted to Admin and will be processed with in 48 hours.</p>
</div>
<main>
       <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
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
        <form method="post">
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        
                            <!-- Form Group (Full Name)-->
                            @csrf
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputMedicName">Medicine Name</label>
                                    <input class="form-control" id="inputMedicName" type="text" name="medic_name" placeholder="Enter Medicine name" value="{{ old('medic_name') }}">
                                </div>
                                <!-- Form Group (E-Mail address)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputDosage">Dosage</label>
                                    <input class="form-control" id="inputDosage" name="dosage" type="text" placeholder="Enter Dosage" value="{{ old('dosage') }}">
                                </div>
                            </div>
                            <!-- Form Group (address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputDescription">Description</label>
                                <textarea class="form-control" id="inputDescription" name="description"  placeholder="Enter description" value="{{ old('description') }}" rows="10" cols="30"></textarea>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('script')
    <script>
        document.getElementById('customButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function() {
    var fileName = this.value.split("\\").pop();
    document.getElementById('fileName').textContent = fileName;
});
    </script>
@endpush

@endsection