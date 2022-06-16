<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CampusRole;

class Recommendation extends Model
{
    use HasFactory;

    protected $table = 'recommendations';    
    protected $fillable = [        
        'campus_role_id',        
        'score',
        'ranking',        
    ];

    public function campus_role() 
    {        
        return $this->belongsTo(CampusRole::class, 'campus_role_id', 'id');
    }
}
