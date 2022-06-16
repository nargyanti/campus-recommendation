<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
        [
            [
                'name' => 'Aisya Chalvina',
                'email' => 'aisya@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Nabilah Argyanti',
                'email' => 'nargyanti@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
