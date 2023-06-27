<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'line1',
        'line2',
        'city',
        'state',
        'pincode',
        'tag'
    ];

    public function getFullAddressAttribute() {
        return $this->line1.",".$this->line2.",".$this->state.",".$this->pincode."(".$this->tag.")";
    }



    public function user() {
        return $this->belongsTo(User::class);
    }
}
