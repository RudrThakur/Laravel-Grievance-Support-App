@component('mail::message')

# Hello, Admin <br>
A New Ticket has been raised with the following details :<br>

@component('mail::panel')
<div class="table-responsive-lg">
    <table class="table" style="width:100%; border: 1px solid black;
    border-collapse: collapse;">
        <tr style="border-bottom: 1px solid black;">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Ticket Id</th>
            <th style="padding: 5px;
            text-align: left; border-bottom: 1px solid black;border-left: 1px solid black;">{{ $newTicket->id }}</th>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Type</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $newTicket->type->type }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Name</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $newTicket->user->name }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Status</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket->status->status }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Current Holder</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket->authority->authority }}</td>
        </tr>
    </table>
</div>
@endcomponent

@component('mail::button', [
'url' => url('/service-action/'.$newTicket->id)
])
Take Action
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent