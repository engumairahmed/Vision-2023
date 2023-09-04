@extends('patient.layout')

@section('title','MedCustodin-Plan Details')
@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Consultant</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                {{-- <td>Sample Data</td>
                <td>Sample Data</td>
                <td>Sample Data</td>
                <td>Sample Data</td>
                <td>Sample Data</td> --}}

                @foreach ($prescriptions as $item)
                    {{-- {{dd($plan);}} --}}
                <tr>
                    <td>{{$item->plan_name}}</td>
                    @isset($item->doctor_id)
                    <td>{{$item->name}}</td>
                    @else
                    <td>{{$item->doctor_name}}</td>
                    @endisset
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                </tr>
                <tr>
                    <th>Medical Condition</th>
                    
                </tr>

                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@endsection