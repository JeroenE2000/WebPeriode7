<?php

namespace App\Imports;

use App\Models\Labels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LabelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Labels([
            'TrackingNumber' => $row[0],
            'Package_name' => $row[1],
            'Name_Sender'  => $row[2],
            'Address_Sender'  => $row[3],
            'Name_Reciever'  => $row[4],
            'Address_Reciever'  => $row[5],
            'Date'  => $row[6],
            'Dimensions'  => $row[7],
            'Weight'  => $row[8],
            'shop_id' => $row[9],
        ]);
    }
}
