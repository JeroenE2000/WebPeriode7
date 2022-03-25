<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;


class Labels extends Model
{
    use HasFactory , Searchable , HasApiTokens;

    public $fillable = [
        'TrackingNumber',
        'Package_name',
        'Name_Sender',
        'Address_Sender',
        'Name_Reciever',
        'Address_Reciever',
        'Date',
        'Dimensions',
        'Weight'
    ];

    public function toSearchableArray() {
        return [
            'TrackingNumber' => $this->TrackingNumber,
            'Package_name'=> $this->Package_name,
            'Name_Sender' => $this->Name_Sender,
            'Address_Sender'=> $this->Address_Sender,
            'Name_Reciever' => $this->Name_Reciever,
            'Address_Reciever' => $this->Address_Reciever,
            'Date' => $this->Date,
            'Dimensions' => $this->Dimensions,
            'Weight' => $this->Weight
        ];
    }
}
