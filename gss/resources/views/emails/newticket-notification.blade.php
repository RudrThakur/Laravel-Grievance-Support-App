@component('mail::message')

# Hello, Admin <br>
A New Ticket of type <strong>{{ $newTicket['ticket']->type->type }}</strong> has been raised with the following
details<br>

@component('mail::panel')
<div class="table-responsive-lg">
    <h3>Ticket Details</h3>
    <table class="table" style="width:100%; border: 1px solid black;
    border-collapse: collapse;">
        <tr style="border-bottom: 1px solid black;">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Ticket Id</th>
            <th style="padding: 5px;
            text-align: left; border-bottom: 1px solid black;border-left: 1px solid black;">
                {{ $newTicket['ticket']->id }}</th>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Type</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $newTicket['ticket']->type->type }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Name</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $newTicket['ticket']->user->name }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Status</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['ticket']->status->status }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Current Holder</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['ticket']->authority->name }}</td>
        </tr>
    </table>
    <br>
    <h3>Service Details</h3>
    <table class="table" style="width:100%; border: 1px solid black;
    border-collapse: collapse;">
        <tr style="border-bottom: 1px solid black;">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Service Id</th>
            <th style="padding: 5px;
            text-align: left; border-bottom: 1px solid black;border-left: 1px solid black;">
                {{ $newTicket['service']->id }}</th>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Priority</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $newTicket['service']->priority->priority }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Category</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $newTicket['service']->category }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Sub Category</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->subcategory }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Block</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->block }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Department</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->department }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Floor</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->floor }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Room</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->room }}</td>
        </tr>
        @if($newTicket['service']->assetcode)
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Asset Code</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->assetcode }}</td>
        </tr>
        @endif
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Quantity</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->quantity }}</td>
        </tr>
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Description</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $newTicket['service']->description }}</td>
        </tr>
    </table>
</div>
@endcomponent

@component('mail::button', [
'url' => url('/service-details/'.$newTicket['ticket']->id)
])
Take Action
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
