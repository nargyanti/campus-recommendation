<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $fillable = [        
        'name',
        'pairwise_score',
        'weight',        
    ];

    public static function get_criteria_name() {
        $result = [];
        $criterias = Criteria::all();        
        foreach($criterias as $criteria) {     
            array_push($result, $criteria->name);
        }
        return $result;
    }

}
