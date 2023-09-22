@extends('admin.layout')
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
            <a class="nav-link active ms-0" href="{{route('admin.profile')}}">Profile</a>
            <a class="nav-link" href="{{route('admin.security')}}">Security</a>
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
            @csrf
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        @if (auth()->user()->profile_pic)
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset(auth()->user()->profile_pic)}}" alt="" style="height:15em">                            
                        @else
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('images/undraw_profile.svg')}}" alt="">                            
                        @endif
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG, Less than 3 MB, height x width must be same, and 1000x1000 max.</div>
                        <!-- Profile picture upload button-->
                        <div class="custom-file">
                            <input type="file" id="fileInput" name="image" style="display: none;" accept=".jpg,.jpeg,.png">
                            <button type="button" id="customButton" class="btn btn-primary">Select Image</button>
                            <span id="fileName"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputName">Full Name (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="inputName" type="text" placeholder="Enter your Full Name" name="name" value="{{$user->name}}">
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter your email address" value="{{$user->email}}">
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