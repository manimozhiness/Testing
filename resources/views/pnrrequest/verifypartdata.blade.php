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
<form action="{{url('savePNRRequest')}}" method="post">
{{csrf_field()}}
<input type="hidden" value="{{$partpremilinary['symbolFootprintNeeds']}}" name="symbolFootprintNeeds">
<input type="hidden" value="{{$partpremilinary['existingSchematicSymbol']}}" name="existingSchematicSymbol">
<input type="hidden" value="{{$partpremilinary['NoSymbolorFootprint']}}" name="NoSymbolorFootprint">
<input type="hidden" value="{{$partpremilinary['existingPCBFootprint']}}" name="existingPCBFootprint">
<input type="hidden" value="{{$partpremilinary['vendorPNCount']}}" name="vendorPNCount">
<input type="hidden" name="Request_ID" value="{{$partpremilinary['Request_ID']}}">

<div class="row">
  <div class="col-md-12 text-left" style="margin-bottom:10px;">
     {{--<span class="small"><strong>Enter Preliminary Data</strong> -> Enter Part Data -> Verify Part Data</span>--}}
      <ol class="breadcrumb" style="background-color:#ecf0f5 !important;">
          <li><a href="">Enter Preliminary Data</a></li>
          <li><a href="">Enter Part Data</a></li>
          <li class="active">Verify Part Data</li>      
      </ol>
  </div>
  <br>
    <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Verify Part Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Request ID:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="requestorName" value="{{$partpremilinary['Request_ID']}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Requestor:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="requestorName" value="{{$partpremilinary['requestorName']}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Requestor Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control " name="requestorEmail" id="inputEmail3" value="{{$partpremilinary['requestorEmail']}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 text-muted">Requestor Site:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="{{$partpremilinary['requestedSite']}}" name="requestedSite" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 text-muted">Request Date:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control datepicker" id="inputEmail3" value="{{$partpremilinary['requestedDate']}}" name="requestedDate" readonly>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Project Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control " id="inputEmail3" value="{{$partpremilinary['projectName']}}" name="projectName" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Board Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['boardName']}}" name="boardName" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Request Type:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['requestorType']}}" name="requestorType" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Commodity Code:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['commodityCode']}}" name="commodityCode" readonly>
                  </div>
                </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Component Type:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['partType']}}" name="partType" readonly>
                  </div>
                </div>
                
               <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Commodity Description:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['partDescription']}}" name="partDescription" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Schematic Symbol:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['symbolName']}}" name="symbolName" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">PCB FootPrint:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['footPrintName']}}" name="footPrintName" readonly>
                  </div>
                </div>
                @php
                $i = 0;
                @endphp
                @for($i=0;$i<sizeof($mfr);$i++)
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Mfgr {{$i+1}}</label>
                  <div class="col-sm-10">
                     <input type="text" value="{{$mfr[$i]}}" name="MFR[]" class="form-control" id="inputPassword3" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Mfgr {{$i+1}} P/N</label>
                  <div class="col-sm-10">
                     <input type="text" value="{{$mpn[$i]}}" name="MPN[]" class="form-control" id="inputPassword3" readonly>
                  </div>
                </div>
                @endfor
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Notes To be Comp Eng:</label>
                  <div class="col-sm-10">
                     <input type="text" name="notes_to_ce" class="form-control" id="inputPassword3" value="{{$partpremilinary['notestoce'] or null}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Notes Sym lib</label>
                  <div class="col-sm-10">
                     <input type="text" name="notes_to_lib" class="form-control" id="inputPassword3" value="{{$partpremilinary['notestolib'] or null}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Attachments Count</label>
                  <div class="col-sm-10">
                     <table class="table">
                        <thead>
                          <tr>
                            <th>File Name</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Comments</th>
                            {{--<th>Delete</th>--}}
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($attachments as $attach)
                            <tr>
                              <td><a href="{{url('verifyfiledownload',$attach->id)}}">{{$attach->file_name}}</a></td>
                              <td>{{$attach->Type}}</td>
                              <td>{{$attach->Size}}</td>
                              <td>{{$attach->description}}</td>
                              {{--<td><a href="{{url('verifyfiledelete',$attach->id)}}">Delete</a></td>--}}
                            </tr>
                          @endforeach
                        </tbody>
                     </table>
                  </div>
                  
                </div>
              </div>
              <!-- /.box-body -->
                
              
          </div>
    </div>
</div>
      </div>
         <div class="col-sm-12 col-md-10 col-md-offset-1">
              <button type="submit" class="btn btn-info pull-right" >Send Request</button>
         </div>
    </div>

                    

</form>
@endsection
@push('scripts')
<script>

  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;

    document.getElementById("mpntable").deleteRow(i);
}
   function addotherrow()
    {
        $('#mpntbody').append(' <tr onclick="deleterow(this)"><td><input type="text" class="form-control" name="MFR[]"></td><td><input type="text" class="form-control" name="MPN[]"></td><td><select class="form-control input-sm" name="MPN_Lifecycle[]"><option></option><option value="Production">Production</option><option value="Prototype(Pre-Release)">Prototype(Pre-Release)</option><option value="Not Recommended for New Design">Not Recommended for New Design</option><option value="Obsolete">Obsolete</option><option value="Custom Part">Custom Part</option></select></td><td><select class="form-control input-sm" name="RoHSCOC[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Be Collect Later</option></select></td><td><select class="form-control input-sm" name="REACHCOC[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Be Collect Later</option></select></td><td><select class="form-control input-sm" name="FMD[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Be Collect Later</option></select></td><td><a onclick="deleteRow(this)"><i class="fa fa-trash"></i></a></td></tr>');
    }

</script>
<script>
    function loadClassCode(n)
    {
      
      var m = $('#tokens').val();
     $.get("{{ url('getccdetails')}}",{cc:n,_token:m},function(data){
   
    if(data){
      
      $("#cccodeanddescription").empty();
    $("#cccodeanddescription").prepend('<option value="" ></option>');
          for (i = 0; i < data.length; i++) {
           
        $("#cccodeanddescription").append('<option value="'+data[i].Commodity_Code+'=>'+data[i].Commodity_Description+'">'+data[i].Commodity_Code+'=>'+data[i].Commodity_Description+'</option>');

    }    
    return;
        }
     });

    }
    </script>
    <script>
    function getPartdescription(d)
    {
      
      var m = $('#tokens').val();
     $.get("{{ url('getccdescription')}}",{cc:d,_token:m},function(data){
   
    if(data){
    
      $("#partdescription").empty();

        $("#partdescription").append('<label class="text-muted">Part Description</label><textarea name="Part_Desc" class="form-control" value="'+data.Item_Naming_Convention+'">'+data.Item_Naming_Convention+'</textarea>');

    return;
        }
     });
    }
    </script>
@endpush

