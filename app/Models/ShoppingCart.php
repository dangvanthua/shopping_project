<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_cart';
    protected $primaryKey = 'id_shopping_cart';

    protected $fillable = [
        'id_customer',
        'id_product',
        'id_session',
        'quantity',
        'price',
        'total_price',
    ];
}
