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
