@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Level
            <small>Daily Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ url('/elevelview') }}">Level Controller</a></li>
            <li class="active">Edit Level</li>
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
                <li {{ (current_page("splayersview")) ? 'class=active' : '' }}><a href="{{ url('/splayersview') }}">Players</a></li> 
                <li {{ (current_page("sbuyinview")) ? 'class=active' : '' }}><a href="{{ url('/sbuyinview') }}">Buyin</a></li>
                <li {{ (current_page("schipsview")) ? 'class=active' : '' }}><a href="{{ url('/schipsview') }}">Chips</a></li>
                <li {{ (current_page("supdatelevel")) ? 'class=active' : '' }}><a href="#">Level</a></li>
                <li {{ (current_page("spotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/spotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("sprizemoneyview")) ? 'class=active' : '' }}><a href="{{ url('/sprizemoneyview') }}">Percent Prize</a></li>
   
              </ul>


                <hr>
                  <form class="form" action="{{ url('/seditlevel')}}/{{$level->id}}" method="post" id="registrationForm" enctype="multipart/form-data">
                           {{ csrf_field() }}

                      <div class="form-group">

                          <div class="col-xs-4">
                              <label for="first_name"><h4>Level</h4></label>
                              <input style="border:none; background:white;" value="{{ $level->level }}" type="text" class="form-control" name="editlevel"  placeholder="Enter Level" required="">
                          </div>
                      </div>
                    
                    <div class="form-group">

                          <div class="col-xs-4">
                              <label for="first_name"><h4>Blinds</h4></label>
                              <input style="border:none; background:white;" value="{{ $level->blinds }}" type="text" class="form-control" name="editblinds"  placeholder="Enter Blinds" required="">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-4">
                              <label for="first_name"><h4>Duration (In Minutes) </h4></label>
                              <input style="border:none; background:white;" value="{{ $level->in_minutes }}" type="number" class="form-control" name="editduration"  placeholder="Enter Duration" required="">
                          </div>
                      </div>

                       <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button name="back" class="btn btn-md btn-primary" type=""><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
                                <button name="update" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>

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






