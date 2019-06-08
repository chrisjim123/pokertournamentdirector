@extends('layouts.tournamenthome')
@section('content')

<!-- Small boxes (Stat box) -->
          <br><br><br>
          <div class="row">

            <div class="col-lg-3 col-xs-3"></div><!-- ./left col 3 -->

            <div class="col-lg-6 col-xs-6"><!-- center col 6 -->
              <!-- small box -->
              <center><b><h1 style="font-size: 50px; font-family:'digital-clock-font'"> <img src="{{ asset('Emperor City Poker Header.jpg') }}" class="avatar img-circle img-thumbnail" alt="avatar" style="width:80px; height: 80px;">  EMPEROR CITY POKER</h1></b></center><hr>
             
              <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                  <p style="font-size:25px;">Administrator</p>
                </div>
                <a href="{{ url('/tournament') }}" class="small-box-footer">Sign In <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
              </div>

            </div><!-- ./end center col 6-->

            <div class="col-lg-3 col-xs-3"></div><!-- /right col 3 -->

          </div><!-- /.row -->



<!-- Digital Clock Font -->
<style type="text/css">
    @font-face{
      font-family: 'digital-clock-font';
      src: url('../../font/digital-7 (mono).ttf');
    }
</style>

@endsection

