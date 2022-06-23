<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UtbkScore;
use DB;
use Carbon\Carbon;

class UtbkScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $utbk_scores =
        [
            [
                'id' => 1,
                'user_id' => 1,
                'biologi' => 435,
                'fisika' => 523,
                'kimia' => 732,
                'kmb' => 231,
                'kpu' => 674,
                'kua' => 985,
                'matematika' => 642,
                'ppu' => 534,                
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'biologi' => 452,
                'fisika' => 643,
                'kimia' => 533,
                'kmb' => 753,
                'kpu' => 453,
                'kua' => 765,
                'matematika' => 534,
                'ppu' => 521,                
            ],
        ];
        DB::table('utbk_scores')->insert($utbk_scores);
    }
}
