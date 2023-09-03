@extends('patient.layout')

@section('title','MedCustodin-Plan Details')
@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Consultant</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <td>Sample Data</td>
                <td>Sample Data</td>
                <td>Sample Data</td>
                <td>Sample Data</td>
                <td>Sample Data</td>

                {{-- @foreach ($result as $item)
                    
                <tr>
                    <td>{{$item->plan_name}}</td>
                    @isset($item->doctor_id)
                    <td>{{$item->name}}</td>
                    @endisset
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td><a href="{{ route('user.plan', ['id' => $item->presc_id]) }}" class="btn btn-circle btn-sm btn-info"><i class="fas fa-info-circle"></i></a></td>
                </tr>

                @endforeach --}}
               
            </tbody>
        </table>
    </div>
</div>
@endsection