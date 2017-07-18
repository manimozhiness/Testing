@extends('layouts.app')

@section('content')
<div class="container">
   <h4>
        Part Number Request Form
   </h4>
    <form action="{{url('pnrrequestsubmission')}}" method="post" enctype="multipart/form-data">
           
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <div class="row">
       <div class="col-md-6">
           <div class="box box-success">
                <div class="box-body">
                    <div class="form-group">
                        <label class="text-muted" for="exampleInputEmail1">Request ID</label>
                        <input type="text" name="Request_ID" class="form-control input-sm"  required id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="exampleInputEmail1">Requestor Name</label>
                        <input type="text" name="Requestor_Name" class="form-control input-sm" >
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Request Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="Requested_Date" class="form-control input-sm datepicker pull-right" >
                        </div>
                <!-- /.input group -->
                    </div>
                    <div class="form-group">
                          <label class="text-muted" for="exampleSelect1">Requestor Email</label>
                          <input type="text" name="Requestor_Email" class="form-control input-sm" >
                    </div> 
                    <div class="form-group">
                      <label class="text-muted">Location</label>
                      <select  name="Location_Name" class="form-control input-sm " style="width: 100%;">
                          <option></option>
                          <option value="Sunnyvale">Sunnyvale</option>
                          <option value="Bangalore">Bangalore</option>
                          <option value="Beijing">Beijing</option>
                          <option value="Fredrick">Fredrick</option>
                          <option value="Westford">Westford</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="text-muted">Project Name</label>
                      <select  name="Project_Name" class="form-control input-sm " style="width: 100%;">
                            <option></option>
                            <option>Manufacturing Line</option>
                            <option>Field</option>
                            <option>Audit</option>
                            <option>Burn-in or Qualification</option>
                            <option>Outgoing QA</option>
                            <option value="otherfailureduring">Other (Please specify)</option>
                      </select>
                    </div>

                </div>
           </div>
       </div>
       <div class="col-md-6">
           <div class="box box-primary">
                <div class="box-body">
                      <div class="form-group">
                          <label class="text-muted">AVL Type</label>
                          <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                                <select name="AVL_Type" class="form-control input-sm " style="width: 100%;">
                                  <option value=""></option>
                                      <option>Sole</option>
                                      <option>Multi</option>
                                </select>
                          </div>
                      </div>
                      <div class="form-group">
                            <label class="text-muted">Part Identified</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-wrench"></i></span>
                                <select name="Part_Identified" class="form-control input-sm " style="width: 100%;">
                                    <option></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="text-muted">Priority Type</label>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-level-up"></i></span>
                            <select name="Priority_Type" class="form-control input-sm fa fa-plus" style="width: 100%;">

                              <option></option>
                              <option value="Expedited(3 Days)">Expedited(3 Days)</option>
                              <option value="Standard(7 Days)">Standard(7 Days)</option>
                              <option value="Immediate">Immediate</option>
                            </select>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="text-muted">Specification</label>
                          <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
                                <select  name="Specification" class="form-control input-sm " style="width: 100%;">
                                   <option value=""></option>
                                    <option>YES</option>
                                    <option>NO</option>
                                </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="text-muted">Schematic</label>
                          <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-hdd-o"></i></span>
                                <select name="Schematic" class="form-control input-sm " style="width: 100%;">
                                    <option value=""></option>
                                    <option>YES</option>
                                    <option>NO</option>
                                </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="text-muted">Outline Drawing</label>
                           <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <select name="Outline_Drawing" class="form-control input-sm " style="width: 100%;">
                                      <option value=""></option>
                                      <option>YES</option>
                                      <option>NO</option>
                                </select>
                           </div>
                      </div>
                      
                </div>
           </div>
       </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <div class="box box-info">
              <div class="box-body">
                <div class="form-group">
                        <label class="text-muted">Class Code</label>
                        <select name="Class_Code" id="ftype" onchange="loadClassCode(this.value)" class="form-control input-sm " style="width: 100%;">
                              <option value=""></option>
                              @foreach($classcode as $cc)
                              <option value="{{$cc}}">{{$cc}}</option>
                              @endforeach
                        </select>
                </div>
                 <div class="form-group">
                        <label class="text-muted">Commodity Code and Description</label>
                        <select  name="Class_Desc" class="form-control input-sm "  id="cccodeanddescription" onchange="getPartdescription(this.value)" style="width: 100%;">
                                <option value=""></option>
                        </select>
                 </div>
                 <div class="form-group" id="partdescription">
                        <label class="text-muted">Part Description</label>
                        <textarea name="Part_Desc"  class="form-control input-sm" rows="3" ></textarea>
                 </div>
                 
                 <div class="form-group">
                        <label class="text-muted" for="exampleInputEmail1">Base JPN</label>
                        <input type="text" name="Base_JPN" class="form-control input-sm"  required id="exampleInputEmail1">
                 </div>

              </div>
         </div>
       </div>
       <div class="col-md-6">
            <div class="box box-warning">
                 <div class="box-body">
                      <div class="form-group">
                  <label class="text-muted" for="exampleInputEmail1">Notes to Comp Eng</label>
                  <textarea name="Notes_to_CE" class="form-control input-sm" rows="3" placeholder="Enter ..."></textarea>
                </div>
                 </div>
            </div>
       </div>
    </div>
    <div class="row">
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
                                    <th>Commited Date</th>
                                    <th>Comments</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="mpntbody">
                                <tr>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="MFR[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="MPN[]">
                                    </td>
                                    <td>
                                        <select class="form-control input-sm" name="MPN_Lifecycle[]">
                                            <option></option>
                                            <option value="Production">Production</option>
                                            <option value="Prototype(Pre-Release)">Prototype(Pre-Release)</option>
                                            <option value="Not Recommended for New Design">Not Recommended for New Design</option>
                                            <option value="Obsolete">Obsolete</option>
                                            <option value="Custom Part">Custom Part</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm" name="RoHSCOC[]">
                                            <option></option>
                                            <option value="Yes">Yes</option>
                                            <option value="Not Required">Not Required</option>
                                            <option value="To Be Collect Later">To Be Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm" name="REACHCOC[]">
                                            <option></option>
                                            <option value="Yes">Yes</option>
                                            <option value="Not Required">Not Required</option>
                                            <option value="To Be Collect Later">To Be Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm" name="FMD[]">
                                            <option></option>
                                            <option value="Yes">Yes</option>
                                            <option value="Not Required">Not Required</option>
                                            <option value="To Be Collect Later">To Be Collect Later</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class=" datepicker form-control input-sm" name="Commited_Date[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="Comments[]">
                                    </td>
                                    
                                    <td><a class="red-text" onclick="deleteRow(this)"><i class="fa fa-trash "></i></a></td>
                                    
                                </tr>
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
    </div>
    <div class="row">
         <div class="col-md-12 ">
                      <button type="submit" class="btn btn-primary pull-right" >Submit</button>
         </div>  
    </div>
    </form>
