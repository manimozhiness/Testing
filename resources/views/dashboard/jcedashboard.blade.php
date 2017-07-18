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
<div>
    <div class="row">
        <div class="col-md-12">
                      <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <table class="table datatables table-sm table-bordered table-striped table-hover info">
                  <thead>
                    <tr>
                        
                        <th class="pnrdetails">PNR Req. ID </th>
                        <th class="pnrdetails">Requestor Name</th>
                        <th class="pnrdetails">PNR Request Date</th>
                       
                        <th class="pnrdetails">Part Description</th>
                       
                        <th class="analysis text-center">PNR Analysis Stage</th>
                        <th class="analysis">JPN</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignedrequest as $req)
                        <tr>
                            
                            <td><a href="{{ route('CE.Process',$req->Request_ID) }}">{{$req->Request_ID}}</a></td>
                           
                            <td>{{$req->requestorName}}</td>
                            <td>{{$req->requestedDate}}</td>
                          
                            <td>{{$commodity->where('Commodity_Code',$req->commodityCode)->implode('Commodity_Description')}}</td>
                          
                            <td>{{$req->PNR_CurrentStatus}}</td>
                            <td>{{$req->JPN}}</td>
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
