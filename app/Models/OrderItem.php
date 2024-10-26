<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';
    protected $primaryKey = 'id_order_item';

    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'price',
        'status',
    ];

    // thực thi cấu hình quan hệ cho orderitem và order (n-n)
    public function order()
    {
        return $this->belongsTo(Order::class,'id_order');
    }

    // // thực thi cấu hình quan hệ cho orderitem và product (n-n)
    public function product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }

}
