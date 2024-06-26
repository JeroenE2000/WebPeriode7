<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Boris",
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => "piet",
            'email' => 'piet@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '2',
            'shop_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => "kees",
            'email' => 'kees@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '3'
        ]);

        DB::table('users')->insert([
            'name' => "jeroen",
            'email' => 'jeroen@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '4'
        ]);

        DB::table('users')->insert([
            'name' => "testaccount",
            'email' => 'pog@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '3'
        ]);
    }
}
