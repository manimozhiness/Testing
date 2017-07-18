<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PNR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/square/orange.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
.top-buffer { 
    margin-top:40px; 
}
.term {
    display: inline;
   padding:10px;
}
.topic {
    font-size:30px;
    color:#205081;
    font-family:Circular Pro Bold,Helvetica Neue,Helvetica,Arial,sans-serif;
    font-weight: bold;
}
.project {
    color: #696969;
    font-weight:bold;
    margin-bottom:10px;
}
.privacy {
    font-weight:bold;
}
.btntop {
margin-top:20px; 
}
pre {
  border: 0; background-color: transparent;
  font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
}
.pranchor {
  white-space: nowrap;
}
</style>
</head>
<div class="container">
<div class="row">
<div class="text-center top-buffer"><img src="{{asset('img/logo.png')}}" style="width: 50px;"><span class="topic">InESS Global Solutions</span></div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
  <p style="border-bottom:1px solid #ccc; width:80%;margin:auto;"></p>
</div>

</div>
<div class="row">
<div class="text-center project"><h2>PNR</h2></div>
</div>
<div class="row">
<div class="col-sm-4 col-sm-offset-4 top-buffer">
<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
<input type="hidden" value="{{ csrf_token() }}"name="token" class="_token">
    {{ csrf_field() }}
<input id="email" type="email" class="form-control emailid" placeholder="E-Mail" name="email" required autofocus>
<div class="text-center"><h6>By logging in, <span  class="privacy">you agree to the <a href="" class="pranchor">Privacy Policy</a>.</span></h6></div>
</div>
</div>
<div class="row">
<div class="col-sm-4 col-sm-offset-4 top-buffer">
<input type="password" class="form-control password" name="password" value="" required style="display:none; ">
</div>
</div> 
<div class="row">
 <div class="col-sm-4 col-sm-offset-4 btntop">
          <button type="button" onClick="checkemail();" class="btn btn-primary btn-lg nextbtn" style="font-weight:bold;">Next</button>
        </div>
        <div class="col-sm-4 col-sm-offset-4">
          <button type="submit" class="btn btn-primary btn-lg signbtn" style="display:none;">Sign In</button>
        </div>
</div>
<div class="row">
<div class="text-center"><a href="">Having trouble logging in?</a></div>
<div class="col-sm-6 col-sm-offset-3 top-buffer">
  <p style="border-bottom:1px solid #ccc; width:80%;margin:auto;"></p>
</div>
</div>

<div class="row">
<div class="text-center">Need an account? <a href="">Sign up.</a></div>
</div>
<div class="col-sm-4 col-sm-offset-4 top-buffer">
<!-- <div class="text-center" style="margin-top:120px;"><ul><li class="term">Terms of Use</li><li class="term">Support</li><li class="term">Privacy Policy</li></ul></div> -->
<!-- <div class="text-center"><span style="width:20px;">Terms Of Use</span><span style="width:20px;">Support</span><span style="width:20px;">Privacy Policy</span></div> -->
<pre class="text-center pre top-buffer"> <a href="">Terms of Use</a>    <a href="">Support</a>    <a href=""> Privacy Policy</a></pre>
</div>
</div>
</body>
</html>
<!-- jQuery 3.2.1 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.7-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(document).ready(function () {
   // $(".signbtn").css("visibility" , "hidden");
   // $(".passicon").css("visibility" , "hidden");
  //  $(".signbtn").hide();
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-orange',
      radioClass: 'iradio_square-orange',
    });
  });
  function checkemail() 
  {
    var _token = $("._token").val();
    var email_id = $(".emailid").val();
    if(email_id == '') {
     alert('Please fill the email id.');
     return;
    }
     $.ajax({
               type:'GET',
               url:'{{ url("checkmailid")}}',
               data:{token:_token, email:email_id},
               success:function(data){
                if(data=='success') {
                 $(".nextbtn").css("display" ,"none");
                 $(".signbtn").css("display" , "");
                 $(".password").css("display" , "");
                 $(".passicon").css("display" , "");
                 return;
                } else if(data=='error'){
                    alert('Email not found please register.');
                    return;
                }
               }
            });
    }
  
</script>
</body>
</html>