@extends('doctor.layout')
@section('title','Account Security')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div>
                            Account Settings - Security
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if ($errors->any())                                    
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
        {{Session::get('success')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
        {{Session::get('error')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link ms-0" href="{{route('doctor.profile')}}">Profile</a>
            <a class="nav-link active" href="{{route('doctor.security')}}">Security</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="col-lg-6">
            <!-- Change password card-->
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <!-- Form Group (current password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="currentPassword">Current Password</label>
                            <input class="form-control" id="currentPassword" name="oldpass" type="password" placeholder="Enter current password">
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="newPassword">New Password</label>
                            <input class="form-control" id="newPassword" name="pass" type="password" placeholder="Enter new password">
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                            <input class="form-control" id="confirmPassword" name="cpass" type="password" placeholder="Confirm new password">
                        </div>
                        <button type="submit" class="btn btn-primary" type="button">Save</button>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</main>

@endsection