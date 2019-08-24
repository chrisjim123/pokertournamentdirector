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
    <strong style="color:red;">Note: Please set <a href="{{url('sbuyinview')}}">Buyin Amount</a> and <a href="{{url('spotmoneyview')}}">Pot Money</a> before adding a player.</strong>
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
           <li class="list-group-item" style="font-size: 30px; background: #0a0; color: white; box-shadow:0px 2px 2px 2px white;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent; font-family:Baskerville Old;"><span class="pull-right"><a href="{{ url('/sresetalletournament') }}"><button title="Reset All" style="box-shadow:0px 1px 2px 2px #0a0;  outline:none; border-radius:10px 10px; background:white; border:solid transparent;" id="resetall" type="button"  class="btn btn-sm btn-success"><i style="color:red;" class="glyphicon glyphicon-refresh" ></i></button></a></span><b>SAT - TOURNAMENT</b></li>
 
            <li class="list-group-item text-right" ><span class="pull-left" style="font-size: 25px;"><strong id="tplayer">Players</strong></span>
                 <button style="box-shadow:0px 1px 2px 2px white;  outline:none; border-radius:10px 10px; background:transparent; border:solid transparent;" data-toggle="modal" data-target="#minusplayermodal" type="button"  class="btn btn-md btn-danger"><i style="color:red;" class="glyphicon glyphicon-minus"></i></button>&nbsp;
                 <button style="box-shadow:0px 1px 2px 2px white;  outline:none; border-radius:10px 10px; background:transparent; border:solid transparent;" data-toggle="modal" data-target="#addplayermodal" type="button" type="button" class="btn btn-md btn-primary"><i style="color:#0a0;" class="glyphicon glyphicon-plus"></i></button>&nbsp;
                 <b><input disabled="" id="inputplayer" value="{{ $buyin->totalplayers }}" style="text-align: right; height: 40px; width:150px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b>
                </li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Rebuys</strong></span>
              <button style="box-shadow:0px 1px 2px 2px white;  outline:none; border-radius:10px 10px; background:transparent; border:solid transparent;" data-toggle="modal" data-target="#updaterebuymodal" type="button"  class="btn btn-md btn-primary"><i style="color:#0a0;" class="glyphicon glyphicon-plus"></i></button>&nbsp;
            <b><input disabled="" id="inputRebuy" value="{{ $buyin->totalbuyer }}" style="text-align: right; height: 40px; width:150px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b></li>
    
              <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Ave. Chips</strong></span><b><input disabled="" id="avechips" value="{{ number_format($buyin->averagechips) }}" style="text-align: right; height: 40px; width:250px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b> </li>
          
             <li class="list-group-item text-right"><span class="pull-left" style="font-size: 25px;"><strong>Total Chips</strong></span><b><input disabled="" id="totalchips" type="text" value="{{ number_format($buyin->totalchips) }}" id="tchips" name="tchips" style="text-align: right; height: 40px; width:250px; font-size: 35px; background: black; border: none; color: white; border-radius:5px 5px; box-shadow:0px 1px 2px 2px white; outline: none;"></b> </li>
          </ul></form><br>


            <form style="box-shadow:0px 2px 2px 2px black;  outline:none; border-radius:10px 10px; background:white; border:solid transparent; font-family:Baskerville Old;">
            <ul class="list-group"><!-- Chips Section -->
            <li class="list-group-item" style="font-size: 30px; background: #0a0; color: white; box-shadow:0px 2px 2px 2px gray;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent; font-family:Baskerville Old;"><b>CHIPS VALUE</b> </li><br>
            <div class="row"><!-- Players Row -->
            @foreach($chips as $chips)
            <div class="col-md-6">
            <li style="background: transparent; border: none;" data-toggle="modal" data-target="#v1" type="button" class="list-group-item text-right"><span class="pull-center" ><center><img title="Click to Preview" src="{{asset('uploads')}}/{{$chips->images}}" style="height: 125px; width: 125px; box-shadow:0px 3px 3px 3px gray;  outline:none;" class="avatar img-circle img-thumbnail" alt="avatar"><br><b style="font-size: 35px;  color:black;">{{number_format($chips->value)}}</b></center></span></li>
            </div>
              @endforeach
            </div>
            </ul> <!-- End Chips Section -->
            </form>

        </div><!--/col-3-->


        <div class="col-sm-6"><!-- col 5 -->
          <form style="border: 4px solid #a1a1a1;margin-top: 0px;padding: 20px; box-shadow:0px 2px 5px 5px #0a0;  outline:none; border-radius:20px 20px; background:transparent; border:solid transparent;">
              <center>
                <h1 id="round" style="margin-bottom: -50px; font-size: 90px; color: white;">{{ $timertournament[0]->level }}</h1>
                <div id="clocker" class="clock" style="font-size: 310px; color:#0a0; font-family:'digital-clock-font'">{{ gmdate("i:s", $timertournament[0]->in_seconds ) }}</div>
                
                <div id="poker_blinds" style="margin-top: -65px; margin-bottom: 20px; font-size: 70px; color:white;">{{ $timertournament[0]->blinds }}
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
                        <strong id="currentlevel1" style="font-size: 30px;">{{ $timertournament[0]->level }} - {{ $timertournament[0]->blinds }}</strong>
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
            <li class="list-group-item" style="background: #0a0; box-shadow:0px 2px 2px 2px gray;  outline:none; border-radius:10px 10px; background:#0a0; border:solid transparent;"><b style="font-size: 30px; color: white; font-family:Baskerville Old;"><span class="pull-right"><b><input id="potmoney" class="pull-right" style="text-align: right; height: 40px; width: 310px; font-size: 35px; background: black; border: none; color: red; border-radius:10px 10px; box-shadow:0px 1px 2px 2px white;" disabled="" value="Php {{ number_format($prize->totalprize) }}"></b></span><b>PRIZE</b></li>

            <?php 
            $tchips1 = $prize->totalprize;
            $nprize1 = $prizemoney[0]->amount;
            $total1 = $tchips1*$nprize1;
            $result1 = number_format($total1);

            $tchips2 = $prize->totalprize;
            $nprize2 = $prizemoney[1]->amount;
            $total2 = $tchips2*$nprize2;
            $result2 = number_format($total2);

            $tchips3 = $prize->totalprize;
            $nprize3 = $prizemoney[2]->amount;
            $total3 = $tchips3*$nprize3;
            $result3 = number_format($total3);

            $tchips4 = $prize->totalprize;
            $nprize4 = $prizemoney[3]->amount;
            $total4 = $tchips4*$nprize4;
            $result4 = number_format($total4);

            $tchips5 = $prize->totalprize;
            $nprize5 = $prizemoney[4]->amount;
            $total5 = $tchips5*$nprize5;
            $result5 = number_format($total5);

            $tchips6 = $prize->totalprize;
            $nprize6 = $prizemoney[5]->amount;
            $total6 = $tchips6*$nprize6;
            $result6 = number_format($total6);

            $tchips7 = $prize->totalprize;
            $nprize7 = $prizemoney[6]->amount;
            $total7 = $tchips7*$nprize7;
            $result7 = number_format($total7);

            $tchips8 = $prize->totalprize;
            $nprize8 = $prizemoney[7]->amount;
            $total8 = $tchips8*$nprize8;
            $result8 = number_format($total8);

            $tchips9 = $prize->totalprize;
            $nprize9 = $prizemoney[8]->amount;
            $total9 = $tchips9*$nprize9;
            $result9 = number_format($total9);

            $tchips10 = $prize->totalprize;
            $nprize10 = $prizemoney[9]->amount;
            $total10 = $tchips10*$nprize10;
            $result10 = number_format($total10);
           ?>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[0]->place}}</strong></span><b><input id="prize1" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result1 }}"></b></li>
            
            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[1]->place}}</strong></span><b><input id="prize2" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result2 }}"></b></li>

             <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[2]->place}}</strong></span><b><input id="prize3" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result3 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[3]->place}}</strong></span><b><input id="prize4" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result4 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[4]->place}}</strong></span><b><input id="prize5" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result5 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[5]->place}}</strong></span><b><input id="prize6" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result6 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[6]->place}}</strong></span><b><input id="prize7" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result7 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[7]->place}}</strong></span><b><input id="prize8" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result8 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[8]->place}}</strong></span><b><input id="prize9" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result9 }}"></b></li>

            <li class="list-group-item text-right"><span class="pull-left" style="font-size: 35px;"><strong style="color:black;">{{$prizemoney[9]->place}}</strong></span><b><input id="prize10" disabled="" style="background: white; border:none; text-align: right; font-size: 40px; color:black; outline: none; width: 310px;" value="Php {{ $result10 }}"></b></li>
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
            timer =  '{{ $timertournament[13]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 14:
            timer =  '{{ $timertournament[14]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 15:
            timer =  '{{ $timertournament[15]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 16:
            timer =  '{{ $timertournament[16]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 17:
            timer =  '{{ $timertournament[17]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 18:
            timer =  '{{ $timertournament[18]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 19:
            timer =  '{{ $timertournament[19]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 20:
            timer =  '{{ $timertournament[20]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 21:
            timer =  '{{ $timertournament[21]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 22:
            timer =  '{{ $timertournament[22]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 23:
            timer =  '{{ $timertournament[23]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 24:
            timer =  '{{ $timertournament[24]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 25:
            timer =  '{{ $timertournament[25]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 26:
            timer =  '{{ $timertournament[26]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 27:
            timer =  '{{ $timertournament[27]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 28:
            timer =  '{{ $timertournament[28]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 29:
            timer =  '{{ $timertournament[29]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 30:
            timer =  '{{ $timertournament[30]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 31:
            timer =  '{{ $timertournament[31]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 32:
            timer =  '{{ $timertournament[32]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 33:
            timer =  '{{ $timertournament[33]->in_seconds }}';
            this.updateClock(timer);
            break;
            case 34:
            endtournament = '{{$timertournament[34]->in_seconds}}';
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
            $('#poker_blinds').html('{{ $timertournament[3]->blinds }}');
            break;
          case 4:
            $('#poker_blinds').html('{{ $timertournament[4]->blinds }}');
            break;
          case 5:
            $('#poker_blinds').html('{{ $timertournament[5]->blinds }}');
            break;
            case 6:
            $('#poker_blinds').html('<b style="color:red;">'+'{{ $timertournament[6]->blinds }}'+'</b>');
            break;
            case 7:
            $('#poker_blinds').html('{{ $timertournament[7]->blinds }}');
            break;
            case 8:
            $('#poker_blinds').html('{{ $timertournament[8]->blinds }}');
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
            $('#poker_blinds').html('<b style="color:red;">'+'{{ $timertournament[13]->blinds }}'+'</b>');
            break;
            case 14:
            $('#poker_blinds').html('{{ $timertournament[14]->blinds }}');
            break;
            case 15:
            $('#poker_blinds').html('{{ $timertournament[15]->blinds }}');
            break;
            case 16:
            $('#poker_blinds').html('{{ $timertournament[16]->blinds }}');
            break;
            case 17:
            $('#poker_blinds').html('{{ $timertournament[17]->blinds }}');
            break;
            case 18:
            $('#poker_blinds').html('{{ $timertournament[18]->blinds }}');
            break;
            case 19:
            $('#poker_blinds').html('{{ $timertournament[19]->blinds }}');
            break;
            case 20:
            $('#poker_blinds').html('<b style="color:red;">'+'{{ $timertournament[20]->blinds }}'+'</b>');
            break;
            case 21:
            $('#poker_blinds').html('{{ $timertournament[21]->blinds }}');
            break;
            case 22:
            $('#poker_blinds').html('{{ $timertournament[22]->blinds }}');
            break;
            case 23:
            $('#poker_blinds').html('{{ $timertournament[23]->blinds }}');
            break;
            case 24:
            $('#poker_blinds').html('{{ $timertournament[24]->blinds }}');
            break;
            case 25:
            $('#poker_blinds').html('{{ $timertournament[25]->blinds }}');
            break;
            case 26:
            $('#poker_blinds').html('{{ $timertournament[26]->blinds }}');
            break;
            case 27:
            $('#poker_blinds').html('<b style="color:red;">'+'{{ $timertournament[27]->blinds }}'+'</b>');
            break;
            case 28:
            $('#poker_blinds').html('{{ $timertournament[28]->blinds }}');
            break;
            case 29:
            $('#poker_blinds').html('{{ $timertournament[29]->blinds }}');
            break;
            case 30:
            $('#poker_blinds').html('{{ $timertournament[30]->blinds }}');
            break;
            case 31:
            $('#poker_blinds').html('{{ $timertournament[31]->blinds }}');
            break;
            case 32:
            $('#poker_blinds').html('{{ $timertournament[32]->blinds }}');
            break;
            case 33:
            $('#poker_blinds').html('{{ $timertournament[33]->blinds }}');
            break;
             case 34:
            $('#poker_blinds').html('{{ $timertournament[34]->blinds }}');
            break;
         
        }

      },
      updateClock: function (timer) {

          if(endtournament == 0){ //end of tournament
          $('#round').html('<b class="blink" style="color:red; font-size: 60px;"">'+'{{ $timertournament[34]->level }}'+'</b>');
          $('#clocker').html('<p class="blink">'+'{{ gmdate("i:s", $timertournament[34]->in_seconds) }}'+'</p>');
          $('#poker_blinds').html('<b style="color:red; font-size: 60px;">'+'{{ $timertournament[34]->blinds }}'+'</b>');
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
            $('#round').html('{{ $timertournament[3]->level }}');
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
            $('#round').html('<b style="color:red;">'+'{{ $timertournament[6]->level }}'+'</b>');
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
            $('#round').html('{{ $timertournament[8]->level }}');
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
             case 13:
            $('#round').html('<b style="color:red;">'+'{{ $timertournament[13]->level }}'+'</b>');
             $('#currentlevel1').html('{{ $timertournament[13]->level }}'+' - '+'{{ $timertournament[13]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[13]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[14]->level }}'+' - '+'{{ $timertournament[14]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[14]->in_seconds ) }}');
            break;
             case 14:
            $('#round').html('{{ $timertournament[14]->level }}');
             $('#currentlevel1').html('{{ $timertournament[14]->level }}'+' - '+'{{ $timertournament[14]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[14]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[15]->level }}'+' - '+'{{ $timertournament[15]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[15]->in_seconds ) }}');
            break;
             case 15:
            $('#round').html('{{ $timertournament[15]->level }}');
             $('#currentlevel1').html('{{ $timertournament[15]->level }}'+' - '+'{{ $timertournament[15]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[15]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[16]->level }}'+' - '+'{{ $timertournament[16]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[16]->in_seconds ) }}');
            break;
             case 16:
            $('#round').html('{{ $timertournament[16]->level }}');
             $('#currentlevel1').html('{{ $timertournament[16]->level }}'+' - '+'{{ $timertournament[16]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[16]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[17]->level }}'+' - '+'{{ $timertournament[17]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[17]->in_seconds ) }}');
            break;
             case 17:
            $('#round').html('{{ $timertournament[17]->level }}');
             $('#currentlevel1').html('{{ $timertournament[17]->level }}'+' - '+'{{ $timertournament[17]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[17]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[18]->level }}'+' - '+'{{ $timertournament[18]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[18]->in_seconds ) }}');
            break;
             case 18:
            $('#round').html('{{ $timertournament[18]->level }}');
             $('#currentlevel1').html('{{ $timertournament[18]->level }}'+' - '+'{{ $timertournament[18]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[18]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[19]->level }}'+' - '+'{{ $timertournament[19]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[19]->in_seconds ) }}');
            break;
             case 19:
            $('#round').html('{{ $timertournament[19]->level }}');
             $('#currentlevel1').html('{{ $timertournament[19]->level }}'+' - '+'{{ $timertournament[19]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[19]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[20]->level }}'+' - '+'{{ $timertournament[20]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[20]->in_seconds ) }}');
            break;
             case 20:
            $('#round').html('<b style="color:red;">'+'{{ $timertournament[20]->level }}'+'</b>');
             $('#currentlevel1').html('{{ $timertournament[20]->level }}'+' - '+'{{ $timertournament[20]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[20]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[21]->level }}'+' - '+'{{ $timertournament[21]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[21]->in_seconds ) }}');
            break;
             case 21:
            $('#round').html('{{ $timertournament[21]->level }}');
             $('#currentlevel1').html('{{ $timertournament[21]->level }}'+' - '+'{{ $timertournament[21]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[21]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[22]->level }}'+' - '+'{{ $timertournament[22]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[22]->in_seconds ) }}');
            break;
             case 22:
            $('#round').html('{{ $timertournament[22]->level }}');
             $('#currentlevel1').html('{{ $timertournament[22]->level }}'+' - '+'{{ $timertournament[22]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[22]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[23]->level }}'+' - '+'{{ $timertournament[23]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[23]->in_seconds ) }}');
            break;
             case 23:
            $('#round').html('{{ $timertournament[23]->level }}');
             $('#currentlevel1').html('{{ $timertournament[23]->level }}'+' - '+'{{ $timertournament[23]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[23]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[24]->level }}'+' - '+'{{ $timertournament[24]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[24]->in_seconds ) }}');
            break;
             case 24:
            $('#round').html('{{ $timertournament[24]->level }}');
             $('#currentlevel1').html('{{ $timertournament[24]->level }}'+' - '+'{{ $timertournament[24]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[24]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[25]->level }}'+' - '+'{{ $timertournament[25]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[25]->in_seconds ) }}');
            break;
             case 25:
            $('#round').html('{{ $timertournament[25]->level }}');
             $('#currentlevel1').html('{{ $timertournament[25]->level }}'+' - '+'{{ $timertournament[25]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[25]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[26]->level }}'+' - '+'{{ $timertournament[26]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[26]->in_seconds ) }}');
            break;
             case 26:
            $('#round').html('{{ $timertournament[26]->level }}');
             $('#currentlevel1').html('{{ $timertournament[26]->level }}'+' - '+'{{ $timertournament[26]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[26]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[27]->level }}'+' - '+'{{ $timertournament[27]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[27]->in_seconds ) }}');
            break;
             case 27:
            $('#round').html('<b style="color:red;">'+'{{ $timertournament[27]->level }}'+'</b>');
             $('#currentlevel1').html('{{ $timertournament[27]->level }}'+' - '+'{{ $timertournament[27]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[27]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[28]->level }}'+' - '+'{{ $timertournament[28]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[28]->in_seconds ) }}');
            break;
             case 28:
            $('#round').html('{{ $timertournament[28]->level }}');
             $('#currentlevel1').html('{{ $timertournament[28]->level }}'+' - '+'{{ $timertournament[28]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[28]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[29]->level }}'+' - '+'{{ $timertournament[29]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[29]->in_seconds ) }}');
            break;
             case 29:
            $('#round').html('{{ $timertournament[29]->level }}');
             $('#currentlevel1').html('{{ $timertournament[29]->level }}'+' - '+'{{ $timertournament[29]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[29]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[30]->level }}'+' - '+'{{ $timertournament[30]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[30]->in_seconds ) }}');
            break;
             case 30:
            $('#round').html('{{ $timertournament[30]->level }}');
             $('#currentlevel1').html('{{ $timertournament[30]->level }}'+' - '+'{{ $timertournament[30]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[30]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[31]->level }}'+' - '+'{{ $timertournament[31]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[31]->in_seconds ) }}');
            break;
             case 31:
            $('#round').html('{{ $timertournament[31]->level }}');
             $('#currentlevel1').html('{{ $timertournament[31]->level }}'+' - '+'{{ $timertournament[31]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[31]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[32]->level }}'+' - '+'{{ $timertournament[32]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[32]->in_seconds ) }}');
            break;
             case 32:
            $('#round').html('{{ $timertournament[32]->level }}');
             $('#currentlevel1').html('{{ $timertournament[32]->level }}'+' - '+'{{ $timertournament[32]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[32]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[33]->level }}'+' - '+'{{ $timertournament[33]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[33]->in_seconds ) }}');
            break;
              case 33:
            $('#round').html('{{ $timertournament[33]->level }}');
             $('#currentlevel1').html('{{ $timertournament[33]->level }}'+' - '+'{{ $timertournament[33]->blinds }}');
            $('#currentlevel2').html('{{ gmdate("i:s", $timertournament[33]->in_seconds ) }}');
             $('#nextlevel1').html('{{ $timertournament[34]->level }}'+' - '+'{{ $timertournament[34]->blinds }}');
            $('#nextlevel2').html('{{ gmdate("i:s", $timertournament[34]->in_seconds ) }}');
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
      url: '{{ route('saddplayer') }}',
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
        url: '{{ route('sminusplayer') }}',
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
       url: '{{ route('srebuy') }}',
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
          $('#prize4').val(data.total104);
          $('#prize5').val(data.total105);
          $('#prize6').val(data.total106);
          $('#prize7').val(data.total107);
          $('#prize8').val(data.total108);
          $('#prize9').val(data.total109);
          $('#prize10').val(data.total110);

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


