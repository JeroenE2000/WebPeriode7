<?php

namespace App\Imports;

use App\Models\Parcels;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class ParcelImport implements ToCollection , WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.deliveryservice' => 'string',
            '*.label_id' => '|unique:parcels,label_id',
            '*.shop_id' => 'integer',
            '*.parcel_status_id' => 'integer',
            '*.receiver_id' => 'integer',

        ])->validate();
        foreach($rows as $row) {
             Parcels::create([
                'deliveryservice' => $row['deliveryservice'],
                'label_id' => $row['label_id'],
                'shop_id'  => $row['shop_id'],
                'parcel_status_id'  => $row['parcel_status_id'],
                'receiver_id'  => $row['receiver_id'],
            ]);
        }
    }
}
