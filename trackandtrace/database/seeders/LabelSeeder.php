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
            'Address_Sender' => 'Paraplulaan 12',
            'Name_Reciever' => 'Jeroen Elst',
            'Address_Reciever' => 'Eindhoven ergens 40',
            'Date' => '2022/03/04',
            'Dimensions' => '10x140x10',
            'Weight' => '4',
        ]);

        DB::table('labels')->insert([
            'TrackingNumber' => "729837414",
            'Package_name' => 'Ikea Lamp',
            'Name_Sender' => "Ikealampverkoop",
            'Address_Sender' => 'Ikeaparkeerplaats',
            'Name_Reciever' => 'Jeroen Elst',
            'Address_Reciever' => 'Eindhoven ergens 40',
            'Date' => '2022/03/04',
            'Dimensions' => '30x30x50',
            'Weight' => '2',
        ]);

        DB::table('labels')->insert([
            'TrackingNumber' => "821749871",
            'Package_name' => 'Paardenmelk',
            'Name_Sender' => "Jeroen Elst",
            'Address_Sender' => 'Eindhoven ergens 40',
            'Name_Reciever' => 'Ray Nelemans',
            'Address_Reciever' => 'Hoerenstraat roosendaal 3',
            'Date' => '2022/03/04',
            'Dimensions' => '200x200x400',
            'Weight' => '100',
        ]);
    }
}
