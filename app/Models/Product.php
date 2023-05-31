<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'name', 'description', 'quantity',
        'weight', 'price', 'sale_price', 'status', 'featured','image'
    ];

    protected $casts = [
        'quantity'  =>  'integer',
        'category_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
