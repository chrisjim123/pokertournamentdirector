@extends('layouts.guest')

@section('contentheader')
  <!-- Content Header (Page header) -->
        <section class="content-header" >
          <h1>
            <b style="color:white;">Chips Controller</b>
            <small>Saturday Tournament</small>
          </h1>

       <ol class="breadcrumb">
            <li><a href="{{ url('/tournament') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Chips Controller</li>
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
                <li {{ (current_page("schipsview")) ? 'class=active' : '' }}><a href="#">Chips</a></li>
                <li {{ (current_page("slevelview")) ? 'class=active' : '' }}><a href="{{ url('/slevelview') }}">Level</a></li>
                <li {{ (current_page("spotmoneyview")) ? 'class=active' : '' }}><a href="{{ url('/spotmoneyview') }}">Pot Money</a></li>
                <li {{ (current_page("prizemoneyview")) ? 'class=active' : '' }}><a href="{{ url('/sprizemoneyview') }}">Percent Prize</a></li>
                   
              </ul>
                
        <form class="form" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                     <h3 class="box-title">Chips View Data</h3> <button name="updatelevel" value="" class="btn btn-md btn-primary pull-right" type="submit"><i class="glyphicon glyphicon-plus"></i><a style="color:white;" href="{{ url('/saddnewchips')}}"> Add New Chips</a></button>
                      </div><!-- /.box-header -->
                        <div class="box-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>CHIPS</th>
                                <th>VALUE</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($chips as $chips)
                              <tr>
                                <td><img style="width:100px; height:100px;" src="{{asset('uploads/saturday')}}/{{$chips->images}}" class="avatar img-circle img-thumbnail" alt="avatar"></td>
                                <td>{{ $chips->value }}</td>
                                <td><button name="updatechips" value="" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i><a style="color:white;" href="#"><a style="color:white;" href="{{ url('/supdatechipsview')}}/{{$chips->id}}"> Update</a></button><button class="btn btn-md btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i><a style="color:white;" href="{{url('/sdelchips')}}/{{$chips->id}}"> Delete</a></button></td>
                              </tr>
                           @endforeach

                            </tbody>
                            <tfoot>
                              <tr>
                                <th>CHIPS</th>
                                <th>VALUE</th>
                                <th>ACTION</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                    </div>
                  </div>

                </form>
                             
<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>

                                                      
@endsection



