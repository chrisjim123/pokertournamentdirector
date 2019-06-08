@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Prize Money Controller
            <small>Saturday Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Prize Money Controller</li>
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
                <li {{ (current_page("sprizemoneyview")) ? 'class=active' : '' }}><a href="#">Percent Prize</a></li>
              </ul>

                         
        <form class="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                     <h3 class="box-title">Percentage Prize</h3>
                      <br><b style="color:red;"> <i>Note: If you wish to remove or add new row, please contact your administrator.</i></b>
                       <!-- <button name="updateprize" value="" class="btn btn-md btn-primary pull-right" type="submit"><i class="glyphicon glyphicon-plus"></i><a style="color:white;" href="{{ url('/saddnewpercent')}}"> Add New Percent</a></button> -->
                      </div><!-- /.box-header -->
                        <div class="box-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>PLACE</th>
                                <th>PERCENT</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($prize as $prizes)
                              <tr name="{{ $prizes->id }}">
                                <td>{{ $prizes->place }}</td>
                                <td>{{ $prizes->amount }}</td>
                                <td><button name="update" value="" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i><a style="color:white;" href="{{ url('/seditprizemoneyview')}}/{{$prizes->id}}"> Update</a></button><!-- <button class="btn btn-md btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i><a style="color:white;" href="{{url('/sdeletepercent')}}/{{$prizes->id}}"> Delete</a></button> --></td>
                                </tr>
                               @endforeach

                            </tbody>
                            <tfoot>
                              <tr>
                                <th>PLACE</th>
                                <th>PERCENT</th>
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






