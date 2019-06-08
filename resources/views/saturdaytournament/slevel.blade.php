@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Level Controller
            <small>Saturday Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Level Controller</li>
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
                <li {{ (current_page("slevelview")) ? 'class=active' : '' }}><a href="#">Level</a></li>
                <li {{ (current_page("spotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/spotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("sprizemoneyview")) ? 'class=active' : '' }}><a href="{{ url('/sprizemoneyview') }}">Percent Prize</a></li>
                   
              </ul>

                
        <form class="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                     <h3 class="box-title">Tournament Level</h3> <br><b style="color:red;"> <i>Note: If you wish to remove or add new row, please contact your administrator.</i></b>
                      </div><!-- /.box-header -->
                        <div class="box-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>LEVEL</th>
                                <th>BLINDS</th>
                                <th>TIME (IN MINUTES)</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($slevel as $level)
                              <tr name="{{ $level->id }}">
                                <td>{{ $level->level }}</td>
                                <td>{{ $level->blinds }}</td>
                                <td>{{ $level->in_minutes }}</td>
                                <td><button name="updatelevel" value="" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i><a style="color:white;" href="{{ url('/supdatelevel')}}/{{$level->id}}"> Update</a></button></td>
                              </tr>
                               @endforeach

                            </tbody>
                            <tfoot>
                              <tr>
                                <th>LEVEL</th>
                                <th>BLINDS</th>
                                <th>TIME (IN MINUTES)</th>
                                <th>ACTION</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
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






