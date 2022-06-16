<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
                'capacity' => 96
            ],
            [
                'name' => 'Universitas Negeri Malang',
                'capacity' => 45
            ],
            [
                'name' => 'Universitas Islam Negeri Malang',
                'capacity' => 90
            ],
            [
                'name' => 'Universitas Negeri Surabaya',
                'capacity' => 54
            ],
            [
                'name' => 'Universitas Trunojoyo Madura',
                'capacity' => 100
            ],
            [
                'name' => 'UPN "Veteran" Jawa Timur',
                'capacity' => 100
            ]
        ];
        DB::table('campuses')->insert($campuses);

        $role =
        [
            [
                'campus_id' => 1,
                'pilihan' => 1
            ],
            [
                'campus_id' => 1,
                'pilihan' => 2
            ],
            [
                'campus_id' => 2,
                'pilihan' => 1
            ],
            [
                'campus_id' => 2,
                'pilihan' => 2
            ],
            [
                'campus_id' => 3,
                'pilihan' => 1
            ],
            [
                'campus_id' => 3,
                'pilihan' => 2
            ],
            [
                'campus_id' => 4,
                'pilihan' => 1
            ],
            [
                'campus_id' => 4,
                'pilihan' => 2
            ],
            [
                'campus_id' => 5,
                'pilihan' => 1
            ],
            [
                'campus_id' => 5,
                'pilihan' => 2
            ],
            [
                'campus_id' => 6,
                'pilihan' => 1
            ],
            [
                'campus_id' => 6,
                'pilihan' => 2
            ]
        ];
        DB::table('campus_roles')->insert($role);
    }
}
