<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'stars',
        'description',
        'user_id',
        'shop_id',
    ];

    public function user() {
        return $this->belongsTo(User::class , 'user_id');
     }

     public function shop() {
        return $this->belongsTo(Shops::class , 'shop_id');
     }
}
