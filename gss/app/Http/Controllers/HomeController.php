<?php

namespace App\Http\Controllers;

use App\Profile;
use App\ServiceAction;
use App\Ticket;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Throwable;

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
     * @return Renderable
     */
    public function index()
    {
        $userProfile = Profile::where('user_id', auth()->user()->id)->first();

        if (!$userProfile)// If Profile is not updated
            return redirect()->to('/edit-profile');

        else {
            $allTicketsCount = Ticket::all()->count();

            $pendingTicketsCount = Ticket::where('status_id', '!=', 4)->get()->count();

            $currentMonthSpendings = ServiceAction::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->sum('fund');

            if (Ticket::count())
                $workCompleted = (Ticket::where('status_id', 4)->get()->count()) / Ticket::count() * 100;//Percentage of Completed Work
            else
                $workCompleted = 0;

            return view('user.index',

                [

                    'allTicketsCount' => $allTicketsCount,
                    'pendingTicketsCount' => $pendingTicketsCount,
                    'currentMonthSpendings' => $currentMonthSpendings,
                    'workCompleted' => $workCompleted,

                ]);
        }

    }

}

