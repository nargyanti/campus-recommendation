<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtbkScore;

class UtbkScoreController extends Controller
{    
    public function index()
    {
        //
    }

    public function create()
    {
        return view('user.utbk_score.create');
    }

    public function store(Request $request)
    {
        $utbk_score = UtbkScore::create(request()->all());
        
        return redirect()->route('user.home')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
