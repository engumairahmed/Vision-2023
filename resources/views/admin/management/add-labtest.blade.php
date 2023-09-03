@extends('admin.layout')
@section('title','MedCustodian-Add Test')

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
                            Add Medical Test
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
                    <div class="card-header">Test Details</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <!-- Form Group (Plan Name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputTestName">Test Name</label>
                                <input class="form-control" id="inputTestName" type="text" placeholder="Enter Medical Test Name" value="" name="test_name">
                            </div>
                           
                                <!-- Form Group (Medicine Description)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputTestDescription">Details & Description</label>
                                    <textarea class="form-control" id="inputTestDescription" name="description" placeholder="Enter Description" cols="30" rows="10"></textarea>                                  
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
