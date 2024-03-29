<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceAction extends Model
{
    protected $guarded = [];

    public function authorities(){

        return $this->belongsToMany('App\Authority', 'service_actions_authorities');

    }

    public function service(){

        return $this->belongsTo('App\Service', 'service_id');

    }

    public function worker(){

        return $this->belongsTo('App\User', 'worker_id');

    }
}
