<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Recommendation;
use App\Models\UtbkScore;
use App\Models\Campus;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexUser()
    {
        $user = Auth::user();
        $recommendations = Recommendation::get_campus_recommendation($user);   
        $campuses = Campus::all();    
        $criterias = Criteria::all();     
        $utbk_scores = UtbkScore::where('user_id', $user->id)->get();        
        return view('user.home', ['recommendations' => $recommendations, 'utbk_scores' => $utbk_scores, 'criterias' => $criterias]);
    }

    public function indexDeveloper()
    {
        $criterias = Criteria::all();
        return view('developer.home', ['criterias' => $criterias]);
    }
}
