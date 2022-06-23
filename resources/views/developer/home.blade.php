@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Campus Recommendation --}}
    <div class="my-3">        
        <a href="{{ route('criteria.create') }}"><button type="button" class="btn btn-primary">Add Criteria</button></a>
    </div>  
    <div class="my-3">
        <table class="table text-center">
            <thead>
            <tr>
                <th class="col">No</th>                        
                <th class="col w-50">Name</th>                
                <th class="col">Weight</th>            
            </tr>
            </thead>
            <tbody>
            @php $no = 1 @endphp
            @foreach($criterias as $criteria)                                     
                <tr>     
                    <td>{{ $no }}</td>       
                    <td class="text-capitalize">{{ $criteria->name }}</td>                    
                    <td>{{ $criteria->weight }}</td>                    
                    <td>
                        <a href="{{ route('criteria.edit', $criteria->id) }}">Edit</a>
                        <form action="{{ route('criteria.destroy', $criteria->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                    </td>                
                </tr>
                @php $no++ @endphp                
            @endforeach                   
            </tbody>
        </table>
    </div>
</div>
@endsection


