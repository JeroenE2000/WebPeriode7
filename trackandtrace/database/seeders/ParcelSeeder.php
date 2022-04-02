<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parcels')->insert([
            'deliveryservice' => "PostNL",
            'labels_id' => '1',
            'shop_id' => "1",
            'parcel_status_id' => '5',
        ]);

        DB::table('parcels')->insert([
            'deliveryservice' => "DHL",
            'labels_id' => '2',
            'shop_id' => "2",
            'parcel_status_id' => '5',
        ]);

        DB::table('parcels')->insert([
            'deliveryservice' => "Waardetransport Extra Beveiligd",
            'labels_id' => '3',
            'shop_id' => "3",
            'parcel_status_id' => '6',
        ]);
    }
}
