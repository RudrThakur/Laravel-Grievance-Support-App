<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\TicketsFeedback;
use Illuminate\Database\QueryException;

class FeedbacksController extends Controller
{
    //
    public function all(){

        try{
            $feedbacks = TicketsFeedback::all();
            return view('user.feedbacks',
        [
            'feedbacks' => $feedbacks,
        ])->with('toast_success','Thankyou your feedback is submitted successfully');
        }catch(QueryException $ex){ 

            return back()->withErrors([
                'message' => 'No Feedbacks Available'
            ]);
            }
        

        }
}
