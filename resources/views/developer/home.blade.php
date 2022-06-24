@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Campus Recommendation --}}
    <div class="my-3 row">        
        <h1 class="col-10">Criteria</h1>
        <a class="col-2" href="{{ route('criteria.create') }}"><button type="button" class="btn btn-primary">Add Criteria</button></a>
    </div>  
    <div class="my-3">
        <table class="table text-center">
            <thead>
            <tr>
                <th class="col">No</th>                        
                <th class="col w-50">Name</th>                
                <th class="col">Weight</th>            
                <th class="col">Action</th>            
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
                        <div class="btn-group">
                            <a href="{{ route('criteria.edit', $criteria->id) }}"><button class="btn btn-primary mx-2" style="font-size: 14px">Edit</button></a>
                            <form action="{{ route('criteria.destroy', $criteria->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="font-size: 14px">Delete</button>
                            </form>
                        </div>                        
                    </td>                
                </tr>
                @php $no++ @endphp                
            @endforeach                   
            </tbody>
        </table>
    </div>
</div>
@endsection


