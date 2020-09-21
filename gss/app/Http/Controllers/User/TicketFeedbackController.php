<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\TicketsFeedback;
use Illuminate\Database\QueryException;

class TicketFeedbackController extends Controller
{
    public function create(){

        if (auth()->user()->can('feedback-permission')){

        $tickets = Ticket::with('type')->with('user')->where('user_id',auth()->user()->id)
                                        ->where('status_id',4)->get();
        return view('user.ticket-feedback',[ 'tickets' => $tickets ]);
    }else{
        return view('user.permission-error-page');
    }
    }


    public function store(){

        $this->validate(request(), [
            'ticketid' => 'required',
            'rating' => 'required',
            'message' => 'required',
        ],
            [
                'ticketid.required' => 'Ticket ID is required',
                'rating.required' => 'Rating is required',
                'message.required' => 'Message is required',
            ]
        );

        try { 
            $ticketsFeedback = new TicketsFeedback();
            $ticketsFeedback->user_id = auth()->user()->id;
            $ticketsFeedback->ticket_id = request('ticketid');
            $factors = request('factors');
    
            foreach($factors as $factor){
               
                if($factor=='admin'){
                    $ticketsFeedback->admin=true;
                }
                
                if($factor=='webapp'){
                    $ticketsFeedback->web_app=true;
                }
    
                if($factor=='work'){
                    $ticketsFeedback->work=true;
                }
                if($factor=='management'){
                    $ticketsFeedback->management=true;
                }
            }
    
            $ticketsFeedback->message=request('message');
            $ticketsFeedback->rating=request('rating');
            $ticketsFeedback->save();
            session()->flash('message','Feedback Recorded Successfully');
            return redirect()->to('/ticket-feedback');
            
           } catch(QueryException $ex){ 

            return back()->withErrors([
                'message' => 'Feedback Already Exists'
            ]);
             
           }

        

        

    }
}
