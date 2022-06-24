@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.alert')
    {{-- Random Index --}}    
    <div class="my-3">        
        <table class="table text-center table-striped">
            <thead>
            <tr>
                <th class="col">Criteria</th>
                @foreach ($random_index as $ri) 
                    <th class="col">{{ $ri->criteria_amount }}</th>                                        
                @endforeach                
            </tr>
            </thead>
            <tbody>                
                <tr>
                    <td>Score</td>
                    @foreach ($random_index as $ri) 
                        <td>{{ $ri->score }}</td>
                    @endforeach
                <tr>
            </tbody>
        </table>
    </div>
    {{-- Campus Recommendation --}}    
    <div class="my-3">        
        <form action="{{ route('criteria.calculate_weight') }}" method="POST">
            @csrf
            @method('POST')
            <table class="table text-center table-striped">
                <thead>
                <tr>
                    <th class="col">Criteria 1</th>
                    <th class="col w-50">Pairwise Score</th>
                    <th class="col">Criteria 2</th>                    
                </tr>
                </thead>
                <tbody>                
                @foreach($criterias as $index1 => $criteria1)                
                    @foreach($criterias as $index2 => $criteria2)
                        @if ($criteria1->id != $criteria2->id AND $index1 < $index2)
                            <tr>                             
                                <td class="text-capitalize">{{ $criteria1->name }}</td>                        
                                <td>
                                    @for ($i = -9; $i <= 9; $i+=2)
                                        @if ($i != -1)                                                   
                                        <div class="form-check form-check-inline">                                       
                                                <input class="form-check-input" type="radio" name="{{ $criteria1->id. "_" . $criteria2->id }}" id="flexRadioDefault1" value="{{ $i }}" required                                             
                                                    @foreach($pairwise_scores as $pairwise_score)
                                                        @if ($pairwise_score->criteria1_id == $criteria1->id AND $pairwise_score->criteria2_id == $criteria2->id AND $pairwise_score->score == $i)
                                                            checked
                                                        @endif                                                
                                                    @endforeach
                                                >
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    @if ($i > 0)
                                                        {{ $i }}
                                                    @else
                                                        {{ $i * -1 }}
                                                    @endif                                                    
                                                </label>
                                        </div>
                                        @endif
                                    @endfor                            
                                </td> 
                                <td class="text-capitalize">{{ $criteria2->name }}</td>                             
                            </tr>
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>                               
            <button type="submit" class="btn btn-primary btn-primary">Submit</button>
        </form>        
    </div>
</div>
@endsection


