<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'id_customer',
        'id_shipping_method',
        'id_payment',
        'total_item',
        'status',
        'shipping_address',
        'order_date',
    ];
}
