<div class="col-sm-12">
      <div class="box box-default">
          <div class="box-header">
              <h4 class="box-title">Library Update Information</h4>
          </div>
          <div class="box-body">
            <div class="row">
                <div class="col-sm-4">
                      <div class="form-group">
                          <label class="text-muted">Librarian Assessment Status</label>
                          <select name="Library_Assessment_Status" class="form-control input-sm select2" onchange="libraryselect(this.value)">
                        

                        <option value="Assessment Required" {{empty($librarydetails->Library_Assessment_Status == 'Assessment Required')?'':'selected'}}>  Assessment Required</option>
                                   
                        <option value="Assessment In-Progress" {{empty($librarydetails->Library_Assessment_Status == 'Assessment In-Progress')?'':'selected'}}>  Assessment In-Progress</option>
                                    
                        <option value="Assessment Completed" {{empty($librarydetails->Library_Assessment_Status == 'Assessment Completed')?'':'selected'}}>  Assessment Completed</option>

                             
                          </select>
                      </div>
                </div>
                <div class="col-sm-4">
                      <div class="form-group">
                          <label class="text-muted">Priority</label>
                          <select name="Priority" class="form-control input-sm select2">
                        

                        <option value="FT" {{empty($librarydetails->Priority == 'FT')?'':'selected'}}>  FT</option>
                                   
                        <option value="NP" {{empty($librarydetails->Priority == 'NP')?'':'selected'}}>  NP</option>
                                    
                        <option value="OH" {{empty($librarydetails->Priority == 'OH')?'':'selected'}}>  OH</option>

                          </select>
                      </div>
                </div>
                <div class="col-sm-4">
                      <div class="form-group">
                          <label class="text-muted">Comments</label>
                          <textarea class="form-control" name="Priority_Comments" id="notesCE" rows="3" value="{{$librarydetails->Priority_Comments or null}}">{{$librarydetails->Priority_Comments or null}}</textarea>
                      </div>
                </div>
                <div class="col-sm-4">
                      <div class="form-group">
                          <label class="text-muted">Worked BY</label>
                          <select name="Worked_By" class="form-control input-sm select2">
                        

                           @foreach($libraymember as $member)
                           <option value="{{$member}}" {{empty($librarydetails->Worked_By == $member)?'':'selected'}}>  {{$member}}</option>
                           @endforeach        

                          </select>
                      </div>
                </div>
                <div class="col-sm-4">
                      <div class="form-group">
                          <label class="text-muted">Symbol</label>
                          <input type="text" name="Symbol" id="symbolfield" class="form-control" value="{{$librarydetails->Symbol or null}}" readonly>
                      </div>
                </div>
                <div class="col-sm-4">
                      <div class="form-group">
                          <label class="text-muted">Footprint</label>
                          <input type="text" name="Footprint" id="footprintfield" class="form-control" value="{{$librarydetails->Footprint or null}}" readonly>
                      </div>
                </div>
                <div class="col-sm-6">
                      <div class="form-group">
                          <label class="text-muted">Completed By</label>
                          <input type="text" name="Completed_BY" id="jpnfield" class="form-control" value="{{Auth::user()->name}}" readonly>
                      </div>
                </div>
                <div class="col-sm-6">
                      <div class="form-group">
                          <label class="text-muted">Completed Date</label>
                          <input type="text" name="Completed_Date" id="jpnfield" class="form-control" value="{{Carbon\Carbon::now()->setTimezone('America/Vancouver')}}" readonly>
                      </div>
                </div>

            </div>
          </div>
      </div>
</div>
@push('scripts')
<script>
function libraryselect(n)
{
  if( n != 'Assessment Completed')
  {
    $('#symbolfield').attr('readonly','true');
    $('#footprintfield').attr('readonly','true');
    $('#symbolfield').removeAttr('required');
    $('#footprintfield').removeAttr('required');
  }
  else
  {
    $('#symbolfield').removeAttr('readonly');
    $('#footprintfield').removeAttr('readonly');
    $('#symbolfield').attr('required','true');
    $('#footprintfield').attr('required','true');
  }
}
</script>
@endpush