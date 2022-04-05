<?php

namespace App\Models;

use App\Models\Shops;
use App\Models\Labels;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parcels extends Model
{
    use HasFactory , Sortable;

    public $fillable = [
        'deliveryservice',
        'label_id',
        'shop_id',
        'parcel_status_id',
        'receiver_id',
        'pickup_id'
    ];

    public $sortable = ['deliveryservice', 'label_id', 'shop_id', 'parcel_status_id', 'receiver_id'];


    public function parcel_label() {
       return $this->belongsTo(Labels::class , 'label_id');
    }

    public function shop() {
        return $this->belongsTo(Shops::class , 'shop_id');
    }

    public function parcel_status() {
        return $this->belongsTo(ParcelStatus::class , 'parcel_status_id');
    }

    public function receiver()
    {
       return $this->belongsTo(User::class , 'receiver_id');
    }

    public function pickup()
    {
       return $this->belongsTo(Pickup::class , 'pickup_id');
    }

}
