<div class="row" class="collapse" id="inesscesection">
        <div class="col-md-12">
             <div class="box box-default">
                  <div class="box-header">
                       <h4 class="box-title">InESS CE Review</h4>
                  </div>
                  <div class="box-body">
                       <div class="row">
                            <div class="col-sm-4">
                                 <div class="form-group">


                                     <label class="text-muted">CE Assessment Status</label>
                                      <input type="text" name="CE_Assesment_Status" class="form-control input-sm" value="{{$inesscedetails->CE_Assesment_Status or null}}" readonly>
                                 
                                 </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                   <label class="text-muted">Juniper CE</label>
                                   <input type="text" name="JCE" class="form-control input-sm" value="{{$inesscedetails->JCE or null}}" readonly>

                                  
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-muted">CE Recommendation / Comments</label>
                                    <input type="textarea" name="CE_Recommedation" class="form-control input-sm" value="{{$inesscedetails->CE_Recommedation or null}}" readonly>
                                </div>
                            </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted">  Single / Sole Source</label>
                               <input type="text" name="AVL_TYPE" class="form-control input-sm" value="{{$inesscedetails->AVL_TYPE or null}}" readonly>
                             
                          </div> 
                      </div>
                     <div class="col-sm-4">
                            <div class="form-group">
                                  <label class="text-muted">Component Life Cycle Status</label>
                                    <input type="text" name="Component_Life_Cycle" class="form-control input-sm" value="{{$inesscedetails->Component_Life_Cycle or null}}" readonly>
                               
                            </div>
                     </div>
                      <div class="col-sm-4">
                              <div class="form-group">
                                   <label class="text-muted">  CQTR Required</label>
                                    <input type="text" name="CQTR" class="form-control input-sm" value="{{$inesscedetails->CQTR or null}}" readonly>
                              </div>
                      </div>
                     </div>
                  </div>
            <div class="box-header">
              <h4 class="box-title">Issued Item Number Details</h4>
            </div>
            <div class="box-body">
                <div class="row">
                     <div class="col-sm-4">
                           <div class="form-group">
                                 <label class="text-muted">JPN #</label>
                                 <input type="text" name="JPN" id="jpnfield" class="form-control" value="{{$jpndetails->JPN or null}}" readonly>
                           </div>
                     </div>
                     <div class="col-sm-4">
                           <div class="form-group">
                                <label class="text-muted">   JPN Assigned Date</label>
                                <input type="text" name="JPN_Assigned_Date" class="form-control" value="{{$jpndetails->JPN_Assigned_Date or null}}" readonly>
                           </div>
                     </div>
                     <div class="col-sm-12"></div>
                     <div class="col-sm-4">
                          <div class="form-group">
                            <label class="text-muted">Outline Drawing #</label>
                            <input type="text" name="Outline_Drawing" class="form-control" value="{{$jpndetails->Outline_Drawing or null}}" readonly>
                          </div>
                     </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                             <label class="text-muted">Schematic (SCH) #</label>
                             <input type="text" name="Schematic" class="form-control" value="{{$jpndetails->Schematic or null}}" readonly>
                          </div> 
                     </div>
                     
                     <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted"> Specification(SPEC) #</label>
                              <input type="text" name="Speciification" class="form-control" value="{{$jpndetails->Speciification or null}}" readonly>
                          </div>
                    </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                            <label class="text-muted">  Redmine Ticket #</label>
                           
                            <input type="text" name="Redmine_Ticket" class="form-control" value="{{$jpndetails->Redmine_Ticket or null}}" readonly>
                          </div>
                     </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                            <label class="text-muted">  Redmine Ticket CreationDate</label>
                           <input type="text" name="Redmine_Ticket_Created_Date" class="form-control" value="{{$jpndetails->Redmine_Ticket_Created_Date or null}}" readonly>
                          </div> 
                    </div>
                    <div class="col-sm-4">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                               <label class="text-muted">PNR Status</label>
                                <input type="text" name="PNR_Status" class="form-control" value="{{$pnr->PNR_Status or null}}" readonly>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-muted"></label>
                            <input type="text" name="PNR_Approval_Status" class="form-control" value="{{$pnr->PNR_Approval_Status or null}}" readonly>
                          </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
            </div>
          </div>
      </div>
  </div>
