<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'subtotal'
    ];

    public function order() {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    
}
