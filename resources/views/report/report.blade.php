@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <h2>
      Reports
      </h2>
        <div class="col-md-12 text-center">
          <div class="col-md-12">
            <form action="{{url('reportformsubmit')}}" method="post" class="form-inline">
            {{csrf_field()}}
                <input type="text" class="form-control datepicker" name="from_date" id="fromdate" placeholder="From Date">
                <input type="text" class="form-control datepicker" name="to_date" id="todate" placeholder="To Date"><button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <br><br><br><br>

          <div class="col-md-12">
           <div class="box box-primary">
            <div class="table-responsive">
              <table class="row-border" cellspacing="0" width="100%" id="report">
                <thead>
                  <tr>
                        <th>Request_ID</th>
                        <th>vendorPNCount</th>
                        <th>requestorName</th>
                        <th>requestorEmail</th>
                        <th>requestedSite</th>
                        <th>requestedDate</th>
                        <th>projectName</th>
                        <th>boardName</th>
                        <th>partType</th>
                        <th>commodityCode</th>
                        <th>partDescription</th>
                        <th>Respective_CE</th>
                        <th>CE_assignedDate</th>
                        <th>Respective_JCE</th>
                        <th>JCE_assignedDate</th>
                        <th>PNR_Status</th>
                        <th>PNR_Approval_Status</th>
                        <th>PNR_CurrentStatus</th>
                        <th>JPN</th>
                        <th>Component_Life_Cycle</th>
                        <th>CQTR</th>
                        <th>AVL_TYPE</th>
                        <th>JPN</th>
                        <th>JPN_Assigned_Date</th>
                        <th>Outline_Drawing</th>
                        <th>Schematic</th>
                        <th>Speciification</th>
                        <th>Redmine_Ticket</th>
                        <th>Redmine_Ticket_Created_Date</th>
                        <th>Assessment_Status</th>
                        <th>Disposition</th>
                        <th>Recommedation</th>
                        <th>Technical_Risk</th>
                        <th>Free_PCBA_Assembly</th>
                 </tr>
                </thead>
                <tbody>
                  @foreach($masterdetails as $pnr)
                  <tr>
                    <td>{{$pnr->Request_ID}}</td>
                    <td>{{$pnr->vendorPNCount}}</td>
                    <td>{{$pnr->requestorName}}</td>
                    <td>{{$pnr->requestorEmail}}</td>
                    <td>{{$pnr->requestedSite}}</td>
                    <td>{{$pnr->requestedDate}}</td>
                    <td>{{$pnr->projectName}}</td>
                    <td>{{$pnr->boardName}}</td>
                    <td>{{$pnr->partType}}</td>
                    <td>{{$pnr->commodityCode}}</td>
                    <td>{{$pnr->partDescription}}</td>
                    <td>{{$pnr->Respective_CE}}</td>
                    <td>{{$pnr->CE_assignedDate}}</td>
                    <td>{{$pnr->Respective_JCE}}</td>
                    <td>{{$pnr->JCE_assignedDate}}</td>
                    <td>{{$pnr->PNR_Status}}</td>
                    <td>{{$pnr->PNR_Approval_Status}}</td>
                    <td>{{$pnr->PNR_CurrentStatus}}</td>
                    <td>{{$pnr->JPN}}</td>
                    @foreach($inesscedetails->where('Request_ID',$pnr->Request_ID) as $inessce)
                    <td>{{$inessce->Component_Life_Cycle}}</td>
                    <td>{{$inessce->CQTR}}</td>
                    <td>{{$inessce->AVL_TYPE}}</td>
                    @endforeach
                    @foreach($jpndetails->where('Request_ID',$pnr->Request_ID) as $jpn)
                    <td>{{$jpn->JPN}}</td>
                    <td>{{$jpn->JPN_Assigned_Date}}</td>
                    <td>{{$jpn->Outline_Drawing}}</td>
                    <td>{{$jpn->Schematic}}</td>
                    <td>{{$jpn->Speciification}}</td>
                    <td>{{$jpn->Redmine_Ticket}}</td>
                    <td>{{$jpn->Redmine_Ticket_Created_Date}}</td>
                    @endforeach
                    @foreach($jcedetails->where('Request_ID',$pnr->Request_ID) as $jce)
                    <td>{{$jce->Assessment_Status}}</td>
                    <td>{{$jce->Disposition}}</td>
                    <td>{{$jce->Recommedation}}</td>
                    <td>{{$jce->Technical_Risk}}</td>
                    <td>{{$jce->Free_PCBA_Assembly}}</td>
                    @endforeach
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
