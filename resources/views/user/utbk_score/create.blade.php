@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add UTBK Score</h1>   
    <form action="{{ route('utbk_score.store') }}">
        @csrf
        <div class="mb-3">
            <label for="biologi" class="form-label">Biologi</label>
            <input type="number" class="form-control" name="biologi" id="biologi">
        </div>
        <div class="mb-3">
            <label for="fisika" class="form-label">Fisika</label>
            <input type="number" class="form-control" name="fisika" id="fisika">
        </div>
        <div class="mb-3">
            <label for="kimia" class="form-label">Kimia</label>
            <input type="number" class="form-control" name="kimia" id="kimia">
        </div>
        <div class="mb-3">
            <label for="kmb" class="form-label">KMB</label>
            <input type="number" class="form-control" name="kmb" id="kmb">
        </div>
        <div class="mb-3">
            <label for="kpu" class="form-label">KPU</label>
            <input type="number" class="form-control" name="kpu" id="kpu">
        </div>
        <div class="mb-3">
            <label for="kua" class="form-label">KUA</label>
            <input type="number" class="form-control" name="kua" id="kua">
        </div>
        <div class="mb-3">
            <label for="matematika" class="form-label">Matematika</label>
            <input type="number" class="form-control" name="matematika" id="matematika">
        </div>
        <div class="mb-3">
            <label for="ppu" class="form-label">PPU</label>
            <input type="number" class="form-control" name="ppu" id="ppu">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>     
</div>
@endsection
