<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Laravel\Scout\Searchable;
use Intervention\Image\ImageServiceProvider;
use Intervention\Image\ImageManager;
use Session;

//Saturday Tournament Databases
use App\Buyin;
use App\Chips;
use App\Tournament;
use App\Prizemoney;
use App\Prize;

class SaturdayTournamentController extends Controller
{
  public function saddplayer(Request $request)
  {
    /*SATURDAY TOURNAMENT FUNCTIONS*/
    $id = 101;
    $eprize = Prize::firstOrFail();
    $tprize = $eprize->totalprize;

    $ebuyin = Buyin::firstOrFail();
    $defbuyin = $ebuyin->buyinamount;
    $buyin = (int)$defbuyin;
    $erebuy = $ebuyin->totalbuyer;
    $eplayers = $ebuyin->totalplayers;
    $etchips = $ebuyin->totalchips;

    $tplayers = (int)$request->input('totalplayers');
    $newtotalplayers = ($eplayers+$tplayers);

    $totalchips = ($buyin*$tplayers);
    $gtchips = ($etchips+$totalchips);
    $averagechips = ($gtchips/$newtotalplayers);

    if($defbuyin != 0 AND $tprize !=0){
    DB::update('update buyin set totalplayers = ?, buyinamount = ?, totalchips = ?, averagechips = ? where id = ?' ,[$newtotalplayers,$buyin,$gtchips,$averagechips,$id]);

    $result = [
      'total' => number_format($newtotalplayers),
      'ave' => number_format($averagechips),
      'tchips' => number_format($gtchips)
    ];
    echo json_encode($result);

    exit;
    }else{
        session()->flash('status', 'Please set Buyin Amount and Pot Money.');
        return redirect()->back();

  }
  }

  public function sminusplayer(Request $request)
  {
    $id = 101;
    $eprize = Prize::firstOrFail();
    $tprize = $eprize->totalprize;

    $ebuyin = Buyin::firstOrFail();
    $defbuyin = $ebuyin->buyinamount;
    $player = $ebuyin->totalplayers;
    $totalchips = $ebuyin->totalchips;

    $minusplayer = (int)$request->input('mplayers');
    $newtotalplayer = ($player-$minusplayer);

    $averagechips = ($totalchips/$newtotalplayer);

    if($defbuyin != 0 AND $tprize !=0){
    DB::update('update buyin set totalplayers = ?, averagechips = ? where id = ?' ,[$newtotalplayer,$averagechips,$id]);

    $result = [
      'total' => number_format($newtotalplayer),
      'ave' => number_format($averagechips),
      'tchips' => number_format($totalchips)
    ];

    echo json_encode($result);
    exit;
    }else{
        session()->flash('status', 'Please set Buyin Amount and Pot Money.');
        return redirect()->back();

  }
  }

