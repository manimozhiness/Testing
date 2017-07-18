<header class="main-header">

    <!-- Logo -->
    <a href="{{url('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset('img/logo.png')}}" style="height: 40px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset('img/logo.png')}}" style="height: 40px; margin-right: 5px;"><b>PNR</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
       <div class="navbar-custom-menu pull-left">
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
          <!-- Messages: style can be found in dropdown.less-->
          {{--@include('layouts.partials.megamenu')--}}
           @role(['admin','Coordinator'])
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
                <li class="user-header grey lighten-4 black-text" style="height: 180px;">
                  <div class="alert alert-warning yellow lighten-5 no-padding">
                    <p class="text-black">Developed & Maintained By <br> InESS Global Solutions</p>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <img src="{{asset('img/avatar.png')}}" class="img-circle img-responsive pull-left" alt="User Image">
                    </div>
                    <div class="col-sm-8 text-left">
                  <p class="black-text">
                    {{ Auth::user()->name }}
                    <small>{{ Auth::user()->email }}</small><br>
                    <small>{{Auth::user()->roles->implode('display_name')}}</small><br>
                    <small>Member since {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('M Y') }}</small>
                  </p>
                    </div>
                  </div>
                </li>
                <li class="user-footer grey lighten-3" style="border-top: 1px solid black;">
                  <div class="pull-left">
                    <a href="{{url('profile')}}" class="btn btn-default btn-flat">Profile</a>
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



            <li></li>
        </ul>
      </div>

    </nav>
  </header>
