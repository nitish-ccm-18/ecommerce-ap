<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'from',
        'expiry',
        'limit',
        'usage',
        'discount_type',
        'discount_value'
    ];

    public function orders() {
        return $this->hasMany(Order::class,'coupon_id','id');
    }

    
}
