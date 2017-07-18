@extends('layouts.main')
@section('sidebar')
<li class="active"><a href="#sra" data-toggle="tab"><i class="fa fa-openid"></i> <span> OSLM</span></a></li>
@endsection
@section('title')
<h1>
  Open Source
</h1>
<ol class="breadcrumb">
  <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a class="active"><i class="fa fa-gears"></i> Open Source</a></li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="tab-content">
              <div class="tab-pane active" id="sra">
                <div class="row">
                <h4 class="col-sm-12">3rd Party/Open Source Licence Management</h4><br>
                  <div class="col-sm-6 col-md-4">
                  <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="ion ion-ios-speedometer-outline"></i>

                            <h3 class="box-title">Dashboard</h3>
                        </div>
                              <!-- /.box-header -->
                        <div class="box-body">
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-dashboard"></i> <span>Workload Dashboard</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-bar-chart"></i> <span>Metrics Report</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-user-circle"></i> <span>QC Dashboard</span></a>
                        </div>
                              <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                  <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="ion ion-android-wifi"></i>

                            <h3 class="box-title">Quality Events</h3>
                        </div>
                              <!-- /.box-header -->
                        <div class="box-body">
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-line-chart"></i> <span>Create/Validate QE</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-pie-chart"></i> <span>Backlog</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-area-chart"></i> <span>All Closed Events</span></a>
                        </div>
                              <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                  <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="ion ion-android-apps"></i>

                            <h3 class="box-title">General Events</h3>
                        </div>
                              <!-- /.box-header -->
                        <div class="box-body">
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-th"></i> <span>SCAR</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-th-list"></i> <span>QIP</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-trash"></i> <span>Remove Event</span></a>
                        </div>
                              <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                  <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="ion ion-flag"></i>

                            <h3 class="box-title">Reports</h3>
                        </div>
                              <!-- /.box-header -->
                        <div class="box-body">
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-calendar"></i> <span>Daily/Weekly Report</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion-merge"></i> <span>COCKPIT Report</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion-fireball"></i> <span>HEATMAP</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-database"></i> <span>Raw Data Extract</span></a>
                        </div>
                              <!-- /.box-body -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
  </div>
</div>
@endsection
