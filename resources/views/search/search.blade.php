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
    <div class="row">
       <div class="box box-default">
           <div class="box-body">
                 <div class="col-md-4">
              <table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                      <thead>
                          <tr>
                              <th>Target</th>
                              <th>Search text</th>
                          </tr>
                      </thead>
                      <tbody>
                          {{--<tr id="filter_global">
                              <td>Global search</td>
                              <td align="center"><input type="text" class="global_filter" id="global_filter"></td>
                          </tr>--}}
                          <tr id="filter_col1" data-column="0">
                              <td>RequestID</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col0_filter"></td>
                          </tr>

                          <tr id="filter_col2" data-column="1">
                              <td>Request Date</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col1_filter"></td>
                          </tr>
                          <tr id="filter_col3" data-column="2">
                              <td>Requestor Name</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col2_filter"></td>
                          </tr>
                          <tr id="filter_col4" data-column="3">
                              <td>JuniperCE</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col3_filter"></td>
                              {{--<td align="center">
                                  <select name="JCE" class="column_filter form-control" id="col3_filter">
                                      <option value="">Select</option>
                                      @foreach($jce as $jces)
                                      <option value="{{$jces}}">{{$jces}}</option>
                                      @endforeach
                                  </select>
                              </td>--}}
                          </tr>
                          <tr id="filter_col5" data-column="4">
                              <td>InESS CE</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col4_filter"></td>
                              {{--<td align="center">
                                  <select name="Respective_CE" class="column_filter form-control" id="col4_filter">
                                          <option value="">Select</option>
                                             @foreach($inessce as $cemail)
                                               <option value="{{$cemail}}">{{$cemail}}</option>
                                             @endforeach
                                  </select>
                              </td>
                              <td align="center"><input type="checkbox" class="column_filter" id="col4_regex"></td>--}}
                          </tr>
                          <tr id="filter_col6" data-column="5">
                              <td>PNR Status</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col5_filter"></td>
                          </tr>
                           
                      </tbody>
              </table>
                 </div>
                 <div class="col-md-4">
               <table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                      <thead>
                          <tr>
                              <th>Target</th>
                              <th>Search text</th>
                          </tr>
                      </thead>
                      <tbody>
                          {{--<tr id="filter_global">
                              <td>Global search</td>
                              <td align="center"><input type="text" class="global_filter" id="global_filter"></td>
                          </tr>--}}
                          <tr id="filter_col7" data-column="6">
                              <td>MPN</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col6_filter"></td>
                          </tr>
                          <tr id="filter_col8" data-column="7">
                              <td>ROHS CE</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col7_filter"></td>
                          </tr>
                          <tr id="filter_col9" data-column="8">
                              <td>ROHS COC</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col8_filter"></td>
                              {{--<td align="center">
                                     <select class="column_filter form-control" name="RoHSCOC" id="col8_filter">
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="Not Required">Not Required</option>
                                            <option value="To Be Collect Later">To Be Collect Later</option>
                                     </select>
                              </td>
                              <td align="center"><input type="checkbox" class="column_filter" id="col8_regex"></td>--}}
                          </tr>
                          <tr id="filter_col10" data-column="9">
                              <td>FMD</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col9_filter"></td>
                          </tr>
                         
                          <tr id="filter_col11" data-column="10">
                              <td>JPN#</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col10_filter"></td>
                          </tr>
                          <tr id="filter_col12" data-column="11">
                              <td>Part Type</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col11_filter"></td>
                          </tr>
                      </tbody>
               </table>
                 </div>
                 <div class="col-md-4">
                 <table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                      <thead>
                          <tr>
                              <th>Target</th>
                              <th>Search text</th>
                          </tr>
                      </thead>
                      <tbody>
                          {{--<tr id="filter_global">
                              <td>Global search</td>
                              <td align="center"><input type="text" class="global_filter" id="global_filter"></td>
                          </tr>--}}
                         
                         
                          <tr id="filter_col13" data-column="12">
                              <td>Project Name</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col12_filter"></td>
                          </tr>
                          <tr id="filter_col14" data-column="13">
                              <td>CE Assessment Status</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col13_filter"></td>
                          </tr>
                          <tr id="filter_col15" data-column="14">
                              <td>JCE Disposition</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col14_filter"></td>
                          </tr>
                          <tr id="filter_col16" data-column="15">
                              <td>Juniper CE Assessment Status</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col15_filter"></td>
                          </tr>
                          <tr id="filter_col17" data-column="16">
                              <td>CommodityCode</td>
                              <td align="center" class="tablespace"><input type="text" class="column_filter" id="col16_filter"></td>
                          </tr>
                      </tbody>
                 </table>
                 </div>
           </div>
       </div>
    </div>
              <div class="table-responsive">
            <table id="example" class="display table table-hover" cellspacing="0" width="100%">
                      <div class="col-md-3">
                       <a class="toggle-vis" data-column="0">Request ID</a><br>
                       <a class="toggle-vis" data-column="1">Request Date</a><br>
                       <a class="toggle-vis" data-column="2">Requestor Name</a><br>
                       <a class="toggle-vis" data-column="3">Juniper CE</a><br>
                       <a class="toggle-vis" data-column="4">InESS CE</a>
                      </div>
                      <div class="col-md-3">
                       <a class="toggle-vis" data-column="5">PNR Status</a><br>
                       <a class="toggle-vis" data-column="6">MPN</a><br>
                       <a class="toggle-vis" data-column="7">ROHS CE</a><br>
                       <a class="toggle-vis" data-column="8">ROHS COC</a><br>
                       <a class="toggle-vis" data-column="9">FMD</a>
                      </div>
                      <div class="col-md-3">
                       <a class="toggle-vis" data-column="10">JPN #</a><br>
                        <a class="toggle-vis" data-column="11"> Part Description</a>
                      
                       <a class="toggle-vis" data-column="12">Project Name</a><br>
                       <a class="toggle-vis" data-column="13">CE Assessment Status</a>
                      </div>
                      <div class="col-md-3">
                      <a class="toggle-vis" data-column="14">Juniper CE Disposition</a><br>
                       <a class="toggle-vis" data-column="15">Juniper CE Assessment Status</a>
                       <br>
                       <a class="toggle-vis" data-column="16">Commodity Code</a><br>
                      
                      </div>  
                           <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Request Date</th>
                        <th>Requestor Name</th>
                        <th>Juniper CE</th>
                        <th>InESS CE</th>
                        <th>PNR Status</th>
                        <th>MPN</th>
                        <th>ROHS CE</th>
                        <th>ROHS COC</th>
                       <th>FMD</th>
                        <th>JPN #</th>
                         <th> Part Type</th>
                        <th> Project Name</th>
                      <th> CE Assessment Status</th>
                      <th> Juniper CE Disposition</th>
                      <th> Juniper CE Assessment Status</th>
                      <th> Commodity Code</th>
                      
                      
                    </tr>
                           </thead>
                           <tbody>
                               @foreach($allPNR as $pnr)
                                <tr>
                                    <td>{{$pnr->Request_ID}}</td>
                                    <td>{{$pnr->requestedDate}}</td>
                                    <td>{{$pnr->requestorName}}</td>
                                    <td>{{$pnr->Respective_JCE}}</td>
                                    <td>{{$pnr->Respective_CE}}</td>
                                    <td>{{$pnr->PNR_Status}}</td>
                                    <td>{{$pnr->MPN}}</td>
                                    <td>{{$pnr->MFR}}</td>
                                    <td>{{$pnr->RoHSCOC}}</td>
                                    <td>{{$pnr->FMD}}</td>
                                
                                    <td>{{$pnr->JPN}}</td>
                                 <td>{{$pnr->partType}}</td>
                                    <td>{{$pnr->projectName}}</td>
                                    <td>{{$pnr->CE_Assesment_Status}}</td>
                                    <td>{{$pnr->Disposition}}</td>
                                    <td>{{$pnr->Assessment_Status}}</td>
                                    <td>{{$pnr->commodityCode}}</td>
                                   
                                </tr>
                               @endforeach
                           </tbody>
            </table>
              </div> 
</div>

@endsection
@push('scripts')
<script >
  
  function filterGlobal () {
    $('#example').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}
 
function filterColumn ( i ) {
    $('#example').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}
 
$(document).ready(function() {
   // $('#example').DataTable();
    var table = $('#example').DataTable( {
        
    } );

     $('a.toggle-vis').on('click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
 //Searching
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
 
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );


    //Hide and Show Columns
   
} );
</script>
@endpush