<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\NewTicketAdded;
use App\Events\ServiceActionEvent;
use App\Listeners\SendNewTicketNotificationEmail;
use App\Listeners\SendServiceActionNotificationEmail;
use App\Listeners\SendServiceApprovalEmail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewTicketAdded::class => [
            SendNewTicketNotificationEmail::class,
        ],
        ServiceActionEvent::class => [
            SendServiceActionNotificationEmail::class,
            SendServiceApprovalEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
