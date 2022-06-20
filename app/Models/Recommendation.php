<?php

namespace App\Models;

use App\Models\Campus;
use App\Models\UtbkScore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class Recommendation extends Model
{
    use HasFactory;

    protected $table = 'recommendations';    
    protected $fillable = [        
        'utbk_score_id',
        'campus_id',    
        'option',
        'score',
        'ranking',        
    ];

    public static function get_campus_recommendation($user) {
        $recommendations = DB::table('recommendations')
            ->select('utbk_scores.user_id', 'recommendations.campus_id', 'campuses.name', 'campuses.capacity', 
                DB::raw('(SELECT re.ranking FROM recommendations re WHERE re.option = 1 AND recommendations.campus_id = re.campus_id) as option1_ranking'), 
                DB::raw('(SELECT re.ranking FROM recommendations re WHERE re.option = 2 AND recommendations.campus_id = re.campus_id) as option2_ranking'), )
            ->join('campuses', 'recommendations.campus_id', '=', 'campuses.id')
            ->join('utbk_scores', 'utbk_scores.id', '=', 'recommendations.utbk_score_id')            
            ->where('utbk_scores.user_id', '=', $user->id)
            ->groupBy('recommendations.campus_id')
            ->get();     
        return $recommendations;
    }

    public function utbk_score() {        
        return $this->belongsTo(UtbkScore::class, 'utbk_score_id', 'id');
    }

    public function campus() {        
        return $this->belongsTo(Campus::class, 'campus_id', 'id');
    }    
}
