<?php

namespace App\Imports;

use App\Models\Labels;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class LabelImport implements ToCollection , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.trackingnumber' => 'integer|unique:labels,trackingnumber',
            '*.package_name' => 'string',
            '*.name_sender' => 'string',
            '*.address_sender' => 'regex:/^(?:NL-)?(\d{4})\s*([A-Z]{2})$/i',
            '*.name_reciever' => '',
            '*.address_reciever' => 'regex:/^(?:NL-)?(\d{4})\s*([A-Z]{2})$/i',
            '*.dimensions' => '',
            '*.weight' => 'integer',
            '*.shop_id' => 'integer',
        ])->validate();
        foreach($rows as $row) {
            Labels::create([
                'TrackingNumber' => $row['trackingnumber'],
                'Package_name' => $row['package_name'],
                'Name_Sender'  => $row['name_sender'],
                'Address_Sender'  => $row['address_sender'],
                'Name_Reciever'  => $row['name_reciever'],
                'Address_Reciever'  => $row['address_reciever'],
                'Date'  => $row['date'],
                'Dimensions'  => $row['dimensions'],
                'Weight'  => $row['weight'],
                'shop_id' => $row['shop_id'],
            ]);
        }
    }
}
