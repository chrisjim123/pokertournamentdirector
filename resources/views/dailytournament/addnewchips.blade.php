@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            <b style="color:white;">Add New Chips</b>
            <small>Daily Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ url('/echipsview') }}">Chips Controller</a></li>
            <li class="active">Add New Chips</li>
          </ol><br>
        </section>
@endsection


@section('content')
          
          <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Notification</strong>
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>
 
    <div class="row">

    
        <div class="col-sm-12">
          <ul class="nav nav-tabs">        
                <li {{ (current_page("eplayersview")) ? 'class=active' : '' }}><a href="{{ url('/eplayersview') }}">Players</a></li> 
                <li {{ (current_page("ebuyinview")) ? 'class=active' : '' }}><a href="{{ url('/ebuyinview') }}">Buyin</a></li>
                <li {{ (current_page("addnewchips")) ? 'class=active' : '' }}><a href="{{ url('/echipsview') }}">Chips</a></li>
                <li {{ (current_page("elevelview")) ? 'class=active' : '' }}><a href="{{ url('/elevelview') }}">Level</a></li>
                <li {{ (current_page("epotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/epotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("addnewpercent")) ? 'class=active' : '' }}><a href="{{ url('/prizemoneyview') }}">Percent Prize</a></li>
   
              </ul>


      
              <form class="form" action="{{ url('/uploadchips')}}" method="post" id="registrationForm" enctype="multipart/form-data">
              {{ csrf_field() }}
          
                      <div class="form-group">
                          <div class="col-xs-3">
                          <label for="image"><h4 style="color:white;">Chips</h4></label>
                          <input class="form-control" id = "image" type="file" name="image" accept="image/*" />                      
                          <br>
                          <label for="first_name"><h4 style="color:white;">Chip Value</h4></label>
                          <input style="border:none; background:white;" value=" " type="number" class="form-control" name="chipvalue"  placeholder="Enter Chip Value" required="">
                          <br>
                          <button class="btn btn-md btn-primary" type="reset"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                          <button name="save" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                          </div>
                      </div>
          
                </form>

          </div><!--/tab-pane-->
        </div><!--/col-12-->
    </div><!--/row-->
                       
<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>

@endsection








