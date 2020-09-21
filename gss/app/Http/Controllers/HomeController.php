<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Role;
use App\Service;
use App\ServiceAction;
use App\Ticket;
use App\TicketsFeedback;
use App\User;
use App\UsersRole;
use App\Worker;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
        if (auth()->user()->can('view-dashboard')){

            $userProfile = Profile::where('user_id', auth()->user()->id)->first();

        if (!$userProfile)// If Profile is not updated
        {
            session()->flash('message', 'You Have been Logged In');

            return redirect()->to('/edit-profile');
        } else {
            $allTicketsCount = Ticket::all()->count();

            $pendingTicketsCount = Ticket::where('status_id', '!=', 4)->get()->count();

            $currentMonthSpendings = ServiceAction::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('fund');

            if (Ticket::count())
                $workCompleted = number_format((Ticket::where('status_id', 4)->get()->count()) / Ticket::count() * 100
                    , 2, '.', '');//Percentage of Completed Work
            else
                $workCompleted = 0;


            // Top Performers of the Month

            $workerRoleId = Role::where('name', 'Worker')->first()->id;

            $workersIdList = UsersRole::where('role_id', $workerRoleId)->get()->pluck('user_id');

            $workers = User::whereIn('id', $workersIdList)->limit(5)->get();

            $workerData = Worker::whereIn('user_id', $workersIdList)->get();

            $topPerformers = [];

            foreach ($workers as $worker) {

                foreach ($workerData as $workerDatum) {

                    if ($workerDatum->rating >= 80) {
                        $color = 'success';
                    } else if ($workerDatum->rating >= 40 && $workerDatum->rating < 80) {
                        $color = 'primary';
                    } else {
                        $color = 'danger';
                    }

                    if ($workerDatum->user_id == $worker->id) {

                        array_push($topPerformers, ['name' => $worker->name, 'rating' => $workerDatum->rating,
                            'color' => $color]);
                    }
                }
            }

            $recentFeedbacks = TicketsFeedback::limit(2)->get();

            return view('user.index',

                [

                    'allTicketsCount' => $allTicketsCount,
                    'pendingTicketsCount' => $pendingTicketsCount,
                    'currentMonthSpendings' => $currentMonthSpendings,
                    'workCompleted' => $workCompleted,
                    'topPerformers' => $topPerformers,
                    'recentFeedbacks' => $recentFeedbacks

                ]);
        }
        
    }else{
            return view('user.permission-error-page');
        }

}

public function spendingsOverview()
{

    $serviceActions = ServiceAction::select(
        DB::raw('sum(fund) as sums'),
        DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
        DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
    )
    ->groupBy('months', 'monthKey')
    ->orderBy('created_at', 'ASC')
    ->get();

    $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    foreach ($serviceActions as $serviceAction) {
        $data[$serviceAction->monthKey - 1] = $serviceAction->sums;
    }

    return $data;

}

public function ticketsComposition()
{

    $paintingServiceCount = Service::where('category', 'Painting')->get()->count();

    $plumbingServiceCount = Service::where('category', 'Plumbing')->get()->count();

    $houseKeepingServiceCount = Service::where('category', 'HouseKeeping')->get()->count();

    $airconditioningServiceCount = Service::where('category', 'Airconditioning')->get()->count();

    $electricalServiceCount = Service::where('category', 'Electrical')->get()->count();

    $interiorServiceCount = Service::where('category', 'Interior')->get()->count();

    return $data = [
        $paintingServiceCount,
        $plumbingServiceCount,
        $houseKeepingServiceCount,
        $airconditioningServiceCount,
        $electricalServiceCount,
        $interiorServiceCount
    ];
}

public function markAllRead()
{
    $user = auth()->user();
    $user->unreadNotifications->markAsRead();
    return redirect()->back();
}
}

