{{--------------------------Inessce role----------------------------}}
@role('InESSCE')
@if((isset($jcedetails->Assessment_Status)?$jcedetails->Assessment_Status:'Default')!='CE Assessment Completed')
 <div class="row" class="collapse" id="mpnsection">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">MPN</h3>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <div class="pull-left">
                 <a  onclick="addotherrow()"><i class="fa fa-plus"></i></a>
               </div>
               
               <table class="table table-hover" id="mpntable">
                            <thead>
                                <tr>
                                    <th>MFR</th>
                                    <th>MPN</th>
                                    <th>MPN Life Cycle</th>
                                    <th>ROHSCOC</th>
                                    <th>REACHCOC</th>
                                    <th>FMD</th>
                                    <th>Comments</th>
                                    
                                </tr>
                            </thead>
                           <tbody id="mpntbody">
                            @foreach($mpn as $mfr_mpn)
                                <tr>

                                  <td>
                                        <input type="text" class="form-control input-sm" name="MFR[]" value="{{$mfr_mpn->MFR}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MPN[]" value="{{$mfr_mpn->MPN}}">
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="MPN_Lifecycle[]">
                                        <option value=""></option>
                                        <option value="Prototype(Pre-Release)" {{ empty($mfr_mpn->MPN_Lifecycle == 'Prototype(Pre-Release)')? '':'selected' }}>  Prototype(Pre-Release)</option>
                                        <option value="Production" {{ empty($mfr_mpn->MPN_Lifecycle == 'Production')? '':'selected' }}>  Production</option>
                                        <option value="Not Recommended for New Design" {{ empty($mfr_mpn->MPN_Lifecycle == 'Not Recommended for New Design')? '':'selected' }}>  Not Recommended for New Design</option>
                                       <option value="Obsolete" {{ empty($mfr_mpn->MPN_Lifecycle == 'Obsolete')? '':'selected' }}>  Obsolete</option>
                                       <option value="Custom Part" {{ empty($mfr_mpn->MPN_Lifecycle == 'Custom Part')? '':'selected' }}>  Custom Part</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="RoHSCOC[]">
                                        <option value=""></option>
                                        <option value="Yes" {{ empty($mfr_mpn->RoHSCOC == 'Yes')? '':'selected' }}>  Yes</option>
                                        <option value="Not Required" {{ empty($mfr_mpn->RoHSCOC == 'Not Required')? '':'selected' }}>  Not Required</option>
                                         <option value="To Be Collect Later" {{ empty($mfr_mpn->RoHSCOC == 'To Be Collect Later')? '':'selected' }}>  To Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="REACHCOC[]">
                                        <option value=""></option>
                                         <option value="Yes" {{ empty($mfr_mpn->REACHCOC == 'Yes')? '':'selected' }}>  Yes</option>
                                        <option value="Not Required" {{ empty($mfr_mpn->REACHCOC == 'Not Required')? '':'selected' }}>  Not Required</option>
                                         <option value="To Be Collect Later" {{ empty($mfr_mpn->REACHCOC == 'To Be Collect Later')? '':'selected' }}>  To Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="FMD[]">
                                        <option value=""></option>
                                         <option value="Yes" {{ empty($mfr_mpn->FMD == 'Yes')? '':'selected' }}>  Yes</option>
                                        <option value="Not Required" {{ empty($mfr_mpn->FMD == 'Not Required')? '':'selected' }}>  Not Required</option>
                                         <option value="To Be Collect Later" {{ empty($mfr_mpn->FMD == 'To Be Collect Later')? '':'selected' }}>  To Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="Comments[]" value="{{$mfr_mpn->Comments}}">
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
  </div>
    <div class="row">
          <div class="col-md-12">
             <div class="box box-default">
                    <div class="box-header">
                      <h4 class="box-title">Uploaded File(s)</h4>
                    </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   <table class="table table-hover" id="mpntable">
                        <thead>
                                <tr>
                                    {{--<th>Category</th>--}}
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    {{--<td>{{$file->Category}}</td>--}}
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->Type}}</td>
                                    <td>{{$file->Size}}</td>
                                    <td>
                                        <a href="{{route('Download.Attachment',$file->Name)}}"><i class="fa fa-download" aria-hidden="true"></i></a>
                                        <a href="{{route('Delete.Attachment',$file->id)}}">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
  </div> 
  <div class="row">
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
</div>
@else
<div class="row" class="collapse" id="mpnsection">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">MPN</h3>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              {{-- <div class="pull-left">
                 <a  onclick="addotherrow()"><i class="fa fa-plus"></i></a>
               </div>--}}
               
               <table class="table table-hover" id="mpntable">
                            <thead>
                                <tr>
                                    <th>MFR</th>
                                    <th>MPN</th>
                                    <th>MPN Life Cycle</th>
                                    <th>ROHSCOC</th>
                                    <th>REACHCOC</th>
                                    <th>FMD</th>
                              
                                    <th>Comments</th>
                                    
                                </tr>
                            </thead>
                           <tbody id="mpntbody">
                            @foreach($mpn as $mfr_mpn)
                                <tr>

                                  <td>
                                        <input type="text" class="form-control input-sm" name="MFR[]" value="{{$mfr_mpn->MFR}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MPN[]" value="{{$mfr_mpn->MPN}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MPN_Lifecycle[]" value="{{$mfr_mpn->MPN_Lifecycle}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="RoHSCOC[]" value="{{$mfr_mpn->RoHSCOC}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="REACHCOC[]" value="{{$mfr_mpn->REACHCOC}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="FMD[]" value="{{$mfr_mpn->FMD}}" readonly>
                                    </td>
                                   
                                    <td>
                                        <input type="text" class="form-control input-sm" name="Comments[]" value="{{$mfr_mpn->Comments}}" readonly>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
  </div>
    <div class="row">
          <div class="col-md-12">
             <div class="box box-default">
                    <div class="box-header">
                      <h4 class="box-title">Uploaded File(s)</h4>
                    </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   <table class="table table-hover" id="mpntable">
                        <thead>
                                <tr>
                                   {{--<th>Category</th>--}} 
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    {{--<td>{{$file->Category}}</td>--}}
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->Type}}</td>
                                    <td>{{$file->Size}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
  </div> 
@endif
@endrole
{{--------------------------coordinator,jce role----------------------------}}
@role('JCE')
 <div class="row" class="collapse" id="mpnsection">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">MPN</h3>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <div class="pull-left">
                 <a  onclick="addotherrow()"><i class="fa fa-plus"></i></a>
               </div>
               
               <table class="table table-hover" id="mpntable">
                            <thead>
                                <tr>
                                    <th>MFR</th>
                                    <th>MPN</th>
                                    <th>MPN Life Cycle</th>
                                    <th>ROHSCOC</th>
                                    <th>REACHCOC</th>
                                    <th>FMD</th>
                                    <th>Comments</th>
                                    
                                </tr>
                            </thead>
                           <tbody id="mpntbody">
                            @foreach($mpn as $mfr_mpn)
                                <tr>

                                  <td>
                                        <input type="text" class="form-control input-sm" name="MFR[]" value="{{$mfr_mpn->MFR}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MPN[]" value="{{$mfr_mpn->MPN}}">
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="MPN_Lifecycle[]">
                                        <option value="Prototype(Pre-Release)" {{ empty($mfr_mpn->MPN_Lifecycle == 'Prototype(Pre-Release)')? '':'selected' }}>  Prototype(Pre-Release)</option>
                                        <option value="Production" {{ empty($mfr_mpn->MPN_Lifecycle == 'Production')? '':'selected' }}>  Production</option>
                                        <option value="Not Recommended for New Design" {{ empty($mfr_mpn->MPN_Lifecycle == 'Not Recommended for New Design')? '':'selected' }}>  Not Recommended for New Design</option>
                                       <option value="Obsolete" {{ empty($mfr_mpn->MPN_Lifecycle == 'Obsolete')? '':'selected' }}>  Obsolete</option>
                                       <option value="Custom Part" {{ empty($mfr_mpn->MPN_Lifecycle == 'Custom Part')? '':'selected' }}>  Custom Part</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="RoHSCOC[]">
                                        <option value="Yes" {{ empty($mfr_mpn->RoHSCOC == 'Yes')? '':'selected' }}>  Yes</option>
                                        <option value="Not Required" {{ empty($mfr_mpn->RoHSCOC == 'Not Required')? '':'selected' }}>  Not Required</option>
                                         <option value="To Be Collect Later" {{ empty($mfr_mpn->RoHSCOC == 'To Be Collect Later')? '':'selected' }}>  To Be Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="REACHCOC[]">
                                         <option value="Yes" {{ empty($mfr_mpn->REACHCOC == 'Yes')? '':'selected' }}>  Yes</option>
                                        <option value="Not Required" {{ empty($mfr_mpn->REACHCOC == 'Not Required')? '':'selected' }}>  Not Required</option>
                                         <option value="To Be Collect Later" {{ empty($mfr_mpn->REACHCOC == 'To Be Collect Later')? '':'selected' }}>  To Be Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm select2" name="FMD[]">
                                         <option value="Yes" {{ empty($mfr_mpn->FMD == 'Yes')? '':'selected' }}>  Yes</option>
                                        <option value="Not Required" {{ empty($mfr_mpn->FMD == 'Not Required')? '':'selected' }}>  Not Required</option>
                                         <option value="To Be Collect Later" {{ empty($mfr_mpn->FMD == 'To Be Collect Later')? '':'selected' }}>  To Be Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="Comments[]" value="{{$mfr_mpn->Comments}}">
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
  </div>
    <div class="row">
          <div class="col-md-12">
             <div class="box box-default">
                    <div class="box-header">
                      <h4 class="box-title">Uploaded File(s)</h4>
                    </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   <table class="table table-hover" id="mpntable">
                        <thead>
                                <tr>
                                   {{--<th>Category</th>--}} 
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                     <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    {{--<td>{{$file->Category}}</td>--}}
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->Type}}</td>
                                    <td>{{$file->Size}}</td>
                                     <td>
                                        <a href="{{route('Download.Attachment',$file->Name)}}"><i class="fa fa-download" aria-hidden="true"></i>
                                       
                                        </a>
                                        @if((isset($file->Uploaded_By)?$file->Uploaded_By:'Default')!=Auth::user()->email)
                                        
                                        <a href="{{route('Delete.Attachment',$file->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
  </div> 

