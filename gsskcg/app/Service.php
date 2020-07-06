<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category',
        'subcategory',
        'block',
        'department',
        'floor',
        'room',
        'assetcode',
        'quantity',
        'description',
    ];
}
