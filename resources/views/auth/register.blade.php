@extends('auth.layout')

@section('title','MedCustodian-Register')

@section('content')
    


    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url({{asset('images/register-800x600.jpg')}});background-position: center;
                    background-size: cover;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            @if (Session::has('msg'))
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Now!</h1>
                            </div>
                            <div class="text-center">
                                <div class="alert alert-success">
                                    {{Session::get('msg')}}
                                </div>
                            </div>
                            <form class="user">

                                <a href="{{route('login')}}" class="btn btn-google btn-user btn-block">
                                    <i class="fas fa-sign-in-alt"></i>Login
                                    {{-- <i class="fab fa-google fa-fw"></i> Login --}}
                                </a>
                            </form>

                             @else

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>                            
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" value="{{ old('firstName') }}" name="firstName" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"  value="{{ old('lastName') }}" name="lastName" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" value="{{ old('email') }}" name="email" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword"  name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword"  name="confirmpass" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="registerDoctor" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Register as Doctor</label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-warning btn-user btn-block" value="Register Account">
                                                  
                                <a href="{{route('google-login')}}" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <hr>
                                 
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('forgot')}}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
        
    