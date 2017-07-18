@extends('layouts.main')
@section('sidebar')
<li><a class="scroll" href="{{route('Preliminary')}}"><i class="fa fa fa-book text-aqua"></i><span>Request Part Number</span></a></li>
<li><a class="scroll" href="{{url('search')}}"><i class="fa fa-search text-teal"></i><span> Search</span></a></li>
<li><a class="scroll" href="{{route('RequestID.Search')}}"><i class="fa fa-history text-green"></i><span>Timeline</span></a></li>
@role('InESSCE')
  <li>
    <a class="scroll" href="{{ url('reports') }}"><i class="fa fa-newspaper-o text-navy"></i><span>Reports
    </span></a>
  </li>
@endrole
@endsection
@section('content')
<div class="container">
<div class="col-md-12">
    <form action="{{url('searchbyidformsubmit')}}" method="post">
    {{csrf_field()}}
        <input type="text" name="Request_ID" placeholder="Enter PNR RequestID" class="form-control">
        <br>
        <button class="btn btn-primary pull-right" type="submit">Search</button>
    </form>
</div>
<div class="col-md-12">
@if(sizeof($timeline) != 0)
@foreach($timeline as $log)
    <ul class="timeline">

        <!-- timeline time label -->
        <li class="time-label">
            <span class="bg-red">
                {{$log->Date}}
            </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <h3 class="timeline-header">{{$log->Causer}} ...</h3>

                <div class="timeline-body">
                    {{$log->Description}}
                </div>

           </div>
        </li>
        <!-- END timeline item -->


    </ul>
@endforeach
@endif
 </div>
 @if(sizeof($masterdetails) != 0)
 <div class="col-md-12">
 <h5><strong>PNR Request Details</strong></h5>
    <div class="box box-warning box-solid">
         <div class="box-body">
              <div class="row">
        <div class="col-md-3"><strong>Request_ID</strong><br>{{$masterdetails->Request_ID}}</div>
        <div class="col-md-3"><strong>symbolFootprintNeeds</strong><br>{{$masterdetails->symbolFootprintNeeds}}</div>
        <div class="col-md-3"><strong>existingSchematicSymbol</strong><br>{{$masterdetails->existingSchematicSymbol}}</div>
        <div class="col-md-3"><strong>NoSymbolorFootprint</strong><br>{{$masterdetails->NoSymbolorFootprint}}</div>
        <div class="col-md-3"><strong>existingPCBFootprint</strong><br>{{$masterdetails->existingPCBFootprint}}</div>
        <div class="col-md-3"><strong>vendorPNCount</strong><br>{{$masterdetails->vendorPNCount}}</div>
        <div class="col-md-3"><strong>requestorName</strong><br>{{$masterdetails->requestorName}}</div>
        <div class="col-md-3"><strong>requestorEmail</strong><br>{{$masterdetails->requestorEmail}}</div>
        <div class="col-md-3"><strong>requestedSite</strong><br>{{$masterdetails->requestedSite}}</div>
        <div class="col-md-3"><strong>requestedDate</strong><br>{{$masterdetails->requestedDate}}</div>
        <div class="col-md-3"><strong>projectName</strong><br>{{$masterdetails->projectName}}</div>
        <div class="col-md-3"><strong>boardName</strong><br>{{$masterdetails->boardName}}</div>
        <div class="col-md-3"><strong>requestorType</strong><br>{{$masterdetails->requestorType}}</div>
        <div class="col-md-3"><strong>partType</strong><br>{{$masterdetails->partType}}</div>
        <div class="col-md-3"><strong>commodityCode</strong><br>{{$masterdetails->commodityCode}}</div>
        <div class="col-md-3"><strong>symbolName</strong><br>{{$masterdetails->symbolName}}</div>
        <div class="col-md-3"><strong>footPrintName</strong><br>{{$masterdetails->footPrintName}}</div>
        <div class="col-md-3"><strong>pincount</strong><br>{{$masterdetails->pincount}}</div>
        <div class="col-md-3"><strong>partDescription</strong><br>{{$masterdetails->partDescription}}</div>
        <div class="col-md-3"><strong>outlint_part_number</strong><br>{{$masterdetails->outlint_part_number}}</div>
        <div class="col-md-3"><strong>spec_part_number</strong><br>{{$masterdetails->spec_part_number}}</div>
        <div class="col-md-3"><strong>notes_to_ce</strong><br>{{$masterdetails->notes_to_ce}}</div>
        <div class="col-md-3"><strong>notes_to_lib</strong><br>{{$masterdetails->notes_to_lib}}</div>
        <div class="col-md-3"><strong>Respective_CE</strong><br>{{$masterdetails->Respective_CE}}</div>
        <div class="col-md-3"><strong>CE_assignedDate</strong><br>{{$masterdetails->CE_assignedDate}}</div>       <div class="col-md-3"><strong>JCE_assignedDate</strong><br>{{$masterdetails->Respective_JCE}}</div>
        <div class="col-md-3"><strong>PNR_Status</strong><br>{{$masterdetails->JCE_assignedDate}}</div>
        <div class="col-md-3"><strong>PNR_Approval_Status</strong><br>{{$masterdetails->PNR_Status}}</div>
        <div class="col-md-3"><strong>JPN</strong><br>{{$masterdetails->PNR_Approval_Status}}</div>
        <div class="col-md-3"><strong>PNR_statusby_date</strong><br>{{$masterdetails->JPN}}</div>
        <div class="col-md-3"><strong>PNR_approvalstatusby_date</strong><br>{{$masterdetails->PNR_statusby_date}}</div>
        <div class="col-md-3"><strong>PNR_CurrentStatusby_date</strong><br>{{$masterdetails->PNR_approvalstatusby_date}}</div>
        <div class="col-md-3"><strong>Respective_JCE </strong><br>{{$masterdetails->PNR_CurrentStatusby_date}}</div>
     </div>
         </div>
    </div>
 </div>                 
@endif
</div>
@endsection