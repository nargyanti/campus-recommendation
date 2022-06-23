<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RandomIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random_index =
        [
            [
                'criteria_amount' => 1,
                'score' => 0                
            ],
            [
                'criteria_amount' => 2,
                'score' => 0                
            ],
            [
                'criteria_amount' => 3,
                'score' => 0.58      
            ],
            [
                'criteria_amount' => 4,
                'score' => 0.90      
            ],
            [
                'criteria_amount' => 5,
                'score' => 1.12      
            ],
            [
                'criteria_amount' => 6,
                'score' => 1.24      
            ],
            [
                'criteria_amount' => 7,
                'score' => 1.32      
            ],
            [
                'criteria_amount' => 8,
                'score' => 1.41      
            ],
            [
                'criteria_amount' => 9,
                'score' => 1.45      
            ],
            [
                'criteria_amount' => 10,
                'score' => 1.49
            ],
            [
                'criteria_amount' => 11,
                'score' => 1.51
            ],
            [
                'criteria_amount' => 12,
                'score' => 1.48
            ],
            [
                'criteria_amount' => 13,
                'score' => 1.56
            ],
            [
                'criteria_amount' => 14,
                'score' => 1.57
            ],
            [
                'criteria_amount' => 15,
                'score' => 1.58
            ],
        ];
        DB::table('random_index')->insert($random_index);
    }
}
