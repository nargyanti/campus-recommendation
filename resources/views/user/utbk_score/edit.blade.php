@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 text-center">Edit UTBK Score</h1>   
    <form action="{{ route('utbk_score.update', $utbk_score->id) }}" method="POST" class="row">
        @csrf
        @method('PUT')
        @foreach ($criterias as $criteria) 
            <div class="mb-3 col-6">
                @php $subject_name = $criteria->name @endphp
                <label for="{{ $criteria->biologi }}" class="form-label text-capitalize">{{ $criteria->name }}</label>
                <input type="number" class="form-control" name="{{ $criteria->name }}" id="{{ $criteria->name }}" value="{{ $utbk_score->$subject_name }}">
            </div>            
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>     
</div>
@endsection
