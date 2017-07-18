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
<div class="row">
    <div class="col-md-12 text-left" style="margin-bottom:10px;">
      {{--<span class="small"><strong>Enter Preliminary Data</strong> -> Enter Part Data -> Verify Part Data</span>--}}
      <ol class="breadcrumb" style="background-color:#ecf0f5 !important;">
          <li class="active">Enter Preliminary Data</li>
          <li><a href="#">Enter Part Data</a></li>
          <li><a href="#">Verify Part Data</a></li>      
      </ol>
  </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
            <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Enter Preliminary Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('Preliminary.Submit')}}" method="post" enctype="multipart/form-data">
             <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-4 text-muted">Request Date</label>
                  <div class="col-sm-8">
                    <input type="text" name="requestedDate" value="{{Carbon\Carbon::now()->setTimezone('America/Vancouver')}}" class="form-control" id="inputEmail3" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-4 text-muted">Requestor Site</label>
                  <div class="col-sm-8">
                     <select  name="requestedSite" class="form-control input-sm select2" style="width: 100%;">
                          <option></option>
                          <option value="Sunnyvale">Sunnyvale</option>
                          <option value="Bangalore">Bangalore</option>
                          <option value="Beijing">Beijing</option>
                          <option value="Fredrick">Fredrick</option>
                          <option value="Westford">Westford</option>
                      </select>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputEmail3"  class="col-sm-4 text-muted">Requestor Name</label>
                  <div class="col-sm-8">
                    <input type="text"  name="requestorName" class="form-control" id="inputEmail3" value="{{Auth::user()->name}}" readonly>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 text-muted">Requestor Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="requestorEmail" class="form-control" id="inputEmail3" value="{{Auth::user()->email}}" readonly>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Project Name <span class="red-text">*</span></label>
                  <div class="col-sm-5">
                    <select name="projectName" class="form-control input-sm select2" id="inputEmail3" required>
                    <option></option>
                    @foreach($project as $projects)
                    <option value="{{$projects}}">{{$projects}}</option>
                    @endforeach
                    </select>
                  </div>
                    <div class="col-sm-3">
                     <a href="mailto:pnr-alias@juniper.net?cc=pdcteam@juniper.net&subject=PNR - Add a Project Name&body=Please add the following project name to the project list %0A%0A %0A%0A PDC-PNR Team %0A%0A Please reply-all and confirm that the suggested project name meet your requirment and standards">Project Name Missing</a>
                     </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Board Name</label>
                  <div class="col-sm-5">
                    <input type="text" name="boardName" class="form-control" id="inputPassword3">
                  </div>
                  <div class="col-sm-3">
                    <p>(ex. N/A if not applicable)</p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Part Type<span class="red-text">*</span></label>
                  <div class="col-sm-8">
                    <select  name="partType" class="form-control input-sm select2" style="width: 100%;" required>
                          <option></option>
                      @foreach($commodity as $parttype)
                      @if($parttype->Commodity_Family == $parttype->Commodity_Description)
                      <option value="{{$parttype->Commodity_Code}}">{{$parttype->Commodity_Description}}</option>
                      @else
                   <option value="{{$parttype->Commodity_Code}}">{{$parttype->Commodity_Family}},{{$parttype->Commodity_Description}}</option>
                   @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Request Type   <span class="red-text">*</span></label>
                  <div class="col-sm-8">
                    <select  name="requestorType" onchange="requestType(this.value)" class="form-control input-sm select2" style="width: 100%;" required>
                          <option></option>
                           <option value="New Part(need a part number)">New Part(need a part number)</option>
                          
                    </select>
                  </div>
                </div>
                 <div class="form-group row" id="SymbolFootPrintSelect">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Symbol Footprints Needs   <span class="red-text">*</span></label>
                  <div class="col-sm-8">
                    <select  name="symbolFootprintNeeds" onchange="symbolFootPrint(this.value)" class="form-control input-sm select2" style="width: 100%;" >
                          <option></option>
                     <option value="Need new symbol and Foot Print">Need new symbol and Foot Print</option>
                     <option value="Use Existing symbol and/or Foot Print">Use Existing symbol and/or Foot Print</option>
                     <option value="No Symbol or Footprint Needed">No Symbol or Footprint Needed</option>  
                    </select>
                  </div>
                </div>
                 <div class="form-group row" id="symbol">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Use Existing Schematic Symbol<span class="red-text">*</span></label>
                  <div class="col-sm-4">
                    <select name="existingSchematicSymbol" id="symbolSelect" onchange="exsitingSymbol(this.value)" class="form-control input-sm select2" style="width: 100%;">
                          <option></option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>  
                          
                    </select>
                  </div>
                  <div class="col-sm-4">
                   <span id="symbolyes"></span>
                  </div>
                </div>
                <div class="form-group row" id="notneeded">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Why is no symbol or footprint needed</label>
                  <div class="col-sm-8">
                    <input type="text" name="NoSymbolorFootprint" class="form-control" id="inputPassword3" placeholder="text" >
                  </div>
                </div>
                <div class="form-group row" id="footprint">
                  <label for="inputPassword3" class="col-sm-4 text-muted">Use Existing pcb footprint<span class="red-text">*</span></label>
                  <div class="col-sm-4">
                    <select name="existingPCBFootprint" id="footPrintSelect" onchange="exsitingFootprint(this.value)" class="form-control input-sm select2" style="width: 100%;">
                           <option></option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>  
                          
                    </select>
                  </div>
                  <div class="col-sm-4">
                     <span id="footprintyes"></span>
                  </div>
                </div>
                    <div class="form-group row" id="vendorSelect">
                  <label for="inputPassword3" class="col-sm-4 text-muted">How many Vendor P/N do you have</label>
                  <div class="col-sm-8">
                    <select name="vendorPNCount" class="form-control input-sm select2" style="width: 100%;" >
                           <option></option>
                     <option value="0-PN Assigner will assign all sources">0-PN Assigner will assign all sources</option>
                     <option value="1-Requestor has one source. Comp.Eng to find others">1-Requestor has one source. Comp.Eng to find others</option>
                     <option value="1-Part is only available from one Vendor">1-Part is only available from one Vendor</option> 
                     <option value="2-Requestor has multiple sources">2-Requestor has multiple sources</option>  
 
                          
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                {{--<button type="submit" class="btn btn-default">Reset This Form</button>--}}
                <button type="submit" class="btn btn-info pull-right" id="submitformbutton">Continue</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
    <div class="col-md-2"></div>
