<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\TicketsFeedback;

class FeedbacksController extends Controller
{
    //
    public function all(){

        try{
            $feedbacks = TicketsFeedback::all();
            return view('user.feedbacks',
        [
            'feedbacks' => $feedbacks,
        ]);
        }catch(QueryException $ex){ 

            return back()->withErrors([
                'message' => 'No Feedbacks Available'
            ]);
            }
        

        }
}
