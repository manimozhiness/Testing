@extends('layouts.main')
@section('sidebar')
<li class="header">Quick Navigation</li>
<li><a class="scroll" href="#requestsection"><i class="fa fa-circle-o text-aqua"></i><span> PNR Details</span></a></li>
                          <li><a class="scroll" href="#mpnsection"><i class="fa fa-circle-o text-red"></i><span> MPN Details</span></a></li>
                          <li><a class="scroll" href="#attachmentsection"><i class="fa fa-circle-o text-teal"></i><span> Attachments</span></a></li>
                          <li><a class="scroll" href="#inesscesection"><i class="fa fa-circle-o text-green"></i><span> InESS - CE Section</span></a></li>
                          <li><a class="scroll" href="#jpnsection"><i class="fa fa-circle-o text-blue"></i><span> JPN Section</span></a></li>
                          <li><a class="scroll" href="#jcesection"><i class="fa fa-circle-o text-navy"></i><span> JCE Section</span></a></li>
                          <li><a class="scroll" href="#librarysection"><i class="fa fa-circle-o text-navy"></i><span> Library Section</span></a></li>
@endsection
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
        <h5>PNR Request Update Form</h5>

            <form action="{{route('Library.Update',$pnr->Request_ID)}}" method="post"  enctype="multipart/form-data">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="Request_ID" class="form-control input-sm" value="{{$pnr->Request_ID}}">

               @include('library.pnrupdate')
               @include('library.mpn')
               @include('library.inessceupdate')
               @include('library.juniperceupdate')
               @include('library.libraryupdate')

                </div>  
                 <div class="col-md-12">
                      <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                  </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
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