</div>

@endsection
@push('scripts')
<script>
$(document).ready(function(){
  $('#symbol').hide();
  $('#footprint').hide();
  $('#notneeded').hide();
  $('#SymbolFootPrintSelect').hide();
  $('#vendorSelect').hide();
});

function symbolFootPrint(n)
{
  if(n == 'Need new symbol and Foot Print')
  {
    $('#symbol').hide();
    $('#footprint').hide();
    $('#notneeded').hide();
  }
  else if(n == 'Use Existing symbol and/or Foot Print')
  {
    $('#symbol').show();
    $('#footprint').show();
    $('#notneeded').hide();
  }
  else
  {
    $('#symbol').hide();
    $('#footprint').hide();
    $('#notneeded').show();
  }
  if($('#symbolSelect').val() == 'No' && $('#footPrintSelect').val() == 'No')
  {
    alert('Both Existing Symbol and Footprint cannot be NO');
  }
}

function exsitingSymbol(d)
{
  if(d == 'Yes')
  {
    $('#symbolyes').empty();
    $('#symbolyes').append('Symbol Name : <input type="text" name="symbolName" >');
    $('#submitformbutton').removeAttr("disabled");
  }
  else
  {
    $('#symbolyes').empty();
    $('#symbolyes').empty();
    $('#submitformbutton').removeAttr("disabled");    
  }
}
function exsitingFootprint(d)
{
  if(d == 'Yes')
  {
    $('#footprintyes').empty();
    $('#footprintyes').append('Footprint Name : <input type="text" name="footPrintName" >');
    $('#submitformbutton').removeAttr("disabled");
  }
  else
  {
    $('#footprintyes').empty();
    $('#submitformbutton').removeAttr("disabled");
  }
  if($('#symbolSelect').val() == 'No' && $('#footPrintSelect').val() == 'No')
  {
    toastr.info('Both Existing Symbol and Footprint cannot be NO');
    $('#submitformbutton').attr("disabled", "true");
  }
}

function requestType(s)
{
  if(s == 'New Part(need a part number)')
  {
    $('#SymbolFootPrintSelect').show();
    $('#vendorSelect').show();
  }
  else
  {
    $('#SymbolFootPrintSelect').hide();
    $('#vendorSelect').hide();
  }
}

</script>
@endpush

