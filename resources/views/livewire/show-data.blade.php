@foreach ($medicines as $medic)
    
<tr>
    <td>{{$medic->medic_id}}</td>
    <td>{{$medic->medicine}}</td>
    <td>{{$medic->dosage}}</td>
    <td>{{$medic->description}}</td>
    <td>
        <a href="#" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
    </td>
    <td>
        <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
    </td>

</tr>

@endforeach
