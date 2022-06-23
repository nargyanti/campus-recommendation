<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtbkScore;
use App\Models\Recommendation;
use App\Models\Campus;
use App\Models\Criteria;
use App\Http\Controllers\RecommendationController;
use Auth;

class UtbkScoreController extends Controller
{    
    public function index()
    {
        $user = Auth::user();
        $recommendations = Recommendation::get_campus_recommendation($user);   
        $campuses = Campus::all();    
        $criterias = Criteria::all();     
        $utbk_scores = UtbkScore::where('user_id', $user->id)->get();        
        return view('user.utbk_score.index', ['recommendations' => $recommendations, 'utbk_scores' => $utbk_scores, 'criterias' => $criterias]);
    }

    public function create()
    {

    }

    public function store()
    {        
        $utbk_score = UtbkScore::create([
            'user_id' => Auth::user()->id,
        ]);
        
        $campuses = Campus::all();
        foreach ($campuses as $campus) {
            for ($i = 1; $i < 3; $i++) {
                Recommendation::create([                
                    'utbk_score_id' => $utbk_score->id,
                    'campus_id' => $campus->id,
                    'option' => $id,
                    'score' => 0,
                    'ranking' => 0,
            ]);
            }                        
        }
                
        return redirect()->route('user.home')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();                
        $criterias = Criteria::all();     
        $utbk_score = UtbkScore::where('user_id', $user->id)->first(); 
        return view('user.utbk_score.edit', ['utbk_score' => $utbk_score, 'criterias' => $criterias]);
    }

    public function update(Request $request, $id)
    {
        $utbk_score = UtbkScore::where('id', $id)->update($request->except(['_token', '_method']));        
        RecommendationController::calculate_ranking();
                        
        return redirect()->route('user.home')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        //
    }
}
