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
<div class="col-sm-12">
    <div class="row">
           
        <div class="col-md-12 ">
                     <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Coordinator Dashboard</div>

                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table datatables table-sm table-bordered table-striped table-hover info"  >
                   <thead>
                    <tr>
                        <th class="pnrdetails" >PNR Req. ID </th>
                        <th class="pnrdetails">Requestor Name</th>
                        <th class="pnrdetails">PNR Request Date</th>
                    
                        <th class="pnrdetails">Part Description</th>
                        <th width="20%" class="analysis text-center">Assigned to</th>
                    </tr>
                    </thead>
                     <tbody>
                        @foreach ($assignedrequest as $req)
                        <tr>
                            <td><a class="btn btn-sm blue lighten-4 black-text" style="" href="{{ route('CE.Process',$req->Request_ID) }}">{{$req->Request_ID}}</a></td>
                            <td>{{$req->requestorName}}</td>
                            <td>{{$req->requestedDate}}</td>
                            
                            <td>{{$commodity->where('Commodity_Code',$req->commodityCode)->implode('Commodity_Description')}}</td>
                         
                            <td>
                                @if($req->Respective_CE != '')
                                <form action="{{url('assigntoce',$req->Request_ID)}}" method="post">
                                {{csrf_field()}}
                                <div class="input-group no-padding no-margin">
                                    <select name="Respective_CE" class="form-control select2">
                                    <option value="{{$req->Respective_CE}}">{{$req->Respective_CE}}</option>
                                    @foreach($inessce as $cemail)
                                    <option value="{{$cemail}}">{{$cemail}}</option>
                                    @endforeach
                                </select>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                                </form>
                                @else
                                <form action="{{url('assigntoce',$req->Request_ID)}}" method="post">
                                {{csrf_field()}}
                                <div class="input-group no-padding no-margin">
                                    <select name="Respective_CE" class="form-control select2" data-placeholder="Select CE to Assign">
                                        @foreach($inessce as $cemail)
                                            <option value="{{$cemail}}">{{$cemail}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                                </form>
                                @endif
                            </td>
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
</div>
@endsection
