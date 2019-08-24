@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            <b style="color:white;">Add New Percent</b>
            <small>Saturday Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ url('/sprizemoneyview') }}">Prize Money Controller</a></li>
            <li class="active">Add New Percent</li>
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
                <li {{ (current_page("slevelview")) ? 'class=active' : '' }}><a href="{{ url('/slevelview') }}">Level</a></li>
                <li {{ (current_page("spotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/spotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("saddnewpercent")) ? 'class=active' : '' }}><a href="#">Percent Prize</a></li>
   
              </ul>

 
                  <form class="form" action="{{ url('/saddpercent')}}" method="post" id="registrationForm" enctype="multipart/form-data">
                           {{ csrf_field() }}

                      <div class="form-group">

                          <div class="col-xs-4">
                              <label for="place"><h4 style="color:white;">Place</h4></label>
                              <input style="border:none; background:white;" value="" type="text" class="form-control" name="place"  placeholder="Enter Place" required="">
                          </div>
                      </div>
                    
                    <div class="form-group">

                          <div class="col-xs-4">
                              <label for="amount"><h4 style="color:white;">Percent</h4></label>
                              <input style="border:none; background:white;" value="" type="text" class="form-control" name="amount"  placeholder="Enter Percent" required="">
                          </div>
                      </div>

                
                       <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-md btn-primary" type="reset"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                                <button name="save" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>

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
 



