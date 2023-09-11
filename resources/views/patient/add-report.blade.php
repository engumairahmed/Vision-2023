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
                            <div class="page-header-icon col-auto icon-circle bg-info">
                                <i class="fas fa-file-medical fa-xs text-white"></i>
                            </div>
                            Upload Medical Reports
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
    <div class="container-xl px-4 mt-4">        
        <div class="row">
            <div class="col-xl-12">
                <!-- Plan details card-->
                <div class="card mb-4">
                    <div class="card-header">Select Prescription</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Form Group (Plan Name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputTestName">Prescription</label>
                                <select name="prescription" class="form-control" id="inputTestName">
                                    @foreach ($prescription as $item)
                                        
                                         <option value="{{$item->presc_id}}">{{$item->plan_name}}</option>

                                    @endforeach
                                </select>
                            </div>
                           
                                <!-- Form Group (Medicine Description)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="file">Add Files</label>
                                    <input class="form-control" type="file" name="report" id="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" multiple>
                                </div>                           
                            <!-- Save changes button-->
                            
                            <input class="btn btn-info" type="submit" value="Upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection