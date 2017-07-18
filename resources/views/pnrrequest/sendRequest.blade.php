@extends('layouts.main')

@section('content')
<form action="{{url('savePNRRequesttoDB')}}" method="post">
{{csrf_field()}}
<input type="hidden" value="{{$partpremilinary['symbolFootprintNeeds']}}" name="symbolFootprintNeeds">
<input type="hidden" value="{{$partpremilinary['existingSchematicSymbol']}}" name="existingSchematicSymbol">
<input type="hidden" value="{{$partpremilinary['NoSymbolorFootprint']}}" name="NoSymbolorFootprint">
<input type="hidden" value="{{$partpremilinary['existingPCBFootprint']}}" name="existingPCBFootprint">
<input type="hidden" value="{{$partpremilinary['vendorPNCount']}}" name="vendorPNCount">
<div class="row">
  <div class="col-md-12 text-left">
      <span class="small">Enter Preliminary Data -> Enter Part Data -> Verify Part Data -><strong>Send Request/Attach Spec</strong></span>
  </div>
    <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="box box-default box-solid">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Send Request/Attach Spec</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
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
                    <input type="text" class="form-control datepicker" id="inputEmail3" value="{{$partpremilinary['projectName']}}" name="projectName" readonly>
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
                  <label for="inputPassword3" class="col-sm-2 text-muted">Component Type:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['partType']}}" name="partType" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Commodity Code:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{$partpremilinary['commodityCode']}}" name="commodityCode" readonly>
                  </div>
                </div>
                @php
                $i = 0;
                @endphp
                @for($i=0;$i<sizeof($mfr);$i++)
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Vendor {{$i+1}}</label>
                  <div class="col-sm-10">
                     <input type="text" value="{{$mfr[$i]}}" name="MFR[]" class="form-control" id="inputPassword3">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Pin {{$i+1}}</label>
                  <div class="col-sm-10">
                     <input type="text" value="{{$mpn[$i]}}" name="MPN[]" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <input type="hidden" value="{{$lc[$i]}}" name="MPN_Lifecycle[]">
                <input type="hidden" value="{{$rohs[$i]}}" name="RoHSCOC[]">
                <input type="hidden" value="{{$reach[$i]}}" name="REACHCOC[]">
                <input type="hidden" value="{{$fmd[$i]}}" name="FMD[]">
                @endfor

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
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">New 750 BIN file required?:</label>
                  <div class="col-sm-10">
                   
                     <select  name="BIN_file" class="form-control input-sm " style="width: 100%;">
                          <option></option>
                      <option value="Yes">Yes</option>
                      <option value="NO">No</option>
                      </select>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">New OUTLN Part Number required?:</label>
                  <div class="col-sm-10">
                    <select name="outlint_part_number" class="form-control input-sm " style="width: 100%;">
                      <option></option>
                      <option value="Yes">Yes</option>
                      <option value="NO">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">New Spec Part Number required?:</label>
                  <div class="col-sm-10">
                    <select name="spec_part_number" class="form-control input-sm " style="width: 100%;">
                      <option></option>
                      <option value="Yes">Yes</option>
                      <option value="NO">No</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Description</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" name="partDescription" rows="3">{{$partpremilinary['partDescription']}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Notes To be Comp Eng:</label>
                  <div class="col-sm-10">
                     <input type="text" name="notes_to_ce" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 text-muted">Notes Sym lib</label>
                  <div class="col-sm-10">
                     <input type="text" name="notes_to_lib" class="form-control" id="inputPassword3">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
                
              <!-- /.box-footer -->
          </div>
    </div>
</div>
    <div class="row">
         <div class="col-sm-12 col-md-10 col-md-offset-1">
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
                              <div class="form-group ">
                                  <label class="text-muted">Category</label>
                                  <select name="Category" class="form-control input-sm" style="width: 100%;">
                                    <option value=""></option>
                                    <option value="DataSheet">DataSheet</option>
                                    <option value="RoHs">RoHs</option>
                                    <option value="REACH">REACH</option>
                                    <option value="FMD">FMD</option>
                                    <option value="Checklist">Checklist</option>
                                    <option value="Additional Docs">Additional Docs</option>
                                  </select>
                              </div>
                          </div>
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
         <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <button type="submit" class="btn btn-info pull-right">Send Request</button>
         </div>
    </div>



</form>
@endsection
@push('scripts')

@endpush

