@extends('layouts.tournament')
@section('content')

<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap4.0.0.min.js') }}"></script>

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

  <form id="addplayerform" action="#" method="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="modal-body">
    <div class="form-group">
    <label for="totalplayers">Total Players</label>
    <input autofocus type="number" class="form-control" id="totalplayers" name="totalplayers" aria-describedby="emailHelp" placeholder="Enter Total Players" required>
    <strong style="color:red;">Note: Please set <a href="{{url('ebuyinview')}}">Buyin Amount</a> and <a href="{{url('epotmoneyview')}}">Pot Money</a> before adding a player.</strong>
  </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="saveNewPlayer" class="btn btn-primary">Save</button>
      </div>
    </div>
   </form>

  </div>
  </div>
</div>
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

  <form id="minusplayerform" action="#" method="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="modal-body">
    <div class="form-group">
    <label for="totalplayers">Total Players</label>
    <input autofocus type="number" class="form-control" id="mplayers" name="mplayers" aria-describedby="emailHelp" placeholder="Enter Total Players" required>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="saveMinusPlayer" class="btn btn-primary">Save</button>
      </div>
    </div>
   </form>

  </div>
  </div>
</div>
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

  <form id="addrebuyform" action="#" method="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="modal-body">
  <div class="form-group">
    <label for="totalrebuys">Total Rebuys</label>
    <input autofocus type="number" class="form-control" id="totalrebuys" name="totalrebuys" placeholder="Enter Total Rebuys" required>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="saveRebuy" class="btn btn-primary">Save</button>
      </div>
    </div>
   </form>

  </div>
  </div>
