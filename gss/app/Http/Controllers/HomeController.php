<?php

namespace App\Http\Controllers;

use App\ServiceAction;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $allTicketsCount = Ticket::all()->count();

        $pendingTicketsCount = Ticket::where('status_id', '!=', 4)->get()->count();

        $currentMonthSpendings = ServiceAction::whereYear('created_at', Carbon::now()->year)
                                                ->whereMonth('created_at', Carbon::now()->month)
                                                ->sum('fund');

        $workCompleted = (Ticket::where('status_id', 4)->get()->count())/Ticket::count() * 100;//Percentage of Completed Work

        return view('user.index',

            [

                'allTicketsCount' => $allTicketsCount,
                'pendingTicketsCount' => $pendingTicketsCount,
                'currentMonthSpendings' => $currentMonthSpendings,
                'workCompleted' => $workCompleted,

            ]);
    }
}
