<?php

namespace App\Models;

use App\Models\Shops;
use App\Models\Labels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parcels extends Model
{
    use HasFactory;

    public $fillable = [
        'deliveryservice',
        'labels_id',
        'shop_id',
        'parcel_status_id',
    ];

    public function parcel_label() {
       return $this->belongsTo(Labels::class , 'labels_id');
    }

    public function shop() {
        return $this->belongsTo(Shops::class , 'shop_id');
    }

    public function parcel_status() {
        return $this->belongsTo(ParcelStatus::class , 'parcel_status_id');
    }

}
