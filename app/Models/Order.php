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

    // thiết lập quan hệ giữa order và oder_status_history (1-n)
    public function orderStatusHistory()
    {
        return $this->hasMany(OrderStatusHistory::class, 'id_order');
    }

    // thiết lập quan hệ giữa order và payment (1-n)
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    // thiết lập quan hệ giữa customer và order (1-n)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    // thiết lập quan hệ giữa shipping_method và order (1-n)
    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, 'id_shipping_method');
    }


    // thiết lập quan hệ giữa order và product (n-n)
    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_item', 'id_product', 'id_order')
            ->withPivot('quantity', 'price', 'status');
    }
}
