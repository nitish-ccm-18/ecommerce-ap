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
        return $this->hasMany(Orderdetail::class,'order_id','id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    // One to Many with Orderdetail Model
    public function coupon() {
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }
}
