@extends('auth.layout')

@section('title','Account Activation')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url({{asset('images/verification-notice-800x600.jpeg')}});background-position: center;
                        background-size: cover;"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Your account needs to be activated!</h1>
                                    <p class="p text-gray-900 mb-4">Provide your email address & contact number, Our verification department will promptly reach out to you for account activation.</p>
                                    @if (Session::has('msg'))
                                        <span>{{Session::get('msg')}}</span>
                                    @else
                                    @endif

                                    <form class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="inputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact" class="form-control form-control-user"
                                                id="inputContact" aria-describedby="contactHelp"
                                                placeholder="Enter Contact NUmber..." required>
                                        </div>
                                        <input type="submit" value="Request Account Activation" class="btn btn-primary btn-user btn-block">                                                           
                                    </form>

                                </div>
                                
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Register</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('login')}}">Go to Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection