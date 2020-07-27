<?php

namespace App\Listeners;

use App\Events\ServiceActionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Role;
use App\UsersRole;
use App\User;
use App\Mail\ServiceApprovalEmail;

class SendServiceApprovalEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ServiceActionEvent  $event
     * @return void
     */
    public function handle(ServiceActionEvent $event)
    {
        $serviceActionAuthorities = $event->serviceActionAuthorities;
        $roleIds = Role::whereIn('name', $serviceActionAuthorities)->get()->pluck('id');
        $userIds = UsersRole::whereIn('role_id', $roleIds)->get()->pluck('user_id');
        $recipients = User::whereIn('id', $userIds)->get();

        foreach($recipients as $recipient){

            Mail::to($recipient->email)->send(
                new ServiceApprovalEmail($event->serviceAction, $event->serviceActionAuthorities, $recipient)
            );

        }
    }
}
