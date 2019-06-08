@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Buyin Controller
            <small>Daily Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Buyin Controller</li>
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
                <li {{ (current_page("ebuyinview")) ? 'class=active' : '' }}><a href="#">Buyin</a></li>
                <li {{ (current_page("echipsview")) ? 'class=active' : '' }}><a href="{{ url('/echipsview') }}">Chips</a></li>
                <li {{ (current_page("elevelview")) ? 'class=active' : '' }}><a href="{{ url('/elevelview') }}">Level</a></li>
                <li {{ (current_page("epotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/epotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("prizemoneyview")) ? 'class=active' : '' }}><a href="{{ url('/prizemoneyview') }}">Percent Prize</a></li>
              </ul>


                <hr>
                  <form class="form" action="{{ url('/updatebuyin')}}/101" method="post" id="registrationForm" enctype="multipart/form-data">
                           {{ csrf_field() }}

                      <div class="form-group">

                          <div class="col-xs-3">
                              <label for="buyin"><h4>Buyin Amount</h4></label>
                              <input style="border:none; background:white;" value="{{ $ebuyin->ebuyinamount }}" type="number" class="form-control" name="buyin"  placeholder="Enter Buyin" required="">
                          </div>
                      </div>
                    
                        <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button name="update" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
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






