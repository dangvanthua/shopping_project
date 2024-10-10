<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_value';
    protected $primaryKey = 'id_attribute_value';

    protected $fillable = [
        'id_attribute',
        'value',
    ];
}