  public function srebuy(Request $request)
  {
    $id = 101;
    $ebuyin = Buyin::firstOrFail();
    $defbuyin = $ebuyin->buyinamount;
    $buyin = (int)$defbuyin;

    $ebuyin = Buyin::firstOrFail();
    $erebuy = $ebuyin->totalbuyer;
    $newrebuy = (int)$request->input('totalrebuys');
    $totalrebuys = ($erebuy+$newrebuy);

    $totalbuyin = ($buyin*$newrebuy);

    $eprize = Prize::firstOrFail();
    $tprize = $eprize->totalprize;
 
    $totalpotmoney = ($tprize+$totalbuyin);

    DB::update('update prize set totalprize = ? where id = ?' ,[$totalpotmoney,$id]);

    $ebuyin = Buyin::firstOrFail();
    $players = $ebuyin->totalplayers;
    $tchips = $ebuyin->totalchips;
    $tplayers = ($players+$totalrebuys);

    $totalchips = ($tchips+$totalbuyin);
    $averagechips = ($totalchips/$players);

    DB::update('update buyin set totalbuyer = ?, totalchips = ?, averagechips = ? where id = ?' ,[$totalrebuys,$totalchips,$averagechips,$id]);

    $prizemoney = Prizemoney::all();

    $percent1 = $prizemoney[0]->amount;
    $total101 = ($totalpotmoney*$percent1);

    $percent2 = $prizemoney[1]->amount;
    $total102 = ($totalpotmoney*$percent2);

    $percent3 = $prizemoney[2]->amount;
    $total103 = ($totalpotmoney*$percent3);

    $percent4 = $prizemoney[3]->amount;
    $total104 = ($totalpotmoney*$percent4);

    $percent5 = $prizemoney[4]->amount;
    $total105 = ($totalpotmoney*$percent5);

    $percent6 = $prizemoney[5]->amount;
    $total106 = ($totalpotmoney*$percent6);

    $percent7 = $prizemoney[6]->amount;
    $total107 = ($totalpotmoney*$percent7);

    $percent8 = $prizemoney[7]->amount;
    $total108 = ($totalpotmoney*$percent8);

    $percent9 = $prizemoney[8]->amount;
    $total109 = ($totalpotmoney*$percent9);

    $percent10 = $prizemoney[9]->amount;
    $total110 = ($totalpotmoney*$percent10);

/*return results as json*/
    $result = [
      'total' => $totalrebuys,
      'ave' => number_format($averagechips),
      'tchips' => number_format($totalchips),
      'potmoney' => 'Php'.' '.number_format($totalpotmoney),
      'total101' => 'Php'.' '.number_format($total101),
      'total102' => 'Php'.' '.number_format($total102),
      'total103' => 'Php'.' '.number_format($total103),
      'total104' => 'Php'.' '.number_format($total104),
      'total105' => 'Php'.' '.number_format($total105),
      'total106' => 'Php'.' '.number_format($total106),
      'total107' => 'Php'.' '.number_format($total107),
      'total108' => 'Php'.' '.number_format($total108),
      'total109' => 'Php'.' '.number_format($total109),
      'total110' => 'Php'.' '.number_format($total110)
    ];
    echo json_encode($result);
    exit;
  }
/*END SATURDAY TOURNAMENT FUNCTIONS*/

   public function schipsview()
  {
    $chips = DB::select('SELECT * FROM chips');
    return view('saturdaytournament.schips', compact('chips'));
  } 

   public function saddnewchips()
  {
      return view('saturdaytournament.saddnewchips');
  }

