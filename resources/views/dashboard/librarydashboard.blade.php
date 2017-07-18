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
<div >
    <div class="row">
     
        <div class="col-md-12 ">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <table class="table datatables table-sm table-bordered table-striped table-hover info">
                  <thead>
                    <tr>
                        
                        <th >PNR Req. ID </th>
                   
                        <th >Requestor Name</th>
                        <th >PNR Request Date</th>
                       
                        <th>Juniper CE</th>
                        <th >Worked by</th>
                        <th >Priority</th>
                        <th >Comments</th>
                    </tr>
                    </thead>
                   
                    <tbody>

                  @foreach ($assignedrequest as $req)
                
                        <tr>
                            
                            <td><a href="{{ url('libraryedit',$req->Request_ID) }}">{{$req->Request_ID}}</a></td>
                       
                            <td>{{$req->requestorName}}</td>
                            <td>{{$req->requestedDate}}</td>
                         
                            <td>{{$req->Respective_JCE}}</td>
                            <td>{{$req->Worked_By}}</td>
                            <td>{{$req->Priority}}</td>
                            <td>{{$req->Priority_Comments}}</td>
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
