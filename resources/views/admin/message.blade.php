@extends('admin.layout')
@section('title','Query-View')

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">View Message</h1>

        <!-- Message -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        
                        <tbody>
                                
                            <tr class="table-active">
                                <th>Subject</th>
                                <td>{{$message->subject}}</td>
                                <th>Name</th>
                                <td>{{$message->name}}</td>
                                <th>Email</th>
                                <td>{{$message->email}}</td>                               
                            </tr>
                            <tr><td colspan="6"></td></tr>
                            <tr>
                                <th colspan="6">Message</th>
                            </tr>
                            <tr>
                                <td colspan="6">{{$message->message}}</td>
                            </tr>
                            <tr><td colspan="6"></td></tr>
                            <tr>
                                <td>Dated</td>
                                <td colspan="5">{{$message->created_at}}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    <!-- /.container-fluid -->
@endsection