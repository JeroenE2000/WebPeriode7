<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'name' => "Parapluhandel de Regen",
            'streetname' => 'paraplulaan',
            'streetnumber' => "12",
            'postalcode' => '6523PL',
            'KVKnumber' => '12345678',
        ]);

        DB::table('shops')->insert([
            'name' => "Ikealampverkoop de Lichtjes",
            'streetname' => 'gestolengoederenlaan',
            'streetnumber' => "42",
            'postalcode' => '9823IK',
            'KVKnumber' => '87654321',
        ]);

        DB::table('shops')->insert([
            'name' => "Paardenmelkboer Elst",
            'streetname' => 'wijmelkenpaardenlaan',
            'streetnumber' => "69",
            'postalcode' => '7777PM',
            'KVKnumber' => '12543543',
        ]);
    }
}
