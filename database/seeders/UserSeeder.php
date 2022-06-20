<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;
use Carbon\Carbon;

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
                'id' => 1,
                'name' => 'Aisya Chalvina',
                'email' => 'aisya@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Nabilah Argyanti',
                'email' => 'nargyanti@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 99999999999,
                'name' => 'Developer',
                'email' => 'dev@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'developer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        DB::table('users')->insert($users);
    }
}
