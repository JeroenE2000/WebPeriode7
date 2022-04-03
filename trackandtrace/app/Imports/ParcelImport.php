<?php

namespace App\Imports;

use App\Models\Parcels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParcelImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Parcels([
            'deliveryservice' => $row[0],
            'label_id' => $row[1],
            'shop_id'  => $row[2],
            'parcel_status_id'  => $row[3],
            'receiver_id'  => $row[4],
        ]);
    }
}
