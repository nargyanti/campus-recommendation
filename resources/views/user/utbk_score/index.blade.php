@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <h1 class="col-9">UTBK Score</h1>
        <div class="col-3">
            <a  href="{{ route('recommendation.calculate_ranking') }}"><button class="btn btn-primary">Refresh</button></a>
            <a href="{{ route('utbk_score.edit', Auth::user()->id) }}"><button class="btn btn-primary">Edit Score</button></a>
        </div>
    </div>
    {{-- UTBK Score --}}
    <div class="my-3">          
        <table class="table text-center table-striped">
            <thead>
            <tr>
                <th class="col">No</th>                        
                <th class="col w-50">Subject</th>
                <th class="col">Score</th>                
            </tr>
            </thead>
            <tbody>
            @php $no = 1 @endphp
            @foreach($criterias as $criteria)    
                @foreach($utbk_scores as $utbk_score)                                    
                <tr>     
                    <td>{{ $no }}</td>       
                    <td class="text-capitalize">{{ $criteria->name }}</td>
                    @php $name = $criteria->name; $no++ @endphp
                    <td>{{ $utbk_score->$name }}</td>                                  
                </tr>                
                @endforeach
            @endforeach
            </tbody>
        </table>        
    </div>    
</div>
@endsection


