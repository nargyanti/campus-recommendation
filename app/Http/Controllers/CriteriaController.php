<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\UtbkScore;
use App\Models\PairwiseScore;
use App\Models\RandomIndex;

class CriteriaController extends Controller
{
    public function index()
    {
        //
    }
    
    public function create()
    {
        return view('developer.criteria.create');
    }

    public function store(Request $request)
    {        
        $criteria = Criteria::create(
            [
                'name' => strtolower($request->name),
                'desc' => $request->desc,
                'weight' => 0,
            ]
        );   
        
        $utbk_scores = UtbkScore::add_criteria(strtolower($request->name), $request->desc);
        
        return redirect()->route('developer.home')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $criteria = Criteria::where('id', $id)->first();            
        return view('developer.criteria.edit', ['criteria' => $criteria]);
    }

    public function update(Request $request, $id)
    {        
        $criteria = Criteria::where('id', $id)->first();        
        $utbk_scores = UtbkScore::update_criteria_name($criteria->name, strtolower($request->name));

        $criteria = $criteria->update(
            [
                'name' => strtolower($request->name),
                'desc' => $request->desc,                
            ]
        );   
        
        return redirect()->route('developer.home')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {        
        $criteria = Criteria::where('id', $id)->first();
        UtbkScore::drop_criteria($criteria->name);
        Criteria::destroy($id);
        return redirect()->route('developer.home')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function scoring() {
        $criterias = Criteria::all();
        $pairwise_scores = PairwiseScore::all();           
        $random_index = RandomIndex::all(); 
        return view('developer.criteria.scoring', ['criterias' => $criterias, 'pairwise_scores' => $pairwise_scores, 'random_index' => $random_index]);
    }

    public function calculate_criteria_weight(Request $request) {        
        $criterias = Criteria::all();      
        $pairwise_comparison_scores = Criteria::pairwise_comparison($request);
        $weight = Criteria::normalization($pairwise_comparison_scores);
        
        foreach($weight as $id => $value) {
            Criteria::where('id', '=', $id)                
                ->update([
                    'weight' => $value,
                ]);
        }        

        return redirect()->route('criteria.scoring')
            ->with('success', 'Data berhasil ditambahkan');
    }    

    public function get_consistency_ratio($pairwise_scores, $weight) {
        $consistency_score = Criteria::consistency($pairwise_scores, $weight);
        return $consistency_score;
    }
}
