@component('mail::message')

# Hello, {{ $recipient->roles->first()->name }} <br>
A New Ticket has been forwarded to you for approval :<br>

@component('mail::panel')
<div class="table-responsive-lg">
    <table class="table" style="width:100%; border: 1px solid black;
    border-collapse: collapse;">
        @if($serviceAction['fund'])
        <tr style="border-bottom: 1px solid black;">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Fund Allocated</th>
            <th style="padding: 5px;
            text-align: left; border-bottom: 1px solid black;border-left: 1px solid black;">
                {{ $serviceAction['fund'] }}</th>
        </tr>
        @endif
        @if($serviceActionAuthorities)
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Approvals Required</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">
                @foreach($serviceActionAuthorities as $serviceActionAuthority)
                {{ $serviceActionAuthority }},
                @endforeach
            </td>
        </tr>
        @endif
        @if($serviceAction['worker_id'])
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Worker Assigned</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black; ">{{ $serviceAction['worker_id'] }}</td>
        </tr>
        @endif
        @if($serviceAction['adminremarks'])
        <tr style="border-bottom: 1px solid black">
            <th style="padding: 5px;
            text-align: left;border-bottom: 1px solid black; ">Remarks</th>
            <td style="padding: 5px;
            text-align: left;border-left: 1px solid black;">{{ $serviceAction['adminremarks'] }}</td>
        </tr>
        @endif
    </table>
</div>
@endcomponent

@component('mail::button', [
'url' => url('/service-action/'.$serviceAction['id'])
])
Take Action
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
