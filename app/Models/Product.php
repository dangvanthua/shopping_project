<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'id_category',
        'name',
        'describe',
        'price',
        'images',
        'hot',
        'is_active',
        'sale',
        'number_of_purchases',
        'quantity_available',
    ];
}
