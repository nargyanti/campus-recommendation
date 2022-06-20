<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UtbkScore;

class UtbkScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // UtbkScore::truncate();
  
        // $csvFile = fopen(base_path("database/data/utbk_score.csv"), "r");
  
        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         UtbkScore::create([
        //             'user_id',
        // 'campus_role_id',
        // 'biologi',
        // 'fisika',        
        // 'kimia',
        // 'kmb',
        // 'kpu',
        // 'kua',
        // 'math',
        // 'ppu',
        //             "user_id" => $data['0'],
        //             "campus_role_id" => $data['1']
        //         ]);    
        //     }
        //     $firstline = false;
        // }
   
        // fclose($csvFile);
    }
}