  public function suploadchips(Request $request){

     request()->validate([
            'chipvalue' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

    if(isset($_POST['save']))
    {
        $chipvalue = $request->input('chipvalue');

        $file = $request->file('image');
        $destinationPath = 'uploads/saturday';
        $originalFile = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFile);
        $data = array("value"=>$chipvalue,"images"=>$originalFile);
        DB::table('chips')->insert($data);

        session()->flash('status', 'New Chips has been Successfully Added.');
        return redirect()->back(); 
    }else{
      return redirect('/schipsview');
    }
  }


public function supdatechipsview(Request $request, $id){
  
  $chips =DB::table('chips')->find($id);
      if ($chips == true) {
        return view('saturdaytournament.supdatechips', compact('chips'));
      }else{
         return redirect('/schipsview');
      }
}
 public function supdatechips(Request $request, $id){

     request()->validate([
            'chipvalue' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

    if(isset($_POST['update']))
    {
        $chipvalue = $request->input('chipvalue');

        $file = $request->file('image');
        $destinationPath = 'uploads/saturday';
        $originalFile = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFile);
        DB::update('update chips set value = ?, images = ? where id = ?' ,[$chipvalue,$originalFile,$id]);
        session()->flash('status', 'Chip updated Successfully.');
        return redirect()->back();
    
    }else{
      return redirect('/schipsview');
    }
 
 }

  public function sdelchips($id) {
      DB::delete('delete from chips where id = ?',[$id]);      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect()->back();
   }

   public function sresetalletournament()
  {
    $id = 101;
    $totalplayers = 0;
    $totalbuyer = 0;
    $buyinamount = 0;
    $totalchips = 0;
    $averagechips = 0;
    $prize = 0;
    DB::update('update buyin set totalplayers = ?, totalbuyer = ?, buyinamount = ?, totalchips = ?, averagechips =? where id = ?' ,[$totalplayers,$totalbuyer,$buyinamount,$totalchips,$averagechips,$id]);
    DB::update('update prize set totalprize = ? where id = ?' ,[$prize,$id]);
    return redirect()->back();
  }  

  public function splayersview()
  {
    $sbuyin = Buyin::firstOrFail();
    return view('saturdaytournament.splayers', compact('sbuyin'));
  }  

  public function supdateplayer(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $prize = Prize::firstOrFail();
    $tprize = $prize->totalprize;

    $sbuyin = Buyin::firstOrFail();
    $defbuyin = $sbuyin->buyinamount;
    $buyin = (int)$defbuyin;
    $totalplayers = (int)$request->input('player');

    if($buyin != 0 AND $tprize != 0)
    {
    if($totalplayers != 0)
    {
    $totalchips = ($buyin*$totalplayers);
    $averagechips = ($totalchips/$totalplayers);
    DB::update('update buyin set totalplayers = ?, buyinamount = ?, totalchips = ?, averagechips = ? where id = ?' ,[$totalplayers,$buyin,$totalchips,$averagechips,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }else{
    DB::update('update buyin set totalplayers = ? where id = ?' ,[$totalplayers,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }
    }else{
    session()->flash('danger', 'Please set Buyin Amount and Pot Money before adding a player.');
    return redirect()->back();
    }
    }else{
    return redirect()->back();
    }
  }

   public function sbuyinview()
  {
    $sbuyin = Buyin::firstOrFail();
    return view('saturdaytournament.sbuyin', compact('sbuyin'));
  } 

  public function supdatebuyin(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $sbuyin = $request->input('sbuyin');
    DB::update('update buyin set buyinamount = ? where id = ?' ,[$sbuyin,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }else{
    return redirect()->back();
    }
  }
  
    public function slevelview()
  {
    $slevel = Tournament::all();
    return view('saturdaytournament.slevel', compact('slevel'));
  }


  public function supdatelevel(Request $request, $id)
  {
    $level =DB::table('tournament')->find($id);
      if ($level == true) {
        return view('saturdaytournament.seditlevel', compact('level'));
      }else{
         return redirect('/slevelview');
      }
   }

  public function seditlevel(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $slevels = $request->input('editlevel');
    $sblinds = $request->input('editblinds');
    $stime  = (int)$request->input('editduration');
    $inseconds = ($stime*60);
    DB::update('update tournament set level = ?, blinds = ?, in_minutes = ?, in_seconds = ? where id = ?' ,[$slevels,$sblinds,$stime,$inseconds,$id]);

    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    
    }else{
    return redirect('/slevelview');
    }
  }

   public function spotmoneyview()
  {
    $spotprize = Prize::firstOrFail();
    return view('saturdaytournament.spotmoney', compact('spotprize'));
  } 

  public function supdatepotmoney(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $potmoney = $request->input('potmoney');
    DB::update('update prize set totalprize = ? where id = ?' ,[$potmoney,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }else{
    return redirect()->back();
    }
  }

 public function sprizemoneyview()
  {
    $prize = Prizemoney::all();
    return view('saturdaytournament.sprizemoney', compact('prize'));
  } 

  public function seditprizemoneyview(Request $request, $id)
  {
    $prize =DB::table('prizemoney')->find($id);
      if ($prize == true) {
        return view('saturdaytournament.seditprizemoney', compact('prize'));
      }else{
         return redirect('/sprizemoneyview');
      }
  }

   public function seditprizemoney(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $place = $request->input('place');
    $amount = $request->input('amount');
    DB::update('update prizemoney set place = ?, amount = ? where id = ?' ,[$place,$amount,$id]);

    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();

    }else{
    return redirect('/sprizemoneyview');
    }
  }

  public function sdeletepercent($id) {
      DB::delete('delete from prizemoney where id = ?',[$id]);
      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect()->back();
   }

  public function saddnewpercent()
  {
    return view('saturdaytournament.saddnewpercent');
  }

  public function saddpercent(Request $request)
  {
    if(isset($_POST['save']))
    {
        $place = $request->input('place');
        $amount = $request->input('amount');
        $data = array("place"=>$place,"amount"=>$amount);
        DB::table('prizemoney')->insert($data);

        session()->flash('status', 'New Percent has been Successfully Added.');
        return redirect()->back();

    }else{
      return redirect()->back();
    }
  }


}
