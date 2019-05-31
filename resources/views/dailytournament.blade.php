@extends('layouts.guest')
@section('content')

<script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





<!-- Chips Modal Players Modal -->
<div class="modal fade" id="v1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chips Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
    <div class="form-group">
     <center>
   <img src="{{asset('tournamentchips/10.png')}}" style="height: 300px; width: 300px;" class="avatar img-circle img-thumbnail" alt="avatar">
   </center>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="v2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chips Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
    <div class="form-group">
     <center>
   <img src="{{asset('tournamentchips/t5.png')}}" style="height: 300px; width: 300px;" class="avatar img-circle img-thumbnail" alt="avatar">
   </center>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="v3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chips Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
    <div class="form-group">
     <center>
   <img src="{{asset('tournamentchips/100.png')}}" style="height: 300px; width: 300px;" class="avatar img-circle img-thumbnail" alt="avatar">
   </center>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
  </div>
</div>

 <div class="modal fade" id="v4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chips Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
    <div class="form-group">
     <center>
   <img src="{{asset('tournamentchips/1000.png')}}" style="height: 300px; width: 300px;" class="avatar img-circle img-thumbnail" alt="avatar">
   </center>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="v5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chips Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
    <div class="form-group">
     <center>
   <img src="{{asset('tournamentchips/10000.png')}}" style="height: 300px; width: 300px;" class="avatar img-circle img-thumbnail" alt="avatar">
   </center>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
  </div>
</div>






