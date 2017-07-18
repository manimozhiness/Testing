<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{url('home')}}" class="navbar-brand">
          <img src="{{asset('img/logo.png')}}" style="height: 40px; margin-top: -10px; margin-right: 5px;" class=" pull-left">
          <b>PNR</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
         <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
               <ul class="nav navbar-nav">
                 <li><a href="{{ url('/home') }}">Dashboard <span class="sr-only">(current)</span></a></li>
                  {{--<li><a href="{{ url('pnrrequestcreation') }}">Request Part Number</a></li>--}}
                  <li><a href="{{route('Preliminary')}}">Request Part Number</a></li>
                  <li><a href="{{url('search')}}">Search</a></li>
                  <li><a href="{{route('RequestID.Search')}}">Timeline</a></li>
                  
                  
                  @role('InESSCE')
                    <li><a href="{{ url('reports') }}">Reports</a></li>
                  @endrole
                  {{--<li><a href="{{ url('pnrrequestcreation') }}">Raise PNR Request</a></li>--}}
                  {{--<li><a href="{{route('Sales')}}">Sales</a></li>
                  <li><a href="#">compliance</a></li>
                  <li><a href="#">PDM</a></li>
                  <li><a href="#">Stock</a></li>--}}
                  
                </ul>
              </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           {{-- @include('layouts.partials.megamenu')--}}
            @role('admin')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('users.index')}}">Users</a></li>
                    <li><a href="{{route('roles.index')}}">Roles</a></li>
                </ul>
            </li>
             @endrole
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{asset('img/avatar.png')}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{asset('img/avatar.png')}}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name }}
                    <small>Member since {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('M Y') }}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Membership</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Invoice</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Apps</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>