</div>
@endsection
@push('scripts')
<script>

  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;

    document.getElementById("mpntable").deleteRow(i);
}
   function addotherrow()
    {
        $('#mpntbody').append(' <tr onclick="deleterow(this)"><td><input type="text" class="form-control" name="MFR[]"></td><td><input type="text" class="form-control" name="MPN[]"></td><td><select class="form-control input-sm" name="MPN_Lifecycle[]"><option></option><option value="Production">Production</option><option value="Prototype(Pre-Release)">Prototype(Pre-Release)</option><option value="Not Recommended for New Design">Not Recommended for New Design</option><option value="Obsolete">Obsolete</option><option value="Custom Part">Custom Part</option></select></td><td><select class="form-control input-sm" name="RoHSCOC[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Be Collect Later</option></select></td><td><select class="form-control input-sm" name="REACHCOC[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Be Collect Later</option></select></td><td><select class="form-control input-sm" name="FMD[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Be Collect Later</option></select></td><td><input type="text" class=" datepicker form-control" name="Commited_Date[]"></td><td><input type="text" class="form-control" name="Comments[]"></td><td><a onclick="deleteRow(this)"><i class="fa fa-trash"></i></a></td></tr>');
    }

</script>
<script>
    function loadClassCode(n)
    {
      
      var m = $('#tokens').val();
     $.get("{{ url('getccdetails')}}",{cc:n,_token:m},function(data){
   
    if(data){
      
      $("#cccodeanddescription").empty();
    $("#cccodeanddescription").prepend('<option value="" ></option>');
          for (i = 0; i < data.length; i++) {
           
        $("#cccodeanddescription").append('<option value="'+data[i].Commodity_Code+'=>'+data[i].Commodity_Description+'">'+data[i].Commodity_Code+'=>'+data[i].Commodity_Description+'</option>');

    }    
    return;
        }
     });

    }
    </script>
    <script>
    function getPartdescription(d)
    {
      
      var m = $('#tokens').val();
     $.get("{{ url('getccdescription')}}",{cc:d,_token:m},function(data){
   
    if(data){
    
      $("#partdescription").empty();

        $("#partdescription").append('<label class="text-muted">Part Description</label><textarea name="Part_Desc" class="form-control" value="'+data.Item_Naming_Convention+'">'+data.Item_Naming_Convention+'</textarea>');

    return;
        }
     });
    }
    </script>
@endpush