</div>
<!-- End Rebuy Modal -->

    <div class="row" >
        <div class="col-sm-3"><!--left col-->
        <form style="box-shadow:0px 2px 2px 2px black;  outline:none; border-radius:10px 10px; background:white; border:solid transparent; font-family:Baskerville Old;">
        <ul class="list-group">
           <li class="list-group-item" style="font-size: 30px; color: white; box-shadow:0px 2px 2px 2px gray;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent; font-family:Baskerville Old;"><span class="pull-right"><a href="{{ url('/resetalletournament') }}"><button title="Reset All" style="box-shadow:0px 1px 2px 2px #0a0;  outline:none; border-radius:10px 10px; background:white; border:solid transparent;" id="resetall" type="button"  class="btn btn-sm btn-success"><i style="color:red;" class="glyphicon glyphicon-refresh"></i></button></a></span><b>TURBO TOURNAMENT</b></li>
 
            <li class="list-group-item text-right" ><span class="pull-left" style="font-size: 25px;"><strong id="tplayer">Players</strong></span>
              <button style="box-shadow:0px 1px 2px 2px white;  outline:none; border-radius:10px 10px; background:transparent; border:solid transparent;"  data-toggle="modal" data-target="#minusplayermodal" type="button"  class="btn btn-md btn-danger"><i style="color:red;" class="glyphicon glyphicon-minus"></i></button>&nbsp;
              <button style="box-shadow:0px 1px 2px 2px white;  outline:none; border-radius:10px 10px; background:transparent; border:solid transparent;" data-toggle="modal" data-target="#addplayermodal" type="button" type="button" class="btn btn-md btn-primary"><i style="color:#0a0;" class="glyphicon glyphicon-plus"></i></button>&nbsp;
              <b><input disabled="" id="inputplayer" value="{{ $ebuyin->etotalplayers }}" style="text-align: right; height: 40px; width:150px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b>
                
                </li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Rebuys</strong></span>
            <button style="box-shadow:0px 1px 2px 2px white;  outline:none; border-radius:10px 10px; background:transparent; border:solid transparent;" data-toggle="modal" data-target="#updaterebuymodal" type="button"  class="btn btn-md btn-primary"><i style="color:#0a0;" class="glyphicon glyphicon-plus"></i></button>&nbsp;
            <b><input disabled="" id="inputRebuy" value="{{ $ebuyin->etotalbuyer }}" style="text-align: right; height: 40px; width:150px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b></li>
    
              <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Ave. Chips</strong></span><b><input disabled="" id="avechips" value="{{ number_format($ebuyin->eaveragechips) }}" style="text-align: right; height: 40px; width:250px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b> </li>
          
             <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Total Chips</strong></span><b><input disabled="" id="totalchips" type="text" value="{{ number_format($ebuyin->etotalchips) }}" id="tchips" name="tchips" style="text-align: right; height: 40px; width:250px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b> </li>
          </ul> </form><br>

            <form style="box-shadow:0px 2px 2px 2px black;  outline:none; border-radius:10px 10px; background:white; border:solid transparent; font-family:Baskerville Old;">
            <ul class="list-group"><!-- Chips Section -->
            <li class="list-group-item" style="font-size: 30px; background: #0a0; color: white; box-shadow:0px 2px 2px 2px gray;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent; font-family:Baskerville Old;"><b>CHIPS VALUE</b> </li><br>
            <div class="row"><!-- Players Row -->
            @foreach($echips as $chips)
            <div class="col-md-6">
            <li style="background: transparent; border: none;" data-toggle="modal" data-target="#v1" type="button" class="list-group-item text-right"><span class="pull-center" ><center><img title="Click to Preview" src="{{asset('uploads')}}/{{$chips->images}}" style="height: 125px; width: 125px; box-shadow:0px 3px 3px 3px gray;  outline:none;" class="avatar img-circle img-thumbnail" alt="avatar"><br><b style="font-size: 35px;  color:black;">{{number_format($chips->value)}}</b></center></span></li>
            </div>
            @endforeach
            </div>
            </ul> <!-- End Chips Section -->
            </form>

        </div><!--/col-3-->


        <div class="col-sm-6"><!-- col 5 -->
          <form style="border: 4px solid #a1a1a1;margin-top: 0px;padding: 20px; box-shadow:0px 2px 5px 5px #0a0;  outline:none; border-radius:20px 20px; background:none; border:solid transparent;">
              <center>
                <h1 id="round" style="margin-bottom: -50px; font-size: 90px; color: white; font-family:Baskerville Old;">{{ $timertournament[0]->level }}
                </h1>
                <div id="clocker" class="clock" style="font-size: 310px; color:#0a0; font-family:'digital-clock-font'">{{ gmdate("i:s", $timertournament[0]->in_seconds) }}</div>
                
                <div id="poker_blinds" style="margin-top: -65px; margin-bottom: 20px; font-size: 70px; color:white; font-family:Baskerville Old;">{{ $timertournament[0]->blinds }}
                </div><br>
                
                <button style="color:#0a0; box-shadow:0px 1px 2px 2px black; outline:none; border-radius:20px 20px; background:transparent; border:solid transparent;" type="button" class="btn btn-md btn-primary" id="poker_play_pause">
                  <i id="poker_play" class="glyphicon glyphicon-play"></i> 
                  <span id="play_pause_div">START</span>
                </button>
                <span style="margin-left: 50px;"></span>
                <button style="color: skyblue; box-shadow:0px 1px 2px 2px black;  outline:none; border-radius:20px 20px; background:transparent; border:solid transparent;" type="button" class="btn btn-md btn-success" id="poker_next_round"><i class="glyphicon glyphicon-arrow-right"></i> NEXT</button>
                <span style="margin-left: 50px;"></span>
                <button style="color:orange; box-shadow:0px 1px 2px 2px black;  outline:none; border-radius:20px 20px; background:transparent; border:solid transparent;" type="button" class="btn btn-md btn-warning reset" onclick='refreshPage()'><i class="glyphicon glyphicon-refresh"></i> RESET</button>
              </center> </form><br>
              
                <ul id="pagination" class="list-group posts endless-pagination"><!-- LEVEL SECTION -->
                <li class="list-group-item text-muted" style="font-size: 30px; background: #0a0; color: white; box-shadow:0px 2px 2px 2px black;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent; font-family:Baskerville Old;"><b>LEVELS - BLINDS</b><span class="pull-right"><b>DURATION</b></span></li>
            
                  <li class="list-group-item text-center" style="border:none; background: transparent; font-size: 35px; color:#0a0; font-family:'digital-clock-font"><b>CURRENT LEVEL</b></li>
                  <li class="list-group-item text-right">
                    <span class="pull-left">
                      <span class="pull-left">
                        <strong id="currentlevel1" style="font-size: 30px; ">{{ $timertournament[0]->level }} - {{ $timertournament[0]->blinds }}</strong>
                      </span>
                    </span><strong id="currentlevel2" style="font-size: 30px;">{{ gmdate("i:s", $timertournament[0]->in_seconds ) }} mins.</strong>   
                  </li>


                   <li class="list-group-item text-center" style="border:none; background: transparent; font-size: 35px; color:#0a0; font-family:'digital-clock-font"><b>NEXT LEVEL</b></li>
                  <li class="list-group-item text-right">
                    <span class="pull-left">
                      <span class="pull-left">
                        <strong id="nextlevel1" style="font-size: 30px;">{{ $timertournament[1]->level }} - {{ $timertournament[1]->blinds }}</strong>
                      </span>
                    </span><strong id="nextlevel2" style="font-size: 30px;">{{ gmdate("i:s", $timertournament[1]->in_seconds ) }} mins.</strong>
                  </li>
                  </ul><!-- END LEVEL SECTION -->
            </div><!--/col-5-->


        <div class="col-sm-3"><!-- col 4 -->
          <form style="box-shadow:0px 2px 2px 2px black;  outline:none; border-radius:10px 10px; background:white; border:solid transparent; font-family:Baskerville Old;">
            <ul class="list-group">
            <li class="list-group-item" style="background: #0a0; box-shadow:0px 2px 2px 2px gray;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent;"><b style="font-size: 30px; color: white; font-family:Baskerville Old;"><span class="pull-right"><b><input id="potmoney" style="text-align: right; height: 40px; width: 310px; font-size: 35px; background: black; border: none; color: red; border-radius:10px 10px; box-shadow:0px 1px 2px 2px white;" disabled="" value="Php {{ number_format($eprize->totalprize) }}"></b></span><b>PRIZE</b></li>

            <?php 
            $tchips1 = $eprize->totalprize;
            $nprize1 = $eprizemoney[0]->amount;
            $total1 = $tchips1*$nprize1;
            $result1 = number_format($total1);

            $tchips2 = $eprize->totalprize;
            $nprize2 = $eprizemoney[1]->amount;
            $total2 = $tchips2*$nprize2;
            $result2 = number_format($total2);

            $tchips3 = $eprize->totalprize;
            $nprize3 = $eprizemoney[2]->amount;
            $total3 = $tchips3*$nprize3;
            $result3 = number_format($total3);
           ?>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$eprizemoney[0]->place}}</strong></span><b><input disabled="" id="prize1" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result1 }}"></b></li>
            
            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$eprizemoney[1]->place}}</strong></span><b><input disabled="" id="prize2" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result2 }}"></b></li>

             <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$eprizemoney[2]->place}}</strong></span><b><input disabled="" id="prize3" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result3 }}"></b></li>
            </ul></form>
        </div><!--/col-4-->

        </div> 
      </div><!--/tab-pane-->
      </div><!--/tab-content-->
    </div><!--/row-->
                                                      
    <audio id="soundHandle1" style="display: none;"></audio>
    <audio id="soundHandle2" style="display: none;"></audio>

