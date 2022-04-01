<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelStatus extends Model
{
    use HasFactory;
    protected $table = 'parcel_status';

    public $fillable = [
        'state',
    ];

    public function parcel() {
        return $this->hasMany(Parcel::class , 'id');
    }
}
