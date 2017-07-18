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
<form action="{{route('partcontinue.Submit')}}" method="post" enctype="multipart/form-data">
 <input type="hidden" value="{{ csrf_token() }}" name="_token">
 <input type="hidden" name="symbolFootprintNeeds" value="{{$preliminaryData['symbolFootprintNeeds'] or null}}">
 <input type="hidden" name="existingSchematicSymbol" value="{{$preliminaryData['existingSchematicSymbol'] or null}}">
 <input type="hidden" name="NoSymbolorFootprint" value="{{$preliminaryData['NoSymbolorFootprint'] or null}}">
 <input type="hidden" name="existingPCBFootprint" value="{{$preliminaryData['existingPCBFootprint'] or null}}">
 <input type="hidden" name="vendorPNCount" value="{{$preliminaryData['vendorPNCount'] or null}}">
 <input type="hidden" name="symbolName" value="{{$preliminaryData['symbolName'] or null}}">
 <input type="hidden" name="footPrintName" value="{{$preliminaryData['footPrintName'] or null}}">
<div class="row">
  <div class="col-md-12 text-left" style="margin-bottom:10px;">
       {{--<span class="small"><strong>Enter Preliminary Data</strong> -> Enter Part Data -> Verify Part Data</span>--}}
      <ol class="breadcrumb" style="background-color:#ecf0f5 !important;">
          <li><a href="">Enter Preliminary Data</a></li>
          <li class="active">Enter Part Data</li>
          <li><a href="#">Verify Part Data</a></li>      
      </ol>
   <a href="{{route('Preliminary')}}" class="btn btn-info btn-md pull-right"><i class="fa fa-arrow-left" aria-hidden="true">&nbsp;Back</i></a>
  </div>
  <div class="col-md-4 offset-md-4"> 
        <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Requestor Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Request Date</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="inputEmail3" name="requestedDate" value="{{Carbon\Carbon::now()->setTimezone('America/Vancouver')}}" >
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Requestor Site</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="inputEmail3" name="requestedSite" value="{{$preliminaryData['requestedSite'] or null}}" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 text-muted">Requestor Name</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="inputEmail3" name="requestorName" value="{{$preliminaryData['requestorName'] or null}}">
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 text-muted">Requestor Email</label>
                  <div class="col-sm-10">
                    <input type="email" readonly class="form-control" id="inputEmail3" name="requestorEmail" value="{{$preliminaryData['requestorEmail'] or null}}">
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Project Name</label>
                  <div class="col-sm-10">
                     <input type="text" readonly class="form-control" id="inputEmail3" name="projectName" value="{{$preliminaryData['projectName'] or null}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Board Name</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" name="boardName" value="{{$preliminaryData['boardName'] or null}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Request Type</label>
                  <div class="col-sm-10">
                     <input type="text" readonly class="form-control" name="requestorType" value="{{$preliminaryData['requestorType'] or null}}">
                  </div>
                </div>
                
              </div>
          </div>
          @if($preliminaryData['vendorPNCount'] == '0-PN Assigner will assign all sources')

          <div class="box box-warning">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Notes To Component Engineering</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <textarea class="form-control" name="notestoce" id="notesCE" rows="3" value="Please determine valid sources.">Please determine valid sources.</textarea>
                  </div>
                </div>
          </div>
          @elseif($preliminaryData['vendorPNCount'] == '1-Requestor has one source. Comp.Eng to find others') 
          <div class="box box-warning">
                  <div class="box-header with-border text-center">
                    <h3 class="box-title">Notes To Component Engineering</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <textarea class="form-control" name="notestoce" id="notesCE" rows="3" value="Please find additional sources.">Please find additional sources.</textarea>
                    </div>
                  </div>
          </div>
          @elseif($preliminaryData['vendorPNCount'] == '1-Part is only available from one Vendor')
          <div class="box box-warning">
                  <div class="box-header with-border text-center">
                    <h3 class="box-title">Notes To Component Engineering</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <textarea class="form-control" name="notestoce" id="notesCE" rows="3" value="No other known vendors.">No other known vendors.</textarea>
                    </div>
                  </div>
          </div>
          @else
          <div class="box box-warning">
                  <div class="box-header with-border text-center">
                    <h3 class="box-title">Notes To Component Engineering</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <textarea class="form-control" name="notestoce" id="notesCE" rows="3"></textarea>
                    </div>
                  </div>
          </div>
          @endif
          @if(($preliminaryData['symbolName'] != '') && ($preliminaryData['footPrintName'] != ''))
          <div class="box box-warning">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Notes To Symbol Librarian</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <textarea class="form-control" name="notestolib" id="noteslibrarian" rows="3" value="Existing Symbol : {{$preliminaryData['symbolName']}} Existing FootPrint : {{$preliminaryData['footPrintName']}}">Existing Symbol : {{$preliminaryData['symbolName']}} &#13;&#10; Existing Footprint : {{$preliminaryData['footPrintName']}}</textarea>
                  </div>
                </div>
          </div>
          @elseif($preliminaryData['footPrintName'] != '')
          <div class="box box-warning">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Notes To Symbol Librarian</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <textarea class="form-control" name="notestolib" id="noteslibrarian" rows="3" value="Existing Footprint : {{$preliminaryData['footPrintName']}}">Existing Footprint : {{$preliminaryData['footPrintName']}}</textarea>
                  </div>
                </div>
          </div>
          @elseif($preliminaryData['symbolName'] != '')
          <div class="box box-warning">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Notes To Symbol Librarian</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <textarea class="form-control" name="notestolib" id="noteslibrarian" rows="3" value="Existing Symbol : {{$preliminaryData['symbolName']}}">Existing Symbol : {{$preliminaryData['symbolName']}}</textarea>
                  </div>
                </div>
          </div>
          @else
          @if($preliminaryData['NoSymbolorFootprint'] != '')
          <div class="box box-warning">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Notes To Symbol Librarian</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <textarea class="form-control" name="notestolib" id="noteslibrarian" rows="3" value="No FootPrint or Symbol Needed , Because "{{$preliminaryData['NoSymbolorFootprint']}}"">No FootPrint or Symbol Needed , Because "{{$preliminaryData['NoSymbolorFootprint']}}"</textarea>
                  </div>
                </div>
          </div>
          @else
          <div class="box box-warning">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Notes To Symbol Librarian</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <textarea class="form-control" name="notestolib" id="noteslibrarian" rows="3"></textarea>
                  </div>
                </div>
          </div>
          @endif
          @endif
          </div>
  <div class="col-md-8 offset-md-4">
   <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Enter Component Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Commodity Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="commodityCode" value="{{$commodityData->Commodity_Code or null}}" readonly>
                  </div>
                </div>
                 <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Part Type</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="partType" value="{{$commodityData->Commodity_Description or null}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="partDescription" id="faeditform"></textarea>
                    <p>"Refer the Part Description Standard document link below for the standard description formats"</p>
                    <a href="https://agileplm.juniper.net/Agile/link/Process%20Document%203_XX/J3.03.P01.W02/Rev/ECO-39837/files/J3.03.P01.W02_Part_Description_Standard_Rev31.xlsx::FOLDER435473" target="_blank">PDS File</a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                 {{--<p style="font-size:20px;border:1px solid grey;" onclick="resetfun()">Reset</p>--}}
                 

              </div>
              <!-- /.box-footer -->
            
          </div>
          <div class="col-md-12">
          @if($preliminaryData['vendorPNCount'] == '0-PN Assigner will assign all sources')
            <input type="hidden" class="form-control" name="mfr[]" value="TBD By P/N Assigner">
            <input type="hidden" class="form-control"  name="mpn[]" value="TBD By P/N Assigner">          
            <input type="hidden" class="form-control" name="mfr[]" value="TBD By P/N Assigner">
            <input type="hidden" class="form-control"  name="mpn[]" value="TBD By P/N Assigner">          
          @elseif($preliminaryData['vendorPNCount'] == '1-Requestor has one source. Comp.Eng to find others')
        <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Enter Vendor / Vendor PN Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 1</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mfr[]">
                  </div>
                </div>
                 <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 1 P/N</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="mpn[]">
                  </div>
                </div>
              </div>
            <input type="hidden" class="form-control" name="mfr[]" value="TBD By P/N Assigner">
            <input type="hidden" class="form-control"  name="mpn[]" value="TBD By P/N Assigner">          
          </div>
          @elseif($preliminaryData['vendorPNCount'] == '1-Part is only available from one Vendor')
        <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Enter Vendor / Vendor PN Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 1</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mfr[]">
                  </div>
                </div>
                 <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 1 P/N</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="mpn[]">
                  </div>
                </div>
              </div>
            <input type="hidden" class="form-control" name="mfr[]" value="NA">
            <input type="hidden" class="form-control"  name="mpn[]" value="NA">          
          </div>
          @else
          <h5>Vendor / Vendor PN Details</h5>
        <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Enter Vendor / Vendor PN Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 1</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mfr[]">
                  </div>
                </div>
                 <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 1 P/N</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="mpn[]">
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 2</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mfr[]">
                  </div>
                </div>
                 <div class="form-group row">
                  <label  class="col-sm-2 text-muted">Vendor 2 P/N</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="mpn[]">
                  </div>
                </div>
              </div>
          </div>
          @endif
          </div>
          <div class="col-md-12">
              <div class="box box-default">
                   <div class="box-header with-border">
                       <h3 class="box-title">Attachments</h3>
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </button>
                       {{--<div class="box-tools">
                            
                       </div>--}}
                   </div>
                   <div class="box-body">
                       <div class="row">
                          <div class="col-sm-4">
                             <div class="form-group">
                                  <label class="text-muted" for="exampleInputFile">Attachment</label>
                                  <input type="file" name="files[]" multiple id="exampleInputFile">
                             </div>
                          </div>
                          <div class="col-sm-4">
                             <div class="form-group">
                                  <label class="text-muted">Comments</label>
                                  <textarea class="form-control input-sm" name="description" rows="3" placeholder="Enter ..."></textarea>
                             </div>
                          </div>
                       </div>
                   </div>
              </div>
          </div>
          </div>
          <div class="col-md-12">
          <button type="submit" class="btn btn-md btn-info pull-right">Verify Part data</button>
          </div>

</div>
</form>
@endsection
@push('scripts')
<script>
  function resetfun() {
    //alert("dgfdgf");
$('#faeditform').val("");
}
</script>
@endpush

