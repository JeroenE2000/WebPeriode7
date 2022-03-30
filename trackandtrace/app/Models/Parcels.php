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
        'label_id',
        'shop_id',
        'parcel_status_id',
    ];

    public function parcel_label() {
       return $this->hasMany(Labels::class , 'id');
    }

    public function shop() {
        return $this->hasMany(Shops::class , 'id');
    }

    public function parcel_status() {
        return $this->hasMany(ParcelStatus::class , 'id');
    }

}
