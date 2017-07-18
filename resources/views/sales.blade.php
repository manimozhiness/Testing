@extends('layouts.main')
@section('sidebar')
<li class="active"><a href="#sra" data-toggle="tab"><i class="fa fa-users"></i> <span> CRM</span></a></li>
@endsection
@section('title')
<h1>
  Sales
</h1>
<ol class="breadcrumb">
  <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a class="active"><i class="fa fa-gears"></i> Saless</a></li>
</ol>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="tab-content">
              <div class="tab-pane active" id="sra">
                <div class="row">
                <h4 class="col-sm-12">Customer Relationship Management</h4><br>
                  <div class="col-sm-6 col-md-4">
                  <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="ion ion-ios-speedometer-outline"></i>

                            <h3 class="box-title">Sales Pipeline</h3>
                        </div>
                              <!-- /.box-header -->
                        <div class="box-body">
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion ion-person-stalker"></i> <span>Leads</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion ion-toggle-filled"></i> <span>Opportunity</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion ion-ios-people"></i> <span>Customer</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-address-book"></i> <span>Contacts</span></a>
                        </div>
                              <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                  <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="ion ion-android-bulb"></i>

                            <h3 class="box-title">Business Plan</h3>
                        </div>
                              <!-- /.box-header -->
                        <div class="box-body">
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion ion-speakerphone"></i> <span>Campaign</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion-android-contact"></i> <span>Accounts</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="ion ion-cash"></i> <span>Deals</span></a>
                          <a href="#" class="btn btn-block btn-social btn-default btn-flat"><i class="fa fa-area-chart"></i> <span>Cases</span></a>
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
