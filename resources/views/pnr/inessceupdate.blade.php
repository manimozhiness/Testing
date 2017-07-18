  {{--------------------------Inessce role----------------------------}}
  @role('InESSCE')
         <div class="col-md-12">
             <div class="box box-default">
                  <div class="box-header">
                       <h4 class="box-title">InESS CE Review</h4>
                  </div>
                  <div class="box-body">
                       <div class="row">
                       @if(((isset($jcedetails->Assessment_Status)?$jcedetails->Assessment_Status:'Default')!='CE Assessment Completed')||((isset($jcedetails->Disposition)?$jcedetails->Disposition:'Default')=='Feedback'))
                         
                            <div class="col-sm-4">
                                 <div class="form-group">
                                     <label class="text-muted">CE Assessment Status</label>
                                    <select name="CE_Assesment_Status" class="form-control input-sm select2" onchange="onselectinessceassessment(this.value)">
                                       <option value=""></option> 
                                      <option value="CE Assessment Required" {{ empty($inesscedetails->CE_Assesment_Status == 'CE Assessment Required')?'':'selected' }} >  CE Assessment Required</option>
                                       <option value="CE Assessment In-Progress" {{ empty($inesscedetails->CE_Assesment_Status == 'CE Assessment In-Progress')?'':'selected' }} >  CE Assessment In-Progress</option>
                                        <option value="CE Assessment Completed" {{ empty($inesscedetails->CE_Assesment_Status == 'CE Assessment Completed')?'':'selected' }} >  CE Assessment Completed</option>

                                  
                                   </select>
                                 </div>
                            </div>
                            <div class="col-sm-4">
                                 @if($inesscedetails->CE_Assesment_Status=='CE Assessment Completed')
                                <div class="form-group">
                                  <label class="text-muted">Juniper CE</label>
                                 <select name="JCE" id="jcefield" class="form-control input-sm select2" >
                                  <option value="{{$inesscedetails->JCE or null}}" selected="">{{$inesscedetails->JCE or null}}</option>
                                  @foreach($jce as $jces)
                                  <option value="{{$jces}}">{{$jces}}</option>
                                  @endforeach
                                  </select>
                                  </div>
                                @else
                               <div class="form-group">
                                  <label class="text-muted">Juniper CE</label>
                                 <select name="JCE" id="jcefield" class="form-control input-sm select2" disabled>
                                 <option value=""></option>
                                  <option value="{{$inesscedetails->JCE or null}}" selected="">{{$inesscedetails->JCE or null}}</option>
                                  @foreach($jce as $jces)
                                  <option value="{{$jces}}">{{$jces}}</option>
                                  @endforeach
                                 
                                  </select>
                                </div>
                                @endif

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-muted">CE Recommendation / Comments</label>
                                    <input type="textarea" name="CE_Recommedation" class="form-control input-sm" value="{{$FRS_Date_Status->CE_Recommedation or null}}" >
                                </div>
                            </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-4">
                              <div class="form-group">
                                  <label class="text-muted">  Single / Sole Source</label>
                                  <select name="AVL_TYPE" class="form-control input-sm select2" >
                                      <option value=""></option>
                                       <option value="Single Source" {{empty($inesscedetails->AVL_TYPE == 'Single Source')?'':'selected'}}>  Single Source</option>
                                        <option value="Sole Source" {{empty($inesscedetails->AVL_TYPE == 'Sole Source')?'':'selected'}}> Sole Source</option>
                                  </select>
                              </div> 
                          </div>
                         <div class="col-sm-4">
                                <div class="form-group">
                                      <label class="text-muted">Component Life Cycle Status</label>
                                      <select name="Component_Life_Cycle" class="form-control input-sm select2" >
                                       <option value=""></option>
                                         <option value="< 2 Years" {{empty($inesscedetails->Component_Life_Cycle == '< 2 Years')?'':'selected'}}> < 2 Years</option>
                                          <option value="> 2 Years" {{empty($inesscedetails->Component_Life_Cycle == '> 2 Years')?'':'selected'}}> > 2 Years</option>
                                          <option value="< 5 Years" {{empty($inesscedetails->Component_Life_Cycle == '< 5 Years')?'':'selected'}}> < 5 Years</option>
                                           <option value="EOL" {{empty($inesscedetails->Component_Life_Cycle == 'EOL')?'':'selected'}}> EOL</option>
                                     </select>
                                </div>
                         </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                     <label class="text-muted">  CQTR Required</label>
                                     <select name="CQTR" class="form-control input-sm select2" >
                                         <option value=""></option>
                                          <option value="Yes" {{empty($inesscedetails->CQTR == 'Yes')?'':'selected'}}>Yes</option>
                                          <option value="No" {{empty($inesscedetails->CQTR == 'No')?'':'selected'}}>No</option>
                                     </select>
                          
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
                                 <input type="text" name="JPN" id="jpnfield" class="form-control" value="{{$jpndetails->JPN or null}}" >
                           </div>
                     </div>
                     <div class="col-sm-4">
                           <div class="form-group">
                                <label class="text-muted">   JPN Assigned Date</label>
                                <input type="text" name="JPN_Assigned_Date" class="form-control datepicker" value="{{$jpndetails->JPN_Assigned_Date or null}}" >
                           </div>
                     </div>
                     <div class="col-sm-12">
                     </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                            <label class="text-muted">Outline Drawing #</label>
                            <input type="text" name="Outline_Drawing" class="form-control" value="{{$jpndetails->Outline_Drawing or null}}" >
                          </div>
                     </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                             <label class="text-muted">Schematic (SCH) #</label>
                             <input type="text" name="Schematic" class="form-control" value="{{$jpndetails->Schematic or null}}" >
                          </div> 
                     </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted"> Specification(SPEC) #</label>
                              <input type="text" name="Speciification" class="form-control" value="{{$jpndetails->Speciification or null}}" >
                          </div>
                    </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                            <label class="text-muted">  Redmine Ticket #</label>
                           
                            <input type="text" name="Redmine_Ticket" class="form-control" value="{{$jpndetails->Redmine_Ticket or null}}" >
                          </div>
                     </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                            <label class="text-muted">  Redmine Ticket CreationDate</label>
                           <input type="text" name="Redmine_Ticket_Created_Date" class="form-control datepicker" value="{{$jpndetails->Redmine_Ticket_Created_Date or null}}" >
                          </div> 
                    </div>
                    @else
                            <div class="col-sm-4">
                                 <div class="form-group">
                                     <label class="text-muted">CE Assessment Status</label>
                                    <input type="text" class="form-control" name="CE_Assesment_Status" value="{{$inesscedetails->CE_Assesment_Status or null}}" readonly>
                                 </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">

                                  <label class="text-muted">Juniper CE</label>
                                  <input type="text" class="form-control" name="JCE" value="{{$inesscedetails->JCE or null}}" readonly>
                                </div>
 
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="text-muted">CE Recommendation / Comments</label>
                                    <input type="text" class="form-control" name="CE_Recommedation" class="form-control input-sm" value="{{$inesscedetails->CE_Recommedation or null}}" readonly>
                                </div>
                     </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted">  Single / Sole Source</label>
                                  <input type="text" class="form-control" name="AVL_TYPE" value="{{$inesscedetails->AVL_TYPE or null}}" readonly>
                           </div> 
                      </div>
                   <div class="col-sm-4">
                          <div class="form-group">
                                <label class="text-muted">Component Life Cycle Status</label>
                                  <input type="text" class="form-control" name="Component_Life_Cycle" value="{{$inesscedetails->Component_Life_Cycle or null}}" readonly>
                          </div>
                   </div>
                    <div class="col-sm-4">
                            <div class="form-group">
                                  <input type="text" name="CQTR" class="form-control" value="{{$inesscedetails->CQTR or null}}" readonly>
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
                                <input type="text" name="JPN_Assigned_Date" class="form-control datepicker" value="{{$jpndetails->JPN_Assigned_Date or null}}" readonly>
                           </div>
                     </div>
                     <div class="col-sm-12">
                     </div>
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
                    @endif
                    <div class="col-sm-4">
                         <div class="row">
                                @if((isset($jcedetails->Disposition)?$jcedetails->Disposition:'Default')!='Feedback')
                             <div class="col-sm-6">
                          <div class="form-group">
                               <label class="text-muted">PNR Status</label>
                               <select class="form-control input-sm select2" id="fduring" name="PNR_Status" onchange="pnrstatusselect(this.value)">
                                   
                                     <option value="Open" {{empty($pnr->PNR_Status == 'Open')?'':'selected'}}>Open</option>
                                     <option value="Closed" {{empty($pnr->PNR_Status == 'Closed')?'':'selected'}}>Closed</option>
                               </select>
                            </div>
                            </div>
                               @else
                               <div class="col-sm-6">
                          <div class="form-group">
                                  <label class="text-muted">PNR Status</label>
                               <select class="form-control input-sm select2" id="fduring" name="PNR_Status" onchange="pnrstatusselect(this.value)">
                                    <option value=""></option>
                                     <option value="Open" {{empty($pnr->PNR_Status == 'Open')?'':'selected'}}>Open</option>
                               </select>
                               </div>
                               </div>
                               @endif

                              <div class="col-sm-6">
                                <div class="form-group">
                                <label class="text-muted">Approval Status</label>
                               <select class="form-control input-sm select2" id="pnrstatus2" name="PNR_Approval_Status" disabled>
                                     <option value=""></option>
                                      <option value="Approved" {{empty($pnr->PNR_Approval_Status == 'Approved')?'':'selected'}}>Approved</option>
                                       <option value="Cancelled" {{empty($pnr->PNR_Approval_Status == 'Cancelled')?'':'selected'}}>Cancelled</option>
                                        <option value="Rejected" {{empty($pnr->PNR_Approval_Status == 'Rejected')?'':'selected'}}>Rejected</option>
                                     
                               </select>
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
 
  @endrole
  {{------------------JCE Coordinator --------------------}}
   @role(['JCE','Coordinator'])

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
                                    <input type="text" name="CE_Recommedation" class="form-control input-sm" value="{{$inesscedetails->CE_Recommedation or null}}" readonly>
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


  @endrole
@push('scripts')
<script>
function onselectinessceassessment(n)
{
  if(n == 'CE Assessment Completed')
  {
$('#jcefield').removeAttr('disabled');
$('#jpnfield').attr('required','true');
  }

  else
  {
$('#jcefield').attr('disabled','true');
$('#jpnfield').removeAttr('required');

  }
}
function pnrstatusselect(n)
{
 if(n == 'Open')
 {
  $('#pnrstatus2').attr('disabled','true');
 } 
 else
 {
  $('#pnrstatus2').removeAttr('disabled');
 }
}

</script>
@endpush