<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtbkScore;
use App\Models\Recommendation;
use App\Models\Criteria;
use App\Models\Campus;

class RecommendationController extends Controller
{
    public static function calculate_ranking() {
        $campuses = Campus::all();
        foreach($campuses as $campus) {
            RecommendationController::topsis($campus->id, 1);
            RecommendationController::topsis($campus->id, 2);
        }                        
        return redirect()->route('user.home');
    }    

    public static function topsis($campus_id, $option) {
        $utbk_scores = UtbkScore::append_utbk_scoring_to_array($campus_id, $option);
        $normalization_scores = UtbkScore::get_normalization_score($utbk_scores);
        $weighted_scores = UtbkScore::get_weighted_score($normalization_scores);
        $alternative_scores = UtbkScore::get_alternative_score($weighted_scores);
        $distance_scores = UtbkScore::get_distance_score($weighted_scores, $alternative_scores);
        $preference_scores = UtbkScore::get_preference_score($distance_scores);        

        $recommendations = Recommendation::with('utbk_score')->where('campus_id', '=', $campus_id)->where('option', '=', $option)->get();

        // Add score to database
        foreach($recommendations as $recommendation) {
            Recommendation::where('campus_id', '=', $campus_id)
                ->where('option', '=', $option)
                ->where('utbk_score_id', '=', $recommendation->utbk_score_id)
                ->update([
                    'score' => $preference_scores[$recommendation->utbk_score_id],
                ]);
        }
        
        // Add ranking to database
        $recommendations = Recommendation::where('campus_id', '=', $campus_id)->where('option', '=', $option)->orderBy('score', 'DESC')->get();        
        foreach($recommendations as $key => $recommendation) {                        
            Recommendation::where('id', '=', $recommendation->id)                
                ->update([
                    'ranking' => $key + 1,
                ]);
        }
    }
}
