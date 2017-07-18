@extends('layouts.main')
@section('sidebar')
<li class="header">Quick Navigation</li>
<li><a class="scroll" href="#requestsection"><i class="fa fa-circle-o text-aqua"></i><span> PNR Details</span></a></li>
                          <li><a class="scroll" href="#mpnsection"><i class="fa fa-circle-o text-red"></i><span> MPN Details</span></a></li>
                          <li><a class="scroll" href="#attachmentsection"><i class="fa fa-circle-o text-teal"></i><span> Attachments</span></a></li>
                          <li><a class="scroll" href="#inesscesection"><i class="fa fa-circle-o text-green"></i><span> InESS - CE Section</span></a></li>
                          <li><a class="scroll" href="#jpnsection"><i class="fa fa-circle-o text-blue"></i><span> JPN Section</span></a></li>
                          <li><a class="scroll" href="#jcesection"><i class="fa fa-circle-o text-navy"></i><span> JCE Section</span></a></li>
@endsection
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
        <h5>PNR Request Update Form</h5>

            <form action="{{route('PNR.Update',$pnr->Request_ID)}}" method="post"  enctype="multipart/form-data">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="Request_ID" class="form-control input-sm" value="{{$pnr->Request_ID}}">

               @include('pnr.pnrupdate')
               @include('pnr.mpn')
               @include('pnr.inessceupdate')
               @include('pnr.juniperceupdate')
                </div>  
                @role(['InESSCE','JCE'])
                 <div class="col-md-12">
                      <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                  </div>
                @endrole
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>

    function addotherrow()
    {
        $('#mpntbody').append(' <tr><td><input type="text" class="form-control" name="MFR[]"></td><td><input type="text" class="form-control" name="MPN[]"></td><td><select class="form-control" name="MPN_Lifecycle[]"><option></option><option value="Production">Production</option><option value="Prototype(Pre-Release)">Prototype(Pre-Release)</option><option value="Not Recommended for New Design">Not Recommended for New Design</option><option value="Obsolete">Obsolete</option><option value="Custom Part">Custom Part</option></select></td><td><select class="form-control" name="RoHSCOC[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To Collect Later</option></select></td><td><select class="form-control" name="REACHCOC[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Be Collect Later">To  Collect Later</option></select></td><td><select class="form-control" name="FMD[]"><option></option><option value="Yes">Yes</option><option value="Not Required">Not Required</option><option value="To Collect Later">To Collect Later</option></select></td></td><td><input type="text" class="form-control" name="Comments[]"></td></tr>');
    }
</script>
<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $(".scroll").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
@endpush
@endsection
