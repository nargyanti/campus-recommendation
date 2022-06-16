@extends('layouts.app')

@section('content')
<div class="container">
    <h1>UTBK Score</h1>    
    <table class="table">
        <thead>
          <tr>            
            <th scope="col">Biologi</th>
            <th scope="col">Fisika</th>
            <th scope="col">Kimia</th>
            <th scope="col">KMB</th>
            <th scope="col">KPU</th>
            <th scope="col">KUA</th>
            <th scope="col">Math</th>
            <th scope="col">PPU</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $utbk_score->biologi }}</td>
            <td>{{ $utbk_score->fisika }}</td>
            <td>{{ $utbk_score->kimia }}</td>
            <td>{{ $utbk_score->kmb }}</td>
            <td>{{ $utbk_score->kpu }}</td>
            <td>{{ $utbk_score->kua }}</td>
            <td>{{ $utbk_score->mat }}</td>
            <td>{{ $utbk_score->ppu }}</td>
          </tr>          
        </tbody>
      </table>
</div>
@endsection
