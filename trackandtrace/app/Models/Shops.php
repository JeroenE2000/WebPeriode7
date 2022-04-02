<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;


    public $fillable = [
        'name',
        'streetname',
        'streetnumber',
        'postalcode',
        'KVKnumber',
    ];

    public function parcel() {
        return $this->hasMany(Parcel::class , 'id');
    }

    public function user() {
        return $this->hasMany(User::class , 'id');
    }

    public function label()
    {
        return $this->belongsTo(Labels::class , 'label_id');
    }

    public function reviews() {
        return $this->belongsToMany(Review::class , 'id');
    }
}