<!-- Add Players Modal -->
<div class="modal fade" id="addplayermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Players</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form id="addplayerform" action="{{route('addplayer')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="modal-body">
    <div class="form-group">
    <label for="totalplayers">Total Players</label>
    <input autofocus type="number" class="form-control" id="totalplayers" name="totalplayers" aria-describedby="emailHelp" placeholder="Enter Total Players" required>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
   </form>

  </div>
  </div>
</div>

    <script>
        $(function () {
            $('#addplayerform').submit(function (e) {
                e.preventDefault()  // prevent the form from 'submitting'
                var url = e.target.action  // get the target
                var formData = $(this).serialize() // get form data
                dataType: 'json',
                $.post(url, formData, function (response) { // send; response.data will be what is returned

    
                })

                  $('#addplayermodal').modal('hide')
                  alert("New Players has been successfully added.");
            
/*                   $('#pplay').load("showplayers.php");
                 var ajaxDisplay = document.getElementById(#displayplayer);
                  ajaxDisplay.innerHTML = html;*/
            })
        })
    </script>

<!-- End Add Player Modal -->


 
<!-- Minus Players Modal -->
<div class="modal fade" id="minusplayermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Minus Players</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form id="minusplayerform" action="{{route('minusplayer')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="modal-body">
    <div class="form-group">
    <label for="totalplayers">Total Players</label>
    <input autofocus type="number" class="form-control" id="mplayers" name="mplayers" aria-describedby="emailHelp" placeholder="Enter Total Players" required>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
   </form>

  </div>
  </div>
</div>

   <script>
        $(function () {
            $('#minusplayerform').submit(function (e) {
                e.preventDefault()  // prevent the form from 'submitting'
                var url = e.target.action  // get the target
                var formData = $(this).serialize() // get form data
                $.post(url, formData, function (response) { // send; response.data will be what is returned
    
                })
                  $('#minusplayermodal').modal('hide')
                  alert("Players has been successfully updated.");
            })
        })
    </script>


<!-- End Minus Player Modal -->



<!-- Rebuy Modal -->
<div class="modal fade" id="updaterebuymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Rebuys</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form id="addrebuyform" action="{{route('rebuy')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="modal-body">
  <div class="form-group">
    <label for="totalrebuys">Total Rebuys</label>
    <input autofocus type="number" class="form-control" id="totalrebuys" name="totalrebuys" placeholder="Enter Total Rebuys" required>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
   </form>

  </div>
  </div>
</div>

  <script>
        $(function () {
            $('#addrebuyform').submit(function (e) {
                e.preventDefault()  // prevent the form from 'submitting'
                var url = e.target.action  // get the target
                var formData = $(this).serialize() // get form data
                $.post(url, formData, function (response) { // send; response.data will be what is returned
    
                })
                  $('#updaterebuymodal').modal('hide')
                  alert("Rebuys has been successfully added.");
            })
        })
    </script>

<!-- End Rebuy Modal -->



    <div class="row" >
        <div class="col-sm-3"><!--left col-->
 


          <?php
            use Illuminate\Support\Facades\DB;
            use App\EBuyin;
             $ebuyin = EBuyin::firstOrFail();
             $eplayers = $ebuyin->etotalplayers;
          ?>
        <ul class="list-group">
           <li class="list-group-item" style="font-size: 30px; background: black; color: white; font-family:'digital-clock-font'"><b>ECP - TURBO TOURNAMENT</b></li>
            <li class="list-group-item text-right" ><span class="pull-left" style="font-size: 25px;"><strong>Players</strong></span><b><input id="pplay"  value="{{ $eplayers }}" style="text-align: right; border:0px; width:150px; font-size: 25px;"></b></b>&nbsp;&nbsp;&nbsp;
                 <button  data-toggle="modal" data-target="#minusplayermodal" type="button"  class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-minus"></i></button>
                 <button data-toggle="modal" data-target="#addplayermodal" type="button" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
                </li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Rebuys</strong></span><b><input value="{{ $ebuyin->etotalbuyer }}" style="text-align: right; border:0px; width:150px; font-size: 25px;"></b>&nbsp;&nbsp;&nbsp;<button  data-toggle="modal" data-target="#updaterebuymodal" type="button"  class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i></button></li>
    
              <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Ave. Chips</strong></span><b><input value="{{ number_format($ebuyin->eaveragechips) }}" style="text-align: right; border:0px; width:150px; font-size: 25px;"></b> </li>
          
             <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Total Chips</strong></span><b><input type="text" value="{{ number_format($ebuyin->etotalchips) }}" id="tchips" name="tchips" style="text-align: right; border:0px; width:150px; font-size: 25px;"></b> </li>
           
          </ul> 

         
             <ul class="list-group">
            <li class="list-group-item" style="font-size: 30px; background: black; color: white; font-family:'digital-clock-font'"><b>CHIPS</b><span class="pull-right"><b>VALUE</b></span>  <!-- <button data-toggle="modal" data-target="" type="button" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i></button> --></li>
            <li data-toggle="modal" data-target="#v1" type="button" class="list-group-item text-right"><span class="pull-left" ><img title="Click to Preview" src="{{asset('tournamentchips/10.png')}}" style="height: 70px; width: 70px;" class="avatar img-circle img-thumbnail" alt="avatar"></span><b style="font-size: 45px; color:black;">10</b></li>
             <li data-toggle="modal" data-target="#v2" type="button" class="list-group-item text-right"><span class="pull-left"><img title="Click to Preview" src="{{asset('tournamentchips/t5.png')}}" style="height: 70px; width: 70px;" class="avatar img-circle img-thumbnail" alt="avatar"></span><b style="font-size: 45px; color:black;">25</b></li>
             
            <li data-toggle="modal" data-target="#v3" type="button" class="list-group-item text-right"><span class="pull-left"><img title="Click to Preview" src="{{asset('tournamentchips/100.png')}}" style="height: 70px; width: 70px;" class="avatar img-circle img-thumbnail" alt="avatar"></span><b style="font-size: 45px; color:black;">100</b></li>

              <li data-toggle="modal" data-target="#v4" type="button" class="list-group-item text-right"><span class="pull-left"><img title="Click to Preview" src="{{asset('tournamentchips/1000.png')}}" style="height: 70px; width: 70px;" class="avatar img-circle img-thumbnail" alt="avatar"></span><b style="font-size: 45px; color:black;">1000</b></li>

              <li data-toggle="modal" data-target="#v5" type="button" class="list-group-item text-right"><span class="pull-left"><img title="Click to Preview" src="{{asset('tournamentchips/10000.png')}}" style="height: 70px; width: 70px;" class="avatar img-circle img-thumbnail" alt="avatar"></span><b style="font-size: 45px; color:black;">10,000</b></li>
              </ul> 


 
        </div><!--/col-3-->


        <div class="col-sm-5">
        
          <form style="border: 4px solid #a1a1a1;margin-top: 0px;padding: 20px;">
              <center>
                <h1 id="round" style="margin-bottom: -50px; font-size: 60px; color: white;">{{ $etournament->level }}</h1>
                <div class="clock" style="font-size: 200px; color:#0a0; font-family:'digital-clock-font'">{{ $eduration->in_minutes }}</div>
                
                <div id="poker_blinds" style="margin-top: -65px; margin-bottom: 20px; font-size: 35px; ">
                  <div class="blinds" style="font-size: 50px; color:white; ">
                    <span class="small-blind">{{ $blindParts['small'] }}</span>
                    <span class="separator">/</span>
                    <span class="big-blind">{{ $blindParts['big'] }}</span>
                  </div>
                  <span style="font-size: 35px; color:black;"></span><!-- blinds -->
                </div><br>

                <button type="button" class="btn btn-md btn-primary" id="poker_play_pause">
                  <i class="glyphicon glyphicon-pause"></i> /
                  <i class="glyphicon glyphicon-play"></i> 
                  <span id="play_pause_div">Play</span>
                </button>
                <span style="margin-left: 50px;"></span>
                <button type="button" class="btn btn-md btn-success" id="poker_next_round"><i class="glyphicon glyphicon-arrow-right"></i> Next</button>
                <span style="margin-left: 50px;"></span>
                <button type="button" class="btn btn-md btn-warning reset"><i class="glyphicon glyphicon-refresh"></i> Reset</button>

              </center> </form><br>
              
                <!-- Level Group -->

              <ul id="pagination" class="list-group posts endless-pagination" data-next-page="{{ $posts->nextPageUrl() }}">
                <li class="list-group-item text-muted" style="font-size: 30px; background: black; color: white; font-family:'digital-clock-font'"><b>LEVELS</b><span class="pull-right"><b>BLINDS</b></span></li>
                 
               @foreach ($posts as $post)
  
                  <li class="list-group-item text-right">
                    <span class="pull-left">
                      <span class="pull-left">
                        <strong style="font-size: 25px;">{{ $post->level }}</strong>
                      </span>
                    </span><b  style="font-size: 25px;">{{ $post->blinds }}</b>
                  </li>
                @endforeach
          
              <center>{!! $posts->render() !!}</center>

                  </ul>

 
    <script>

     $(document).ready(function() {


    $('document').on('click', '#pagination a', function(e){

        e.preventDefault();
        var url = $(this).attr('href');

        $.get(url, function(data){
            $('.posts').html(data);
        });

    });
/*
    $(window).scroll(fetchPosts);

    function fetchPosts() {

        var page = $('.endless-pagination').data('next-page');

        if(page !== null) {

            clearTimeout( $.data( this, "scrollCheck" ) );

            $.data( this, "scrollCheck", setTimeout(function() {
                var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

                if(scroll_position_for_posts_load >= $(document).height()) {
                    $.get(page, function(data){
                        $('.posts').append(data.posts);
                        $('.endless-pagination').data('next-page', data.next_page);
                    });
                }
            }, 350))
*/
        }
    }

});

        </script>

       
        </div><!--/col-6-->


        <div class="col-sm-4">
            <ul class="list-group">
              <?php $tp = number_format($eprize->totalprize); ?>
            <li class="list-group-item" style="background: black;"><b style="font-size: 30px; color: white; font-family:'digital-clock-font'">PRIZE MONEY</b><b><input class="pull-right" style="text-align: right; height: 40px; width: 250px; font-size: 35px; background: black; border: none; color: red;" disabled="" value="Php {{$tp}}"></b>

            @foreach($eprizemoney as $prizemoney)
            <?php 
            $tchips = $eprize->totalprize;
            $nprize = $prizemoney->amount;
            $total = $tchips*$nprize;
            $result = number_format($total);
           ?>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>{{$prizemoney->place}}</strong></span><b style="font-size: 30px; color:black;">Php {{ $result }}</b></li>
            @endforeach

            </ul> 
            </div><!--/col-3-->
            </div> 
           </div><!--/tab-pane-->
          </div><!--/tab-content-->
    </div><!--/row-->
                                                      
    <audio id="soundHandle" style="display: none;"></audio>


@push('custom-scripts')

<script type="text/javascript">
  var Poker = (function () {
    var round = 1;
    var duration = '{{ $eduration->in_seconds }}';
    var timer = duration;
        
    {{-- {{ dd(json_encode($allBlinds)) }} --}}

    var blinds = '{!! json_encode($allBlinds) !!}';

    blinds = JSON.parse(blinds);

    

    console.log(blinds);

      
    var interval_id;
    
    return {
      isGamePaused: function () {
        return !interval_id ? true : false;
      },
      playAlarm: function () {
        soundHandle.src = '{{asset('sound/alertnext1.mp3')}}';
        soundHandle.play();

      },
      reset: function () {
        // reset timer
        this.resetTimer();
        
        this.stopClock();
        
        this.updateClock(timer);
        
        // reset play/pause button
        this.updatePlayPauseButton();
        
        // reset round
        round = 1;
        
        this.updateRound(round);
        
        // increase blinds
        this.updateBlinds(round);
      },
      resetTimer: function () {
  
        timer = duration;
      },
      startClock: function () {
        var that = this;
        
        interval_id = setInterval(function () {
          that.updateClock(timer);
          
          timer -= 1;
        }, 1000);
      },
      startNextRound: function () {
        // reset timer
        this.resetTimer();
        
        this.stopClock();
        
        this.updateClock(timer);
        
        // reset play/pause button
        this.updatePlayPauseButton();
        
        // increase round
        round += 1;
        
        this.updateRound(round);
        
        // increase blinds
        this.updateBlinds(round);
      },
      stopClock: function () {
        clearInterval(interval_id);
        interval_id = undefined;
      },
      updateBlinds: function (round) {
        var round_blinds = blinds[round - 1] || blinds[blinds.length];
        
        $('.small-blind').html(round_blinds.small);
        $('.big-blind').html(round_blinds.big);
      },
      updateClock: function (timer) {
        var minute = Math.floor(timer / 60),
            second = (timer % 60) + "",
            second = second.length > 1 ? second : "0" + second;
          
        $('.clock').html(minute + ":" + second);
        
        if (timer <= 0) {

          this.startNextRound();
          
          this.playAlarm();
          
          this.startClock();
          
          // update play/pause button
          this.updatePlayPauseButton();
        }
      },
      updatePlayPauseButton: function () {
        var pause_play_button = $('#poker_play_pause a');
        
        if (this.isGamePaused()) {
          pause_play_button.removeClass('pause');
          pause_play_button.addClass('play');
        } else {
          pause_play_button.removeClass('play');
          pause_play_button.addClass('pause');
        }
      },
      updateRound: function (round) {
        //$('#round').html('Level' + ' ' + round);


        switch (round){

          case 1:
            $('#round').html('Level' + ' ' + round);
            break;
          case 2:
            $('#round').html('Level' + ' ' + round);
            break;
          case 3:
            $('#round').html('Level' + ' ' + round);
            break;
          case 4:
            $('#round').html('<b style="color:red;">BREAK TIME - 10 MINS</b>');
            var timer = '00:00';
            this.updateClock(timer);
            break;
          case 5:
            var newround = 4;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 6:
            var newround = 5;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 7:
            var newround = 6;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 8:
            var newround = 7;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 9:
            $('#round').html('<b style="color:red;">BREAK TIME - 5 MINS</b>');
            var timer = '00:00';
            this.updateClock(timer);
            break;
          case 10:
           var newround = 8;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 11:
           var newround = 9;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 12:
            var newround = 10;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 13:
            var newround = 11;
            $('#round').html('Level' + ' ' + newround);
            break;
          case 14:
            $('#round').html('<b style="color:red;">END OF TOURNAMENT</b>');
            var timer = '00:00';
            var round = 0;
            this.updateClock(timer);
            break;
        }
        
      }
    };
  }());

  $('#poker_play_pause').on('click', function (event) {
    if (Poker.isGamePaused()) {
      $('#poker_play_pause').removeClass('btn-primary');
      $('#poker_play_pause').addClass('btn-danger');
      $('#play_pause_div').html('Pause');

      Poker.startClock();
    } else {
      blueButtonPlay();

      Poker.stopClock();
    }
    
    // update play/pause button
    Poker.updatePlayPauseButton();
  });

  $('#poker_next_round').on('click', function (event) {
    blueButtonPlay();
    Poker.startNextRound();
  });

  $('body').on('keypress', function (event) {
    if (Poker.isGamePaused()) {
      Poker.startClock();
    } else {
      Poker.stopClock();
    }
    
    // update play/pause button
    Poker.updatePlayPauseButton();
  });


  $('.reset').on('click', function (event) {
    if (confirm('Are you sure you want to reset?')){
      blueButtonPlay();
      Poker.reset();
    }
  });

  function blueButtonPlay()
  {
    $('#poker_play_pause').removeClass('btn-danger');
    $('#poker_play_pause').addClass('btn-primary');
    $('#play_pause_div').html('Play');
  }
</script>

@endpush



<script type="text/javascript">
  
  //Plus Minus Players

    var count = 0;
    var countEl = document.getElementById("player");
    function plus(){
        count++;
        countEl.value = count;
    }
    function minus(){
      if (count >= 1) {
        count--;
        countEl.value = count;
      }  
    }

//Rebuys
    var count1 = 0;
    var countEl1 = document.getElementById("rebuy");

     function plus1(){
        count1++;
        countEl1.value = count1;

        var newtotalchips = (totalchips+rebuychipsval);

    }
    function minus1(){
      if (count1 >= 1) {
        count1--;
        countEl1.value = count1;
      }  
    }




</script>



<style type="text/css">
  
  /* @group Blink */
.blink {
  -webkit-animation: blink .75s linear infinite;
  -moz-animation: blink .75s linear infinite;
  -ms-animation: blink .75s linear infinite;
  -o-animation: blink .75s linear infinite;
   animation: blink .75s linear infinite;
}
@-webkit-keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 1; }
  50.01% { opacity: 0; }
  100% { opacity: 0; }
}
@-moz-keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 1; }
  50.01% { opacity: 0; }
  100% { opacity: 0; }
}
@-ms-keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 1; }
  50.01% { opacity: 0; }
  100% { opacity: 0; }
}
@-o-keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 1; }
  50.01% { opacity: 0; }
  100% { opacity: 0; }
}
@keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 1; }
  50.01% { opacity: 0; }
  100% { opacity: 0; }
}


@font-face{
  font-family: 'digital-clock-font';
  src: url('../../font/digital-7 (mono).ttf');
}

</style>






@endsection



