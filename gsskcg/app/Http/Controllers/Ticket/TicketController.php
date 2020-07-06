<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index(){
        
        return view('user.index');

    }

    public function activeTickets(){

        return view('user.active-tickets');
        
    }
}
