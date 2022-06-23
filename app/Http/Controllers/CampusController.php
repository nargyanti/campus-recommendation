<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\Recommendation;
use App\Models\Criteria;

class CampusController extends Controller
{
    public function index($campus_id = 1)
    {
        $campuses = Campus::all();
        $rankings = Recommendation::with('utbk_score', 'campus')
                        ->where('campus_id', $campus_id)
                        ->orderBy('ranking', 'ASC')
                        ->get();
        $criterias = Criteria::all();
        return view('user.campus.index', ['rankings' => $rankings, 'campuses' => $campuses, 'criterias' => $criterias]);
    }   
}