@push('custom-scripts')
<script type="text/javascript">
  var Poker = (function () {
    var round = 0;
    var timerindex = 0;
    var duration = '{{ $timertournament[0]->in_seconds }}';
    var endtournament;
    var timer = duration;
    var interval_id;
    
    return {
      isGamePaused: function () {
        return !interval_id ? true : false;
      },
      playAlarm: function () {
        soundHandle1.src = '{{asset('sound/alertnext1.mp3')}}';
        soundHandle1.play();
      },
      playAlarmendtournament: function () {
        soundHandle2.src = '{{asset('sound/alert.mp3')}}';
        soundHandle2.play();
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
     // increase round
        round += 1;
        switch (round){
          case 0:
            timer =  '{{ $timertournament[0]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 1:
            timer =  '{{ $timertournament[1]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 2:
            timer =  '{{ $timertournament[2]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 3:
            timer =  '{{ $timertournament[3]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 4:
            timer =  '{{ $timertournament[4]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 5:
            timer =  '{{ $timertournament[5]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 6:
            timer =  '{{ $timertournament[6]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 7:
            timer =  '{{ $timertournament[7]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 8:
            timer =  '{{ $timertournament[8]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 9:
            timer =  '{{ $timertournament[9]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 10:
            timer =  '{{ $timertournament[10]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 11:
            timer =  '{{ $timertournament[11]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 12:
            timer =  '{{ $timertournament[12]->in_seconds }}';
            this.updateClock(timer);
            break;
          case 13:
            endtournament = '{{$timertournament[13]->in_seconds}}';
            this.updateClock(endtournament);
            break;
          default:
            endtournament = 0; 
            this.updateClock(endtournament);
            break;
        }
        // reset play/pause button
        this.updatePlayPauseButton();
        this.updateRound(round);
        // increase blinds
        this.updateBlinds(round);
      },
      stopClock: function () {
        clearInterval(interval_id);
        interval_id = undefined;
      },
      updateBlinds: function (round) {

          switch (round){
          case 0:
            $('#poker_blinds').html('{{ $timertournament[0]->blinds }}');
            break;
          case 1:
            $('#poker_blinds').html('{{ $timertournament[1]->blinds }}');
            break;
          case 2:
            $('#poker_blinds').html('{{ $timertournament[2]->blinds }}');
            break;
          case 3:
            $('#poker_blinds').html('<b style="color:red;">'+'{{ $timertournament[3]->blinds }}'+'</b>'); //first break
            break;
          case 4:
            $('#poker_blinds').html('{{ $timertournament[4]->blinds }}');
            break;
          case 5:
            $('#poker_blinds').html('{{ $timertournament[5]->blinds }}');
            break;
          case 6:
            $('#poker_blinds').html('{{ $timertournament[6]->blinds }}');
            break;
          case 7:
            $('#poker_blinds').html('{{ $timertournament[7]->blinds }}');
            break;
          case 8:
            $('#poker_blinds').html('<b style="color:red;">'+'{{ $timertournament[8]->blinds }}'+'</b>'); //second break
            break; 
          case 9:
            $('#poker_blinds').html('{{ $timertournament[9]->blinds }}');
            break;
          case 10:
            $('#poker_blinds').html('{{ $timertournament[10]->blinds }}');
            break;
          case 11:
            $('#poker_blinds').html('{{ $timertournament[11]->blinds }}');
            break;
          case 12:
            $('#poker_blinds').html('{{ $timertournament[12]->blinds }}');
            break;
          case 13:
            $('#poker_blinds').html('{{ $timertournament[13]->blinds }}');
            break;
        }

      },
      updateClock: function (timer) {

        if(endtournament == 0){ //end of tournament
          $('#round').html('<b class="blink" style="color:red; font-size: 60px;">'+'{{ $timertournament[13]->level }}'+'</b>');
          $('#clocker').html('<p class="blink">'+'{{ gmdate("i:s", $timertournament[13]->in_seconds) }}'+'</p>');
          $('#poker_blinds').html('<b style="color:red; font-size: 60px;">'+'{{ $timertournament[13]->blinds }}'+'</b>');
          this.playAlarmendtournament();
        }

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

        switch (round){
          case 0:
            $('#round').html('{{ $timertournament[0]->level }}');
            $('#currentlevel1').html('{{ $timertournament[0]->level }}'+' - '+'{{ $timertournament[0]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[0]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[1]->level }}'+' - '+'{{ $timertournament[1]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[1]->in_seconds ) }}');
            break;
          case 1:
            $('#round').html('{{ $timertournament[1]->level }}');
            $('#currentlevel1').html('{{ $timertournament[1]->level }}'+' - '+'{{ $timertournament[1]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[1]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[2]->level }}'+' - '+'{{ $timertournament[2]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[2]->in_seconds ) }}');
            break;
          case 2:
            $('#round').html('{{ $timertournament[2]->level }}');
            $('#currentlevel1').html('{{ $timertournament[2]->level }}'+' - '+'{{ $timertournament[2]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[2]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[3]->level }}'+' - '+'{{ $timertournament[3]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[3]->in_seconds ) }}');
            break;
          case 3:
            $('#round').html('<b style="color:red;">'+'{{ $timertournament[3]->level }}'+'</b>');
             $('#currentlevel1').html('{{ $timertournament[3]->level }}'+' - '+'{{ $timertournament[3]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[3]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[4]->level }}'+' - '+'{{ $timertournament[4]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[4]->in_seconds ) }}');
            break;
          case 4:
            $('#round').html('{{ $timertournament[4]->level }}');
             $('#currentlevel1').html('{{ $timertournament[4]->level }}'+' - '+'{{ $timertournament[4]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[4]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[5]->level }}'+' - '+'{{ $timertournament[5]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[5]->in_seconds ) }}');
            break;
          case 5:
            $('#round').html('{{ $timertournament[5]->level }}');
             $('#currentlevel1').html('{{ $timertournament[5]->level }}'+' - '+'{{ $timertournament[5]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[5]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[6]->level }}'+' - '+'{{ $timertournament[6]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[6]->in_seconds ) }}');
            break;
          case 6:
            $('#round').html('{{ $timertournament[6]->level }}');
             $('#currentlevel1').html('{{ $timertournament[6]->level }}'+' - '+'{{ $timertournament[6]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[6]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[7]->level }}'+' - '+'{{ $timertournament[7]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[7]->in_seconds ) }}');
            break;
          case 7:
            $('#round').html('{{ $timertournament[7]->level }}');
             $('#currentlevel1').html('{{ $timertournament[7]->level }}'+' - '+'{{ $timertournament[7]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[7]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[8]->level }}'+' - '+'{{ $timertournament[8]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[8]->in_seconds ) }}');
            break;
          case 8:
            $('#round').html('<b style="color:red;">'+'{{ $timertournament[8]->level }}'+'</b>');
             $('#currentlevel1').html('{{ $timertournament[8]->level }}'+' - '+'{{ $timertournament[8]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[8]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[9]->level }}'+' - '+'{{ $timertournament[9]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[9]->in_seconds ) }}');
            break;
          case 9:
            $('#round').html('{{ $timertournament[9]->level }}');
             $('#currentlevel1').html('{{ $timertournament[9]->level }}'+' - '+'{{ $timertournament[9]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[9]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[10]->level }}'+' - '+'{{ $timertournament[10]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[10]->in_seconds ) }}');
            break;
          case 10:
            $('#round').html('{{ $timertournament[10]->level }}');
             $('#currentlevel1').html('{{ $timertournament[10]->level }}'+' - '+'{{ $timertournament[10]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[10]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[11]->level }}'+' - '+'{{ $timertournament[11]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[11]->in_seconds ) }}');
            break;
          case 11:
            $('#round').html('{{ $timertournament[11]->level }}');
             $('#currentlevel1').html('{{ $timertournament[11]->level }}'+' - '+'{{ $timertournament[11]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[11]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[12]->level }}'+' - '+'{{ $timertournament[12]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[12]->in_seconds ) }}');
            break;
          case 12:
            $('#round').html('{{ $timertournament[12]->level }}');
             $('#currentlevel1').html('{{ $timertournament[12]->level }}'+' - '+'{{ $timertournament[12]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[12]->in_seconds ) }}');
            $('#nextlevel1').html('{{ $timertournament[13]->level }}'+' - '+'{{ $timertournament[13]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[13]->in_seconds ) }}');
            break;
            
        }
      }
    };
  }());

  $('#poker_play_pause').on('click', function (event) {
    if (Poker.isGamePaused()) {
      $('#poker_play').removeClass('glyphicon-play');
      $('#poker_play').removeClass('glyphicon-pause');
      $('#poker_play_pause').removeClass('btn-primary');
      $('#poker_play_pause').addClass('btn-danger');
      $('#play_pause_div').html('<span style="color:red;"><i class="glyphicon glyphicon-pause"></i> PAUSE</span>');
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

  function blueButtonPlay()
  {
    $('#poker_play').removeClass('glyphicon-play');
    $('#poker_play').removeClass('glyphicon-pause');
    $('#poker_play_pause').removeClass('btn-danger');
    $('#poker_play_pause').addClass('btn-primary');
    $('#play_pause_div').html('<span style="color:#0a0;"><i class="glyphicon glyphicon-play"></i> START</span>');
  }

 /*DAILY TOURNAMENT*/  
  $('#saveNewPlayer').click(function(event) { 
    /* Act on the event */
    var totalplayers = $('#totalplayers').val();

    $.ajax({
      url: '{{ route('addplayer') }}',
      type: 'post',
      dataType: 'json',
      data: {
        _token : '{{ csrf_token() }}',
        totalplayers : totalplayers
      },
      success: function (data) {
          $('#inputplayer').val(data.total);
          $('#avechips').val(data.ave);
          $('#totalchips').val(data.tchips);

          $('#addplayermodal').modal('hide');
      }
    });
  });

  $('#saveMinusPlayer').click(function(event) {
    /* Act on the event */
    var mplayers = $('#mplayers').val();
    $.ajax({
        url: '{{ route('minusplayer') }}',
        type: 'post',
        dataType: 'json',
        data: {
          _token : '{{ csrf_token() }}',
          mplayers : mplayers
        },
        success: function (data) {
          $('#inputplayer').val(data.total);
          $('#avechips').val(data.ave);
          $('#totalchips').val(data.tchips);

          $('#minusplayermodal').modal('hide');
        }

    });
  });

  $('#saveRebuy').click(function(event) {
    /* Act on the event */
     var totalrebuys = $('#totalrebuys').val();
     // console.log(totalrebuys);
     $.ajax({
       url: '{{ route('rebuy') }}',
       type: 'post',
       dataType: 'json',
       data: {
          _token : '{{ csrf_token() }}',
          totalrebuys : totalrebuys
       },
       success: function (data) {
          console.log(data);
          $('#inputRebuy').val(data.total);
          $('#avechips').val(data.ave);
          $('#totalchips').val(data.tchips);
          $('#potmoney').val(data.potmoney);
          $('#prize1').val(data.total101);
          $('#prize2').val(data.total102);
          $('#prize3').val(data.total103);

          $('#updaterebuymodal').modal('hide');
       }
     });
  });
/*Refresh the Levels*/
   function refreshPage(){
        if(confirm("Are you sure want to reset?")){
          location.reload();
        }       
      }
</script>
@endpush

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


