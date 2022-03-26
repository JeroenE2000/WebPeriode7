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
        DB::table('parcel_statuses')->insert([
            'state' => "Aangemeld",
        ]);
        DB::table('parcel_statuses')->insert([
            'state' => "Uitgeprint",
        ]);
        DB::table('parcel_statuses')->insert([
            'state' => "Afgeleverd",
        ]);
        DB::table('parcel_statuses')->insert([
            'state' => "Sorteercentrum",
        ]);
        DB::table('parcel_statuses')->insert([
            'state' => "Onderweg",
        ]);
        DB::table('parcel_statuses')->insert([
            'state' => "Afgeleverd",
        ]);
    }
}
