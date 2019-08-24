@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            <b style="color:white;">Add New Chips</b>
            <small>Saturday Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ url('/schipsview') }}">Chips Controller</a></li>
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
                <li {{ (current_page("splayersview")) ? 'class=active' : '' }}><a href="{{ url('/splayersview') }}">Players</a></li> 
                <li {{ (current_page("sbuyinview")) ? 'class=active' : '' }}><a href="{{ url('/sbuyinview') }}">Buyin</a></li>
                <li {{ (current_page("saddnewchips")) ? 'class=active' : '' }}><a href="{{ url('/schipsview') }}">Chips</a></li>
                <li {{ (current_page("slevelview")) ? 'class=active' : '' }}><a href="{{ url('/slevelview') }}">Level</a></li>
                <li {{ (current_page("spotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/spotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("saddnewpercent")) ? 'class=active' : '' }}><a href="{{ url('/sprizemoneyview') }}">Percent Prize</a></li>
   
              </ul>
 
              <form class="form" action="{{ url('/suploadchips')}}" method="post" id="registrationForm" enctype="multipart/form-data">
              {{ csrf_field() }}
          
                      <div class="form-group">
                          <div class="col-xs-3">
                          <label for="image"><h4 style="color:white;">Chips</h4></label>
                          <input class="form-control" id = "image" type="file" name="image" accept="image/*" />                      
                          <br>
                          <label for="first_name"><h4 style="color:white;">Chip Value</h4></label>
                          <input style="border:none; background:white; color: white;" value=" " type="number" class="form-control" name="chipvalue"  placeholder="Enter Chip Value" required="">
                          <br>
                          <button class="btn btn-md btn-primary" type="reset"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                          <button name="save" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                          </div>
                      </div>
          
                </form>

                                         
@endsection

<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>






