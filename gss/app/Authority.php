<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{

    public function service_actions(){

        return $this->belongsToMany('App\ServiceAction', 'service_actions_authorities');

    }
}
