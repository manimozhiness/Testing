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
