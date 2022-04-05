<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parcel_status')->insert([
            'state' => "Aangemeld",
        ]);
        DB::table('parcel_status')->insert([
            'state' => "Uitgeprint",
        ]);
        DB::table('parcel_status')->insert([
            'state' => "Afgeleverd",
        ]);
        DB::table('parcel_status')->insert([
            'state' => "Sorteercentrum",
        ]);
        DB::table('parcel_status')->insert([
            'state' => "Onderweg",
        ]);
        DB::table('parcel_status')->insert([
            'state' => "Afgeleverd",
        ]);
    }
}
