<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart'; 
    protected $fillable = [
        'product_id',
        'quantity',
        'user_id', 
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
