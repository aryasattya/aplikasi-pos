<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'user_id',
        'quantity',
        'total_price',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
