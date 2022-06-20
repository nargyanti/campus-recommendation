<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Recommendation;

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

    public function user() 
    {        
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function recommendation() 
    {
        return $this->hasMany(Recommendation::class);
    }
}
