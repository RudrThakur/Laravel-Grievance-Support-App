<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function type(){

        return $this->belongsTo('App\TicketInfo');

    }

    public function authority(){

        return $this->belongsTo('App\Authority');

    }

    public function status(){

        return $this->belongsTo('App\StatusInfo');

    }

}
