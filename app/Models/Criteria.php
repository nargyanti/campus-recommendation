<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PairwiseScore;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $fillable = [        
        'name',
        'desc',
        'weight',        
    ];
    public $timestamps = false;    

    public static function get_criteria_name() {
        $result = [];
        $criterias = Criteria::all();        
        foreach($criterias as $criteria) {     
            array_push($result, $criteria->name);
        }
        return $result;
    }    

    public static function pairwise_comparison($request) {
        $result = [];
        $criterias = Criteria::all();     
        foreach($criterias as $index1 => $criteria1) {
            foreach($criterias as $index2 => $criteria2) {
                if ($criteria1->id === $criteria2->id) {
                    $result[$criteria1->id][$criteria2->id] = 1;
                    $result[$criteria2->id][$criteria1->id] = 1;
                    PairwiseScore::store_pairwise_comparison_to_database($criteria1->id, $criteria2->id, 1);
                    PairwiseScore::store_pairwise_comparison_to_database($criteria2->id, $criteria1->id, 1);
                } else {
                    $name = $criteria1->id . "_" . $criteria2->id;
                    $score = (int)$request->$name;
                    if($criteria2 > $criteria1) {
                        if($score > 0) {                        
                            $result[$criteria2->id][$criteria1->id] = $score * 1;
                            $result[$criteria1->id][$criteria2->id] = 1/$score;                            
                        } else {                           
                            $result[$criteria1->id][$criteria2->id] = $score * -1;
                            $result[$criteria2->id][$criteria1->id] = -1/$score;                            
                        }
                        PairwiseScore::store_pairwise_comparison_to_database($criteria1->id, $criteria2->id, $score);
                        PairwiseScore::store_pairwise_comparison_to_database($criteria2->id, $criteria1->id, $score);
                    }
                }
            }    
        }         
        return $result;
    }

    public static function synthesis($data, $criteria_id) {
        $result = [];            
        foreach($data as $score) {                 
            array_push($result, $score[$criteria_id]);
        }              
        return $result;
    }

    public static function normalization($data) {
        $normalization = [];        
        $result = [];

        // Normalization        
        foreach ($data as $criteria_id => $score) {            
            $subject_score = Criteria::synthesis($data, $criteria_id);
            $sum = array_sum($subject_score);            
            foreach($data as $id => $score) {                                
                $normalization[$id][$criteria_id] = $score[$criteria_id]/$sum;
            }
        }
        
        foreach ($normalization as $criteria_id => $score) {
            $subject_score = $normalization[$criteria_id];
            $subject_score_sum = array_sum($subject_score);
            $subject_score_length = count($subject_score);
            $line_average = $subject_score_sum / $subject_score_length;
            $result[$criteria_id] = round($line_average * 100, 2);
        }        
        return $result;  
    }

    public static function consistency($data, $weight) {
        // $preference_score = [];    
        $lambda = [];         
        $random_index = [];       
        foreach ($data as $criteria_id => $score) {
            $preference_score = [];            
            foreach($weight as $id => $value) {                                  
                $preference_score[$id] = $score[$id] * $value;
            }
            $weighted_sum = array_sum($preference_score);
            $lambda[$criteria_id] = $weighted_sum / $weight[$criteria_id];
        }
        
        $lambda_sum = array_sum($lambda);
        $lambda_length = count($lambda);
        $lambda_max = $lambda_sum / $lambda_length;

        $random_index = RandomIndex::where('criteria_amount', '=', $lambda_length)->first();
        $consistency_index = ($lambda_max - $lambda_length) / ($lambda_length - 1);
        $consistency_ratio = $consistency_index / $random_index->score;        
        return $consistency_ratio;
    }

}
