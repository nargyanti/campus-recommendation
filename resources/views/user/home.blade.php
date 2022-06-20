@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Campus Recommendation --}}
    <div class="my-3">
        <h1>Campus Recommendation</h1>    
        <table class="table text-center">
            <thead>
            <tr>
                <th class="col">No</th>                        
                <th class="col w-50">University</th>
                <th class="col">Option 1 Rank</th>
                <th class="col">Option 2 Rank</th>            
                <th class="col">Capacity</th>            
            </tr>
            </thead>
            <tbody>
            @php $no = 1 @endphp
            @foreach($recommendations as $recommendation)          
                @if(isset($recommendation))            
                <tr>     
                    <td>{{ $no }}</td>       
                    <td>{{ $recommendation->name }}</td>                    
                    <td>{{ $recommendation->option1_ranking }}</td>
                    <td>{{ $recommendation->option2_ranking }}</td>
                    <td>{{ $recommendation->capacity }}</td>
                    <td><a href="#">Edit</a></td>                
                </tr>
                @php $no++ @endphp
                @endif
            @endforeach                   
            </tbody>
        </table>
    </div>

    {{-- UTBK Score --}}
    <div class="my-3">
        <h1>UTBK Score</h1>    
        <table class="table text-center">
            <thead>
            <tr>
                <th class="col">No</th>                        
                <th class="col w-50">Subject</th>
                <th class="col">Score</th>
                <th class="col">Action</th>            
            </tr>
            </thead>
            <tbody>
            @php $no = 1 @endphp
            @foreach($criterias as $criteria)    
                @foreach($utbk_scores as $utbk_score)                                    
                <tr>     
                    <td>{{ $no }}</td>       
                    <td>{{ $criteria->name }}</td>
                    @php $name = Str::lower($criteria->name); $no++ @endphp
                    <td>{{ $utbk_score->$name }}</td>
                    <td><a href="#">Edit</a></td>                
                </tr>                
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>    
</div>
@endsection


