@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Criteria</h1>   
    <form action="{{ route('criteria.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">            
            <label for="desc" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" id="desc" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>     
</div>
@endsection
