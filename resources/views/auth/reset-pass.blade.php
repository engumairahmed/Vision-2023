@extends('auth.layout')

@section('title','MedCustodian-Reset')

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
                                <div class="alert alert-success">
                                    {{Session::get('msg')}}
                                </div>
                            </div>                            
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-warning shadow-sm alert-dismissible fade show" role="alert">
                                    {{Session::get('error')}} 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success'))                            
                            <div class="text-center">
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Now!</h1>
                            </div>
                            <div>
                                <form class="user">
                                <a href="{{route('login')}}" class="btn btn-info btn-user btn-block font-weight-bold text-lg">
                                        Login
                                </a>
                                </form>
                            </div>
                            @else 
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create New Password!</h1>
                            </div>                            
                            
                                
                            <form class="user" method="post">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword"  name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword"  name="confirmpass" placeholder="Repeat Password">
                                </div>
                                <input type="submit" class="btn btn-warning btn-user btn-block font-weight-bolder" value="Save Changes">
                                
                                <hr>
                                 
                            </form>
                            <hr>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
        
    