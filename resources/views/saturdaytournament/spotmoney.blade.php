@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pot Money Controller
            <small>Saturday Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pot Money Controller</li>
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
                <li {{ (current_page("spotmoneyview")) ? 'class=active' : '' }}><a href="#">Pot Money</a></li>
                <li {{ (current_page("sprizemoneyview")) ? 'class=active' : '' }}><a href="{{ url('/sprizemoneyview') }}">Percent Prize</a></li>

  
              </ul>

                <hr>
                  <form class="form" action="{{ url('/supdatepotmoney')}}/101" method="post" id="registrationForm" enctype="multipart/form-data">
                           {{ csrf_field() }}

                      <div class="form-group">
                          <div class="col-xs-3">
                              <label for="potmoney"><h4>Pot Money</h4></label>
                              <input style="border:none; background:white;" value="{{ $spotprize->totalprize }}" type="number" class="form-control" name="potmoney"  placeholder="Enter Pot Money" required="">
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






