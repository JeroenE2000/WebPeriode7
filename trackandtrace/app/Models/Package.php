<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public $fillable = [

        'deliveryservice',
        'label_id',
        'parcel_status_id'
    ];
    protected $table = 'parcels';
    protected $primaryKey = 'id';
}
