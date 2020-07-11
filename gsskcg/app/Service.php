<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'ticket_id',
        'priority_id',
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

    public function priority(){

        return $this->belongsTo('App\PriorityInfo');

    }

}
