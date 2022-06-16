<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CampusRole;
use App\Models\Recommendation;

class UtbkScore extends Model
{
    use HasFactory;
    
    protected $table = 'utbk_scores';
    protected $fillable = [
        'user_id',
        'campus_role_id',
        'biologi',
        'fisika',        
        'kimia',
        'kmb',
        'kpu',
        'kua',
        'math',
        'ppu',
    ];

    public function user() 
    {        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function campus_role() 
    {        
        return $this->belongsTo(CampusRole::class, 'campus_role_id', 'id');
    }

    public function recommendation() 
    {
        return $this->hasMany(Recommendation::class);
    }
}
