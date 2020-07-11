<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceAction extends Model
{
    protected $fillable = [
        'service_id',
        'worker_id',
        'approvals',
        'fund',
    ];
}
