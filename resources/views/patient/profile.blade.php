@extends('patient.layout')
@section('title','Account Settings')

@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div>
                            Account Settings - Profile
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="{{route('patient.profile')}}">Profile</a>
            <a class="nav-link" href="{{route('patient.security')}}">Security</a>
        </nav>
        <hr class="mt-0 mb-4">
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
        <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('images/undraw_profile.svg')}}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <div class="custom-file">
                            <input type="file" id="fileInput" style="display: none;" accept=".jpg,.jpeg,.png">
                            <button type="button" id="customButton" class="btn btn-primary">Upload File</button>
                            <span id="fileName"></span>
                        </div>
                        {{-- <input type="file" class="btn btn-primary form-control" name="" id=""> --}}
                        {{-- <button class="btn btn-primary" type="button">Upload new image</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        
                            <!-- Form Group (Full Name)-->
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1" for="inputName">Full Name (how your name will appear to Doctor or Admin on the site)</label>
                                <input class="form-control" id="inputName" type="text" name="name" placeholder="Enter your username" value="{{ auth()->user()->name }}">
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Father name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFatherName">Father's Name</label>
                                    <input class="form-control" id="inputFatherName" type="text" name="fatherName" placeholder="Enter your Father's name" value="{{ $user->father_name }}">
                                </div>
                                <!-- Form Group (Husband name)-->
                                @php
                                    $gender=$user->pat_gender; 
                                @endphp
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputHusbandName">Husband's Name</label>                                    
                                    <input class="form-control" id="inputHusbandName" type="text" name="husbandName" placeholder="Enter your Husband's Name" value="{{ $user->husband_name }}" @php                                     
                                    if ($gender == 'Male') echo 'disabled';
                            @endphp>
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address" value="{{ auth()->user()->email }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" name="contact" placeholder="Enter your phone number" value="{{$user->pat_contact}}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control date" id="inputBirthday" type="text" name="dob" placeholder="Enter your birthday" value="{{$user->pat_DOB}}">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Gender)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputGender">Gender</label>

                                    <select class="form-control" name="gender" id="">
                                        <option value="0"@php                                     
                                            if ($gender == 'NULL') echo 'selected';
                                        @endphp>Select an option</option>
                                        <option value="Male"@php                                     
                                            if ($gender == 'Male') echo 'selected';
                                        @endphp>Male</option>
                                        <option value="Female"@php                                     
                                        if ($gender == 'Female') echo 'selected';
                                    @endphp>Female</option>
                                        <option value="Other"@php                                     
                                        if ($gender == 'Other') echo 'selected';
                                    @endphp>Other</option>

                                    </select>
                                </div>
                                <!-- Form Group (Blood Group)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBloodGroup">Blood Group</label>
                                    <input class="form-control" id="inputBloodGroup" type="text" name="bloodGroup" placeholder="Enter your Blood Group" value="{{$user->blood_group}}">
                                </div>
                            </div>
                            <!-- Form Group (address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputAddress">Address</label>
                                <input class="form-control" id="inputAddress" name="address" type="text" placeholder="Enter your address" value="{{ $user->pat_address }}">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
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