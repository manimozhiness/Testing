{{--------------------------Inessce role----------------------------}}
@role(['InESSCE','JCE'])
<div class="row" class="collapse" id="requestsection">
     <div class="col-md-6">
          <div class="box box-default">
               <div class="box-body">
                     <div class="form-group row">
                            <label  class="col-sm-2 text-muted">Requestor:</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control" id="inputEmail3" name="requestorName" value="{{$pnr->requestorName}}">
                            </div>
                     </div>
                     <div class="form-group row">
                          <label  class="col-sm-2 text-muted">Requestor Email:</label>
                          <div class="col-sm-10">
                            <input type="email"readonly  class="form-control " name="requestorEmail" id="inputEmail3" value="{{$pnr->requestorEmail}}">
                          </div>
                     </div>
                     <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 text-muted">Requestor Site:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="inputEmail3" value="{{$pnr->requestedSite}}" name="requestedSite">
                          </div>
                     </div>
                     <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 text-muted">Request Date:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control datepicker" id="inputEmail3" value="{{$pnr->requestedDate}}" name="requestedDate">
                          </div>
                     </div>
                     <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 text-muted">Project Name:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control " id="inputEmail3" value="{{$pnr->projectName}}" name="projectName">
                          </div>
                     </div>
                    <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 text-muted">Board Name:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->boardName}}" name="boardName">
                          </div>
                    </div>
                    {{--<div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 text-muted">Notes Sym lib</label>
                          <div class="col-sm-10">
                             <input type="text" readonly name="notes_to_lib" class="form-control" id="inputPassword3" value="{{$pnr->notestolib}}">
                          </div>
                    </div>--}}
               </div>
          </div>
     </div>
     <div class="col-md-6">
          <div class="box box-default">
               <div class="box-body">
                     <div class="form-group row">
                           <label for="inputPassword3" class="col-sm-2 text-muted">Request Type:</label>
                           <div class="col-sm-10">
                              <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->requestorType}}" name="requestorType">
                           </div>
                     </div>
                     @if(((isset($jcedetails->Assessment_Status)?$jcedetails->Assessment_Status:'Default')!='CE Assessment Completed')||(((isset($jcedetails->Disposition)?$jcedetails->Disposition:'Default')=='Feedback')))

                     <div class="form-group row">
                             <label for="inputPassword3" class="col-sm-2 text-muted">Commodity Code:</label>
                            <div class="col-sm-10">
                                <select class="form-control input-sm select2" id="inputPassword3"  name="commodityCode" onchange="selectedClassCode(this.value)">

                                @foreach($commodity as $cm)
                                <option value="{{$cm->Commodity_Code}}" {{empty($pnr->commodityCode == $cm->Commodity_Code)? '': 'selected'}}>{{$cm->Commodity_Code}}</option>
                                @endforeach
                                </select>
                            </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Component Type:</label>
                               <div class="col-sm-10">
                                  <input type="text" class="form-control" id="commodityType" value="{{$pnr->partType}}" name="partType">
                               </div>
                      </div>
                     <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 text-muted">Description:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" value="{{$pnr->partDescription}}" name="partDescription">
                        </div>
                      </div>
                      @else
                     <div class="form-group row">
                             <label for="inputPassword3" class="col-sm-2 text-muted">Commodity Code:</label>
                             <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" value="{{$pnr->commodityCode}}" name="commodityCode" readonly>
                             </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Component Type:</label>
                               <div class="col-sm-10">
                                  <input type="text" class="form-control" id="commodityType" readonly value="{{$pnr->partType}}" name="partType">
                               </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Description:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->partDescription}}" name="partDescription">
                               </div>
                      </div>
                      @endif
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Schematic Symbol:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->symbolName}}" name="symbolName">
                               </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">PCB FootPrint:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->footPrintName}}" name="footPrintName">
                               </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Notes To Comp Eng:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly name="notes_to_ce" class="form-control" id="inputPassword3" value="{{$pnr->notestoce}}">
                               </div>
                      </div>
               </div>
          </div>
     </div>
</div>
@endrole

{{--------------------------coordinator,jce role----------------------------}}
@role('Coordinator')
 <div class="row" class="collapse" id="requestsection">
       <div class="col-md-6">
          <div class="box box-default">
               <div class="box-body">
                     <div class="form-group row">
                            <label  class="col-sm-2 text-muted">Requestor:</label>
                            <div class="col-sm-10">
                              <input type="text"  class="form-control" id="inputEmail3" name="requestorName" value="{{$pnr->requestorName}}" readonly>
                            </div>
                     </div>
                     <div class="form-group row">
                          <label  class="col-sm-2 text-muted">Requestor Email:</label>
                          <div class="col-sm-10">
                            <input type="email" readonly  class="form-control " name="requestorEmail" id="inputEmail3" value="{{$pnr->requestorEmail}}">
                          </div>
                     </div>
                     <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 text-muted">Requestor Site:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="inputEmail3" value="{{$pnr->requestedSite}}" name="requestedSite">
                          </div>
                     </div>
                     <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 text-muted">Request Date:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control datepicker" id="inputEmail3" value="{{$pnr->requestedDate}}" name="requestedDate">
                          </div>
                     </div>
                     <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 text-muted">Project Name:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control " id="inputEmail3" value="{{$pnr->projectName}}" name="projectName">
                          </div>
                     </div>
                    <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 text-muted">Board Name:</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->boardName}}" name="boardName">
                          </div>
                    </div>
                    <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 text-muted">Notes Sym lib</label>
                          <div class="col-sm-10">
                             <input type="text" readonly name="notes_to_lib" class="form-control" id="inputPassword3" value="{{$pnr->notestolib}}">
                          </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-md-6">
          <div class="box box-default">
               <div class="box-body">
                     <div class="form-group row">
                           <label for="inputPassword3" class="col-sm-2 text-muted">Request Type:</label>
                           <div class="col-sm-10">
                              <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->requestorType}}" name="requestorType">
                           </div>
                     </div>
                     <div class="form-group row">
                             <label for="inputPassword3" class="col-sm-2 text-muted">Commodity Code:</label>
                             <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" value="{{$pnr->commodityCode}}" name="commodityCode" readonly>
                             </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Component Type:</label>
                               <div class="col-sm-10">
                                  <input type="text" class="form-control" id="commodityType" readonly value="{{$pnr->partType}}" name="partType">
                               </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Schematic Symbol:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->symbolName}}" name="symbolName">
                               </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">PCB FootPrint:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly class="form-control" id="inputPassword3" value="{{$pnr->footPrintName}}" name="footPrintName">
                               </div>
                      </div>
                      <div class="form-group row">
                               <label for="inputPassword3" class="col-sm-2 text-muted">Notes To Comp Eng:</label>
                               <div class="col-sm-10">
                                   <input type="text" readonly name="notes_to_ce" class="form-control" id="inputPassword3" value="{{$pnr->notestoce}}">
                               </div>
                      </div>
               </div>
          </div>
     </div>
</div>
@endrole
@push('scripts')
<script>
function selectedClassCode(n)
{
      var m = $('#tokens').val();
     $.get("{{ url('getccdetails')}}",{cc:n,_token:m},function(data){
   
    if(data){
          $('#commodityType').attr('value',data);
      }
    });
}
</script>
@endpush