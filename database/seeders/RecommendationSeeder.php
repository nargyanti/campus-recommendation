<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recommendations =
        [
            [
                'utbk_score_id' => 1,
                'campus_id' => 1,
                'option' => 1,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 1,
                'option' => 2,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 2,
                'option' => 1,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 2,
                'option' => 2,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 3,
                'option' => 1,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 3,
                'option' => 2,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 4,
                'option' => 1,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 4,
                'option' => 2,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 5,
                'option' => 1,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 5,
                'option' => 2,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 6,
                'option' => 1,
                'score' => 0,
                'ranking' => 0,
            ],
            [
                'utbk_score_id' => 1,
                'campus_id' => 6,
                'option' => 2,
                'score' => 0,
                'ranking' => 0,
            ],
        ];
        DB::table('recommendations')->insert($recommendations);
    }
}
