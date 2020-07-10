<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'type_id',
        'authority_id',
        'status',
        'worker',
        'priority_id',
        'fund'
    ];   
    
    public function user(){
        
        return $this->belongsTo('App\User');
        
    }

    public function type(){
        
        return $this->belongsTo('App\TicketInfo');

    }

    public function priority(){
        
        return $this->belongsTo('App\PriorityInfo');

    }

    public function authority(){
        
        return $this->belongsTo('App\AuthorityInfo');
        
    }
}
