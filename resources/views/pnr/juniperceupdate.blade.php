{{--------------------------JCE role----------------------------}}
@role('JCE')
<div class="row" class="collapse" id="jcesection">
   <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Juniper CE Update Information</h4>
            </div>
            <div class="box-body">
              <div class="row">
                    <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted">Juniper CE Assessment Status</label>
                              <select name="Assessment_Status" class="form-control input-sm select2">
                            

                            <option value="CE Assessment Required" {{empty($jcedetails->Assessment_Status == 'CE Assessment Required')?'':'selected'}}>  CE Assessment Required</option>
                                       
                            <option value="CE Assessment In-Progress" {{empty($jcedetails->Assessment_Status == 'CE Assessment In-Progress')?'':'selected'}}>  CE Assessment In-Progress</option>
                                        
                            <option value="CE Assessment Completed" {{empty($jcedetails->Assessment_Status == 'CE Assessment Completed')?'':'selected'}}>  CE Assessment Completed</option>

                                 
                              </select>
                          </div>
                    </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted">Juniper CE Disposition</label>
                              <select name="Disposition" class="form-control input-sm select2">
                                 <option value=""></option>

                                  <option value="Approved" {{empty($jcedetails->Disposition == 'Approved')?'':'selected'}}>  Approved</option>

                                  <option value="Feedback" {{empty($jcedetails->Disposition == 'Feedback')?'':'selected'}}>  Feedback</option>

                                  <option value="Cancelled" {{empty($jcedetails->Disposition == 'Cancelled')?'':'selected'}}>  Cancelled</option>

                                 
                              </select>
                         </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="text-muted">Juniper CE Recommendation / Comments</label>
                              <input type="text" name="Recommedation" class="form-control input-sm" value="{{$jcedetails->Recommedation or null}}" >
                          </div>
                      </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
                          <div class="form-group">
                               <label class="text-muted">Technical Risk</label>
                               <select class="form-control input-sm select2" id="fduring" name="Technical_Risk" >
                                    <option value=""></option>

                                    <option value="0 - No Risk" {{empty($jcedetails->Technical_Risk == '0 - No Risk')?'':'selected'}}>  0 - No Risk</option>
                                        
                                    <option value="1 - No Risk But Not Recommended" {{empty($jcedetails->Technical_Risk == '1 - No Risk But Not Recommended')?'':'selected'}}>  1 - No Risk But Not Recommended</option>
                                          
                                    <option value="2 - ROHS Risk" {{empty($jcedetails->Technical_Risk == '2 - ROHS Risk')?'':'selected'}}>  2 - ROHS Risk</option>

                                    <option value="3 - Do Not Use" {{empty($jcedetails->Technical_Risk == '3 - Do Not Use')?'':'selected'}}>  3 - Do Not Use</option>

                                    <option value="NA - Not Relevent to ROHS" {{empty($jcedetails->Technical_Risk == 'NA - Not Relevent to ROHS')?'':'selected'}}>  NA - Not Relevent to ROHS</option>

                                    <option value="Not Determined" {{empty($jcedetails->Technical_Risk == 'Not Determined')?'':'selected'}}>  Not Determined</option>

                                   
                               </select>
                          </div>
                 </div>
                  <div class="col-sm-4">
                          <div class="form-group">
                                <label class="text-muted">Pb Free PCBA Assembly Process Compatible</label>
                                <select class="form-control input-sm select2" id="fduring" name="Free_PCBA_Assembly" >
                                    
                                  <option value=""></option>
                                  <option value="Yes" {{empty($jcedetails->Free_PCBA_Assembly == 'Yes')?'':'selected'}}>  Yes</option>
                                  <option value="No" {{empty($jcedetails->Free_PCBA_Assembly == 'No')?'':'selected'}}>  No</option>
                                  <option value="N/A" {{empty($jcedetails->Free_PCBA_Assembly == 'N/A')?'':'selected'}}>  N/A</option>

                                    
                                </select>
                          </div>
                 
                 </div>
              </div>
            </div>
        </div>
   </div>
</div>
@endrole


{{--------------------------Inessce / Cordinator role----------------------------}}
@role(['InESSCE','Coordinator'])
   <div class="col-sm-12">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="box-title">Juniper CE Update Information</h4>
            </div>
            <div class="box-body">
              <div class="row">
                    <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted">Juniper CE Assessment Status</label>
                              <input type="text" name="Assessment_Status" class="form-control" value="{{$jcedetails->Assessment_Status or null}}" readonly>
                          </div>
                    </div>

                     <div class="col-sm-4">
                          <div class="form-group">
                              <label class="text-muted">Juniper CE Disposition</label>
                              <input type="text" name="Disposition" class="form-control" value="{{$jcedetails->Disposition or null}}" readonly>
                             
                          </div>
                    </div>

                   
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="text-muted">Juniper CE Recommendation / Comments</label>
                            <input type="text" name="Recommedation" class="form-control input-sm" value="{{$jcedetails->Recommedation or null}}" readonly >
                        </div>
                    </div>
              </div>
              <div class="row">

                     <div class="col-sm-4">
                        <div class="form-group">
                            <label class="text-muted">Technical Risk</label>
                            <input type="text" name="Technical_Risk" class="form-control input-sm" value="{{$jcedetails->Technical_Risk or null}}" readonly >
                        </div>
                    </div>

                     <div class="col-sm-4">
                        <div class="form-group">
                            <label class="text-muted">Pb Free PCBA Assembly Process Compatible</label>
                            <input type="text" name="Free_PCBA_Assembly" class="form-control input-sm" value="{{$jcedetails->Free_PCBA_Assembly or null}}" readonly >
                        </div>
                    </div>
                   
                 
               
              </div>
            </div>
        </div>
   </div>
@endrole
