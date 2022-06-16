<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UtbkScore;
use App\Models\Campus;

class CampusRole extends Model
{
    use HasFactory;

    protected $table = 'utbk_scores';
    protected $fillable = [        
        'campus_id',
        'pilihan',        
    ];

    public function utbk_score() 
    {
        return $this->hasMany(UtbkScore::class);
    }

    public function campus() 
    {        
        return $this->belongsTo(Campus::class, 'campus_id', 'id');
    }
}
