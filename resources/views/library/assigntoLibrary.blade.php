@component('mail::message')
# PNR Demo Version Mail for Symbol and Footprint request



@component('mail::panel')
Reqeust ID is {{$data->Request_ID}}

Date of Request {{$data->requestedDate}}

Commodity Code {{$data->commodityCode}}
@endcomponent

Thanks,<br>
PNR Team
@endcomponent
