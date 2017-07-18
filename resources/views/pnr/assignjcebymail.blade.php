@component('mail::message')
# PNR Request with ID {{$data['Request_ID']}} is Assigned for You ,{{$user->name}}




@component('mail::panel')
Reqeust ID is {{$data['Request_ID']}}

Date of Request {{$data['requestedDate']}}

Commodity Code {{$data['commodityCode']}}

@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent