@extends('layouts.tournamenthome')
@section('content')

       
          <div class="row">

            <div class="col-lg-2 col-xs-2"></div><!-- ./left col 3 -->

            <div class="col-lg-8 col-xs-8"><!-- center col 6 -->
              <!-- small box -->
               <center><img src="{{ asset('Emperor City Poker Header.jpg') }}" class="avatar img-circle img-thumbnail" alt="avatar" style="width:100px; height: 100px;"></center> 
              <center><b><h1 style=" ; color:white; font-family:Baskerville Old;"> EMPEROR CITY POKER</h1></b></center>
             
              




<!----------------------------------START SLIDER-------------------------------------------------------------->

 <center><div class="row carousel-holder">

                    <div class="col-md-12" >
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>                 
                            </ol>
                            <div class="carousel-inner"  >
                              <div class="item active" >
                           
                                    <img class="slide-image" src="{{asset('homepage.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img  class="slide-image" src="{{asset('homepage.png')}}" alt="">
                                </div>
                                <div class="item">
                                    <img  class="slide-image" src="{{asset('homepage.png')}}" alt="">
                                </div>
                              
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

        
   

                </div></center>

<!------------------------------END SLIDER------------------------------------------------------>

 



            </div><!-- ./end center col 6-->

            <div class="col-lg-2 col-xs-2"></div><!-- /right col 3 -->

          </div><!-- /.row -->




<!-- Digital Clock Font -->
<style type="text/css">
    @font-face{
      font-family: 'digital-clock-font';
      src: url('../../font/digital-7 (mono).ttf');
    }
</style>

@endsection

