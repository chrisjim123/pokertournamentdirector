@extends('layouts.guest')


@section('contentheader')


  <!-- Content Header (Page header) -->
        <section class="content-header" style="background: ;">
          <h1>
            <b style="color:white;">Dashboard</b>
            <small>Control Panel</small>
          </h1>


       <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol><br>


   
        </section>

@endsection

    

@section('content')

<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>



<script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Small boxes (Stat box) -->
 <br><br><br><br><br><br>
          <div class="row">

             <div class="col-lg-3 col-xs-3">
            
            </div><!-- ./col -->

             
             <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              
              <div class="small-box bg-yellow" style="box-shadow:0px 3px 3px 3px white;  outline:none; border-radius:40px 5px; background:transparent; border:solid transparent;">
                <div class="inner">
                  <h3></h3>
            
                  <p style="font-size:25px; font-family:'digital-clock-font'">Daily Tournament</p>
                </div>
                <div class="icon">
                  <i class="ion ion-clock"></i>
                </div>
                <a style="border-radius:40px 5px;" href="{{ url('/dailytournament') }}" class="small-box-footer">Click here to view <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
              </div>
           
              <!-- small box -->
              <div class="small-box bg-yellow"  style="box-shadow:0px 3px 3px 3px white;  outline:none; border-radius:40px 5px; background:transparent; border:solid transparent;">
                <div class="inner">
                  <h3></h3>

                  <p style="font-size:25px; font-family:'digital-clock-font'">Saturday Tournament</p>
                </div>
               <div class="icon">
                  <i class="ion ion-clock"></i>
                </div>
                <a style="border-radius:40px 5px;" href="{{ url('/saturdaytournament') }}" class="small-box-footer">Click here to view <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
              </div>
            </div><!-- ./col -->

          <div class="col-lg-3 col-xs-3">
             
          </div><!-- /.row -->


          </div><!-- /.row -->
 

 
<!-- Digital Clock Font -->
<style type="text/css">
    @font-face{
      font-family: 'digital-clock-font';
      src: url('../../font/digital-7 (mono).ttf');
    }
</style>

@endsection





    