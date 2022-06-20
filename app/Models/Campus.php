<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recommendation;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'campuses';    
    protected $fillable = [        
        'name',
        'capacity',        
    ];

    public function recommendation() 
    {
        return $this->hasMany(Recommendation::class);
    }    
}
