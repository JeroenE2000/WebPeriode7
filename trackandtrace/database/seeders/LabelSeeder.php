<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            'TrackingNumber' => "154564312",
            'Package_name' => 'Paraplustok',
            'Name_Sender' => "Parapluhandel",
            'Address_Sender' => '4567 KL',
            'Name_Reciever' => 'Jeroen Elst',
            'Address_Reciever' => '5656 JK',
            'Date' => '2022/03/04',
            'Dimensions' => '10x140x10',
            'Weight' => '4',
            'shop_id' => '1',
        ]);

        DB::table('labels')->insert([
            'TrackingNumber' => "729837414",
            'Package_name' => 'Ikea Lamp',
            'Name_Sender' => "Ikealampverkoop",
            'Address_Sender' => '6789 KL',
            'Name_Reciever' => 'Jeroen Elst',
            'Address_Reciever' => '3245 KL',
            'Date' => '2022/03/04',
            'Dimensions' => '30x30x50',
            'Weight' => '2',
            'shop_id' => '2',
        ]);

        DB::table('labels')->insert([
            'TrackingNumber' => "821749871",
            'Package_name' => 'Paardenmelk',
            'Name_Sender' => "Jeroen Elst",
            'Address_Sender' => '4567 JK',
            'Name_Reciever' => 'Ray Nelemans',
            'Address_Reciever' => '1223 RO',
            'Date' => '2022/03/04',
            'Dimensions' => '200x200x400',
            'Weight' => '100',
            'shop_id' => '3',
        ]);
    }
}
