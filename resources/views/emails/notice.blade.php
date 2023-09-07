@extends('auth.layout')

@section('title','MedCustodian-Login')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url({{asset('images/login-800x600.jpg')}});background-position: center;
                        background-size: cover;"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Your account needs to be Activated!</h1>
                                    <p class="p text-gray-900 mb-4">Follow the link you recieved in your email for account activation</p>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Register</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('login')}}">Login!</a>
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