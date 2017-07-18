
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MODULES</li>
       <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
        </li>
        @yield('sidebar')
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>