@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Chips
            <small>Daily Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ url('/echipsview') }}">Chips Controller</a></li>
            <li class="active">Update Chips</li>
          </ol>
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
                <li {{ (current_page("updatechipsview")) ? 'class=active' : '' }}><a href="#">Chips</a></li>
                <li {{ (current_page("elevelview")) ? 'class=active' : '' }}><a href="{{ url('/elevelview') }}">Level</a></li>
                <li {{ (current_page("epotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/epotmoneyview') }}">Pot Money</a></li>
              </ul>


              <hr>
              <form class="form" action="{{ url('/updatechips')}}/{{$chips->id}}" method="post" id="registrationForm" enctype="multipart/form-data">
              {{ csrf_field() }}
          
                  <div class="form-group">
                          <div class="col-xs-12">
                          <img style="width:200px; height:200px;" src="{{asset('uploads')}}/{{$chips->images}}" class="avatar img-circle img-thumbnail" alt="avatar">                      
                          <br><br>
                          <div class="col-xs-3">
                          <label for="image"><h4 style="color:red;">Upload different Chip</h4></label>
                          <input id = "image" type="file" name="image" accept="image/*" />    
                          <br>
                          <label for="first_name"><h4>Chip Value</h4></label>
                          <input style="border:none; background:white;" value="{{$chips->value}}" type="number" class="form-control" name="chipvalue"  placeholder="Enter Chip Value" required="">
                          <br>
                          <button class="btn btn-md btn-primary" type="reset"><i class="glyphicon glyphicon-arrow-left"></i><a style="color:white;" href="{{url('/echipsview')}}"> Back</a></button>
                          <button name="update" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                          </div>
                    </div>
          
                </form>

          </div><!--/tab-pane-->
        </div><!--/col-12-->
    </div><!--/row-->
                                                      
@endsection

<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>






