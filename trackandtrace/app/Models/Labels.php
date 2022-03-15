<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labels extends Model
{
    use HasFactory;

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
}
