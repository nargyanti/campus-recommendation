<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias =
        [
            [
                'name' => 'biologi',            
                'weight' => 0,                
            ],
            [
                'name' => 'fisika',                
                'weight' => 0,                
            ],
            [
                'name' => 'kimia',                
                'weight' => 0,                
            ],
            [
                'name' => 'kmb',                
                'weight' => 0,                
            ],
            [
                'name' => 'kpu',                
                'weight' => 0,                
            ],
            [
                'name' => 'kua',                
                'weight' => 0,                
            ],
            [
                'name' => 'matematika',                
                'weight' => 0,                
            ],
            [
                'name' => 'ppu',                
                'weight' => 0,                
            ],
        ];

        DB::table('criterias')->insert($criterias);
    }
}
