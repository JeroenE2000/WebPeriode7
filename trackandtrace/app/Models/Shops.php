<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    public function parcel() {
        return $this->belongsTo(Parcel::class , 'shop_id');
    }
}
