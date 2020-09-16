<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsFeedback extends Model
{
    //
    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function ticket(){

        return $this->belongsTo('App\Ticket');

    }
}
