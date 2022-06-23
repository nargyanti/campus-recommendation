<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campuses =
        [
            [
                'name' => 'Universitas Brawijaya',
                'capacity' => 96,                
            ],
            [
                'name' => 'Universitas Negeri Malang',
                'capacity' => 45,                
            ],
            [
                'name' => 'Universitas Islam Negeri Malang',
                'capacity' => 90,                
            ],
            [
                'name' => 'Universitas Negeri Surabaya',
                'capacity' => 54,                
            ],
            [
                'name' => 'Universitas Trunojoyo Madura',
                'capacity' => 100,                
            ],
            [
                'name' => 'UPN "Veteran" Jawa Timur',
                'capacity' => 100,                
            ]
        ];
        DB::table('campuses')->insert($campuses);       
    }
}
