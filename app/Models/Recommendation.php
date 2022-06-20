<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UtbkScore;
use App\Models\Campus;

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

    public function utbk_score() 
    {        
        return $this->belongsTo(UtbkScore::class, 'utbk_score_id', 'id');
    }

    public function campus() 
    {        
        return $this->belongsTo(Campus::class, 'campus_id', 'id');
    }
}
