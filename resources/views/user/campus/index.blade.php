@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Dropdown --}}    
    <div class="row">                
        <div class="col-9">
            <h1 class="h1">University Ranking</h1>            
        </div>
        <div class="dropdown col-3 mt-5">            
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">            
                    {{ $rankings[1]->campus->name }}            
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($campuses as $campus)
                    <li><a class="dropdown-item" href="{{route('campus.index', $campus->id)}}">{{$campus->name}}</a></li>
                @endforeach        
            </ul>
        </div>
    </div>

    {{-- Table --}}
    <div class="mt-3">
        <ul class="nav nav-tabs row justify-content-center" id="myTab" role="tablist">
            <li class="nav-item col-2 text-center" role="presentation">
                <button class="nav-link active" id="option1-tab" data-bs-toggle="tab" data-bs-target="#option1-tab-pane" type="button" role="tab" aria-controls="option1-tab-pane" aria-selected="true">Option 1</button>
            </li>
            <li class="nav-item col-2" role="presentation">
                <button class="nav-link" id="option2-tab" data-bs-toggle="tab" data-bs-target="#option2-tab-pane" type="button" role="tab" aria-controls="option2-tab-pane" aria-selected="false">Option 2</button>
            </li>        
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="option1-tab-pane" role="tabpanel" aria-labelledby="option1-tab" tabindex="0">
                @include('user.campus.list', ['option' => 1])
            </div>
            <div class="tab-pane fade" id="option2-tab-pane" role="tabpanel" aria-labelledby="option2-tab" tabindex="0">
                @include('user.campus.list', ['option' => 2])
            </div>        
        </div>
    </div>    
</div>
@endsection
