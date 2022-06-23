@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Campus Recommendation --}}
    <div class="my-3">
        <a href="{{ route('recommendation.calculate_ranking') }}"><button class="btn btn-primary">Refresh Ranking</button></a>
    </div>
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
</div>
@endsection


