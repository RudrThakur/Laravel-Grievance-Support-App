<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'holder',
        'status',
        'worker',
        'priority',
        'fund'
    ];   
    
    public function user(){
        
        return $this->belongsTo('App\User');
        
    }
}