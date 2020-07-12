@component('mail::message')
# Hello, Admin <br>
A New Ticket has been raised
<br>
Ticket Id - #{{ $newTicket->id}}
<br>


@component('mail::button', [
'url' => url('www.google.com')
])
Accept
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent