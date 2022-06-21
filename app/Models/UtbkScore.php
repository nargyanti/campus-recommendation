<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Recommendation;
use App\Models\Criteria;
use Auth;

class UtbkScore extends Model
{
    use HasFactory;
    
    protected $table = 'utbk_scores';
    protected $fillable = [
        'user_id',        
        'biologi',
        'fisika',        
        'kimia',
        'kmb',
        'kpu',
        'kua',
        'matematika',
        'ppu',
    ];

    public static function append_utbk_scoring_to_array($campus_id, $option) {
        $alternatives = Recommendation::with('utbk_score')->where('campus_id', '=', $campus_id)->where('option', '=', $option)->get();
        $criterias = Criteria::get_criteria_name();
        $result = [];
        foreach ($criterias as $criteria) {             
            foreach ($alternatives as $alternative) {    
                $utbk_score = $alternative->utbk_score;                                                
                $result[$utbk_score->id][$criteria] = $utbk_score->$criteria;
            }     
        }             
        return $result;  
    }

    public static function get_normalization_score($data) {
        $result = [];        
        $criterias = Criteria::get_criteria_name();
        
        // Get the power of two
        $power_of_two = [];
        foreach ($criterias as $criteria) {                         
            foreach($data as $utbk_score_id => $utbk_score) {     
                $power_of_two[$utbk_score_id][$criteria] = pow($utbk_score[$criteria], 2);
            }
        }   

        // Normalization
        foreach ($criterias as $criteria) {            
            $subject_score = UtbkScore::get_all_score_each_subject($power_of_two, $criteria);
            $sum = array_sum($subject_score);
            foreach($data as $utbk_score_id => $utbk_score) {                                
                $result[$utbk_score_id][$criteria] = $utbk_score[$criteria]/(sqrt($sum));
            }
        }        
        return $result;        
    }

    public static function get_all_score_each_subject($data, $criteria) {
        $result = [];            
        foreach($data as $utbk_score) {     
            array_push($result, $utbk_score[$criteria]);
        }
        return $result;
    }
    
    public static function get_weighted_score($data) {
        $result = [];
        $criterias = Criteria::all();
                
        foreach ($criterias as $criteria) {                         
            $subject = $criteria->name;
            $weight = $criteria->weight;
            foreach($data as $utbk_score_id => $utbk_score) {     
                $result[$utbk_score_id][$subject] = $utbk_score[$subject] * $weight;
            }
        }           
        return $result;
    }

    public static function get_alternative_score($data) {
        $result = [];
        $criterias = Criteria::get_criteria_name();                     
        foreach ($criterias as $criteria) {             
            $subject_score = UtbkScore::get_all_score_each_subject($data, $criteria);
            $subject_a_plus = max($subject_score);
            $subject_a_min = min($subject_score);
            
            $result[$criteria]['A+'] = $subject_a_plus;
            $result[$criteria]['A-'] = $subject_a_min;            
        }           
        return $result;
    }

    public static function get_distance_score($data, $alternative_score) {
        $result = [];        
        $criterias = Criteria::get_criteria_name();

        $point_plus = [];
        $point_min = [];
        foreach ($criterias as $criteria) {                                
            foreach($data as $utbk_score_id => $utbk_score) {     
                $point_plus[$utbk_score_id][$criteria] =  pow($alternative_score[$criteria]['A+'] - $utbk_score[$criteria], 2);
                $point_min[$utbk_score_id][$criteria] =  pow($alternative_score[$criteria]['A-'] - $utbk_score[$criteria], 2);
            }                                 
        }    
        
        foreach ($criterias as $criteria) {                                
            foreach($data as $utbk_score_id => $utbk_score) {                 
                $result[$utbk_score_id]['D+'] = sqrt(array_sum($point_plus[$utbk_score_id]));
                $result[$utbk_score_id]['D-'] = sqrt(array_sum($point_min[$utbk_score_id]));
            }   
        }           
        
        return $result;
    }

    public static function get_preference_score($data) {
        $result = [];
        foreach($data as $utbk_score_id => $distance_score) {
            $result[$utbk_score_id] = $distance_score['D-'] / ($distance_score['D+'] + $distance_score['D-']);            
        }   
        return $result;
    }

    // Relations
    public function user() 
    {        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function recommendation() 
    {
        return $this->hasMany(Recommendation::class);
    }
}
