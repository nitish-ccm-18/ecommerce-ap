<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'user_id',
        'total_price',
        'address_id',
        'coupon_id'
    ];

    // One to Many with Orderdetail Model
    public function orderdetails() {
        return $this->hasMany(Orderdetail::class);
    }
}
