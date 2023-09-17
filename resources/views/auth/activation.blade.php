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
                                    <h1 class="h4 text-gray-900 mb-4">Your account has been deactivated!</h1>
                                    <p class="p text-gray-900 mb-4">Provide your email address for account activation, this process can tak upto 48 hours.</p>
                                    @if (Session::has('msg'))
                                        <span>{{Session::get('msg')}}</span>
                                    @else
                                    @endif

                                    <form class="user" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <input type="submit" value="Request Account Activation" class="btn btn-primary btn-user btn-block">                                                           
                                        
                                    </div>
                                    
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('register')}}">Register</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">Goto Login!</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection