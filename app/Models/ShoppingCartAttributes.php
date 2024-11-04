<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartAttributes extends Model
{
    use HasFactory;
    // Khai báo tên bảng
    protected $table = 'shopping_cart_attributes';

    // Các thuộc tính được phép gán
    protected $fillable = [
        'id_shopping_cart',
        'id_attribute',
        'id_attribute_value'
    ];

     // Thiết lập mối quan hệ với ShoppingCart
     public function shoppingCart()
     {
         return $this->belongsTo(ShoppingCart::class, 'id_shopping_cart');
     }

     // Thiết lập mối quan hệ với Attribute
     public function attribute()
     {
         return $this->belongsTo(Attribute::class, 'id_attribute');
     }

     // Thiết lập mối quan hệ với AttributeValue
     public function attributeValue()
     {
         return $this->belongsTo(AttributeValue::class, 'id_attribute_value');
     }
}
