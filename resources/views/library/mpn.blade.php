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
                                        {{--<a href="{{route('Delete.Attachment',$file->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>--}}
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
