<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'ticket_id',
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

    public function ticket(){

        return $this->belongsTo('App\Ticket');

    }
}
