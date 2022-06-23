@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Criteria</h1>   
    <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">            
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $criteria->name) }}" required>
        </div>
        <div class="mb-3">            
            <label for="desc" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" id="desc" value="{{ old('desc', $criteria->desc) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>     
</div>
@endsection
