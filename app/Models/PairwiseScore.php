<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairwiseScore extends Model
{
    use HasFactory;

    protected $table = 'pairwise_scores';
    protected $fillable = [        
        'criteria1_id',
        'criteria2_id',
        'score',        
    ];
    public $timestamps = false;

    public static function store_pairwise_comparison_to_database($criteria1_id, $criteria2_id, $score) {
        $pairwise_score = PairwiseScore::where('criteria1_id', '=', $criteria1_id)
                            ->where('criteria2_id', '=', $criteria2_id)
                            ->first();
        if ($pairwise_score != null) {
            $pairwise_score->update(['score' => $score]);
        } else {
            $pairwise_score = PairwiseScore::create([
                'criteria1_id' => $criteria1_id,
                'criteria2_id' => $criteria2_id,
                'score' => $score,
            ]);
        }
    }
}
