@extends('layouts.master')


@section('contentheader')


  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control Panel</small>
          </h1>


       <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>


   
        </section>

@endsection

    

@section('content')

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>



  <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3>{{$manpowercount}}</h3>
                  <p>Manpower</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ url('/adminhome') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>53</h3>
                  <p>Dummy</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>44</h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Events</p>
                </div>
                <div class="icon">
                  <i class="ion ion-calendar"></i>
                </div>
                <a href="{{ url('/event') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->






<div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->


                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">


                      @if(isset($masterfile))
                      @foreach($masterfile as $per)

                        <li>
                         <!--  <img src="dist/img/user1-128x128.jpg" alt="User Image"> -->
                          <a class="users-list-name" href="#">{{$per->firstname}} {{$per->lastname}}</a>
                          <span class="users-list-date">{{$per->created_at}}</span>
                        </li>


                    @endforeach
                           
           
                    @else
               
                    @endif

              
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->















            </div>
          </div> 
        </div> 
    </div>
</div>

@endsection






    