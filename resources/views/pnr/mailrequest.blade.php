@component('mail::message')
# PNR Request 

Your PNR Request has been submitted.

@component('mail::panel')
Your Reqeust ID is {{$requestData['Request_ID']}}

Date of Request {{$requestData['requestedDate']}}

Commodity Code {{$requestData['commodityCode']}}

Thanks,<br>
PNR TEAM
@endcomponent