@endrole

@role('Coordinator')
<div class="row" class="collapse" id="mpnsection">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">MPN</h3>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down" aria-hidden="true"></i>
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              {{-- <div class="pull-left">
                 <a  onclick="addotherrow()"><i class="fa fa-plus"></i></a>
               </div>--}}
               
               <table class="table table-hover" id="mpntable">
                            <thead>
                                <tr>
                                    <th>MFR</th>
                                    <th>MPN</th>
                                    <th>MPN Life Cycle</th>
                                    <th>ROHSCOC</th>
                                    <th>REACHCOC</th>
                                    <th>FMD</th>
                              
                                    <th>Comments</th>
                                    
                                </tr>
                            </thead>
                           <tbody id="mpntbody">
                            @foreach($mpn as $mfr_mpn)
                                <tr>

                                  <td>
                                        <input type="text" class="form-control input-sm" name="MFR[]" value="{{$mfr_mpn->MFR}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MPN[]" value="{{$mfr_mpn->MPN}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MPN_Lifecycle[]" value="{{$mfr_mpn->MPN_Lifecycle}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="RoHSCOC[]" value="{{$mfr_mpn->RoHSCOC}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="REACHCOC[]" value="{{$mfr_mpn->REACHCOC}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="FMD[]" value="{{$mfr_mpn->FMD}}" readonly>
                                    </td>
                                   
                                    <td>
                                        <input type="text" class="form-control input-sm" name="Comments[]" value="{{$mfr_mpn->Comments}}" readonly>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
  </div>
    <div class="row">
          <div class="col-md-12">
             <div class="box box-default">
                    <div class="box-header">
                      <h4 class="box-title">Uploaded File(s)</h4>
                    </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                   <table class="table table-hover" id="mpntable">
                        <thead>
                                <tr>
                                   {{--<th>Category</th>--}} 
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    {{--<td>{{$file->Category}}</td>--}}
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->Type}}</td>
                                    <td>{{$file->Size}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
  </div> 

@endrole