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

//Daily Tournament Databases
use App\EBuyin;
use App\EChips;
use App\EverydayTournament;
use App\EverydayPrizeMoney;
use App\EverydayPrize;

//Saturday Tournament Databases
use App\Buyin;
use App\Chips;
use App\Tournament;
use App\Prizemoney;
use App\Prize;


class PagesController extends Controller
{

  public function logout(){
        Session::flush();
   /*     Auth::guard($this->getGuard())->logout();*/
    return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
  }
    
  public function welcome()
  {
    return view('welcome');
  } 

  public function tournament()
  {
    return view('tournament');
  } 



/*DAILY TOURNAMENT FUNCTIONS*/
  public function dailytournament(Request $request)
  {
    $timertournament = DB::select("Select * from everydaytournament");
    $eprizemoney = EverydayPrizeMoney::all();
    $eprize = EverydayPrize::firstOrFail();
    $ebuyin = EBuyin::firstOrFail();
    $echips = EChips::all();
    return view('/dailytournament', compact(
      'timertournament',
      'eprizemoney',
      'eprize',
      'ebuyin',
      'echips'
    ));
  }

   public function resetalletournament()
  {
    $id = 101;
    $etotalplayers = 0;
    $etotalbuyer = 0;
    $ebuyinamount = 0;
    $etotalchips = 0;
    $eaveragechips = 0;
    $eprize = 0;
    DB::update('update ebuyin set etotalplayers = ?, etotalbuyer = ?, ebuyinamount = ?, etotalchips = ?, eaveragechips =? where id = ?' ,[$etotalplayers,$etotalbuyer,$ebuyinamount,$etotalchips,$eaveragechips,$id]);
    DB::update('update everydayprize set totalprize = ? where id = ?' ,[$eprize,$id]);
    return redirect()->back();
  }  

  public function eplayersview()
  {
    $ebuyin = EBuyin::firstOrFail();
    return view('dailytournament.eplayers', compact('ebuyin'));
  }  

  public function updateplayer(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $ebuyin = EBuyin::firstOrFail();
    $defbuyin = $ebuyin->ebuyinamount;
    $buyin = (int)$defbuyin;
    $totalplayers = (int)$request->input('player');

    if($buyin != "")
    {
    if($totalplayers != 0)
    {
    $totalchips = ($buyin*$totalplayers);
    $averagechips = ($totalchips/$totalplayers);
    DB::update('update ebuyin set etotalplayers = ?, ebuyinamount = ?, etotalchips = ?, eaveragechips = ? where id = ?' ,[$totalplayers,$buyin,$totalchips,$averagechips,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }else{
    DB::update('update ebuyin set etotalplayers = ? where id = ?' ,[$totalplayers,$id]);
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

  public function ebuyinview()
  {
    $ebuyin = EBuyin::firstOrFail();
    return view('dailytournament.ebuyin', compact('ebuyin'));
  } 

  public function updatebuyin(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $buyin = $request->input('buyin');
    DB::update('update ebuyin set ebuyinamount = ? where id = ?' ,[$buyin,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }else{
    return redirect()->back();
    }
  }

  public function echipsview()
  {
    $echips = DB::select('SELECT * FROM echips');
    return view('dailytournament.echips', compact('echips'));
  } 
  public function elevelview()
  {
    $elevel = EverydayTournament::all();
    return view('dailytournament.elevel', compact('elevel'));
  } 
  public function epotmoneyview()
  {
    $epotprize = EverydayPrize::firstOrFail();
    return view('dailytournament.epotmoney', compact('epotprize'));
  } 

  public function updatepotmoney(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $potmoney = $request->input('potmoney');
    DB::update('update everydayprize set totalprize = ? where id = ?' ,[$potmoney,$id]);
    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    }else{
    return redirect()->back();
    }
  }

   public function prizemoneyview()
  {
    $prize = EverydayPrizeMoney::all();
    return view('dailytournament.prizemoney', compact('prize'));
  } 

  public function editprizemoneyview(Request $request, $id)
  {
    $prize =DB::table('eprizemoney')->find($id);
      if ($prize == true) {
        return view('dailytournament.editprizemoney', compact('prize'));
      }else{
         return redirect('/prizemoneyview');
      }
  }

   public function editprizemoney(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $place = $request->input('place');
    $amount = $request->input('amount');
    DB::update('update eprizemoney set place = ?, amount = ? where id = ?' ,[$place,$amount,$id]);

    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();

    }else{
    return redirect('/prizemoneyview');
    }
  }

  public function updatelevel(Request $request, $id)
  {
    $level =DB::table('everydaytournament')->find($id);
      if ($level == true) {
        return view('dailytournament.editlevel', compact('level'));
      }else{
         return redirect('/elevel');
      }
   }

  public function editlevel(Request $request, $id)
  {
    if(isset($_POST['update']))
    {
    $elevels = $request->input('editlevel');
    $eblinds = $request->input('editblinds');
    $etime  = (int)$request->input('editduration');
    $inseconds = ($etime*60);
    DB::update('update everydaytournament set level = ?, blinds = ?, in_seconds = ? where id = ?' ,[$elevels,$eblinds,$inseconds,$id]);

    session()->flash('status', 'Record has been updated successfully.');
    return redirect()->back();
    
    }else{
    return redirect('/elevelview');
    }
  }

  public function addnewpercent()
  {
    return view('dailytournament.addnewpercent');
  }

  public function addpercent(Request $request)
  {
    if(isset($_POST['save']))
    {
        $place = $request->input('place');
        $amount = $request->input('amount');
        $data = array("place"=>$place,"amount"=>$amount);
        DB::table('eprizemoney')->insert($data);

        session()->flash('status', 'New Percent has been Successfully Added.');
        return redirect()->back();

    }else{
      return redirect()->back();
    }
  }

  public function deletepercent($id) {
      DB::delete('delete from eprizemoney where id = ?',[$id]);
      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect()->back();
   }

  public function addnewchips()
  {
      return view('dailytournament.addnewchips');
  }

  public function uploadchips(Request $request){

     request()->validate([
            'chipvalue' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

    if(isset($_POST['save']))
    {
        $chipvalue = $request->input('chipvalue');

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $originalFile = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFile);
        $data = array("value"=>$chipvalue,"images"=>$originalFile);
        DB::table('echips')->insert($data);

        session()->flash('status', 'New Chips has been Successfully Added.');
        return redirect()->back(); 
    }else{
      return redirect('/echipsview');
    }
  }

public function updatechipsview(Request $request, $id){
  
  $chips =DB::table('echips')->find($id);
      if ($chips == true) {
        return view('dailytournament.updatechips', compact('chips'));
      }else{
         return redirect('/echipsview');
      }
}
 public function updatechips(Request $request, $id){

     request()->validate([
            'chipvalue' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

    if(isset($_POST['update']))
    {
        $chipvalue = $request->input('chipvalue');

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $originalFile = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFile);
        DB::update('update echips set value = ?, images = ? where id = ?' ,[$chipvalue,$originalFile,$id]);
        session()->flash('status', 'Chip updated Successfully.');
        return redirect()->back();
    
    }else{
      return redirect('/echipsview');
    }
 
 }

  public function delchips($id) {
      DB::delete('delete from echips where id = ?',[$id]);      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect()->back();
   }

  public function addplayer(Request $request)
  {
    $id = 101;
    $ebuyin = EBuyin::firstOrFail();
    $defbuyin = $ebuyin->ebuyinamount;

    $buyin = (int)$defbuyin;

    $ebuyin = EBuyin::firstOrFail();
    $eplayers = $ebuyin->etotalplayers;
    $tplayers = (int)$request->input('totalplayers');
    $totalplayers = ($eplayers+$tplayers);

    $totalchips = ($buyin*$totalplayers);
    $averagechips = ($totalchips/$totalplayers);

    DB::update('update ebuyin set etotalplayers = ?, ebuyinamount = ?, etotalchips = ?, eaveragechips = ? where id = ?' ,[$totalplayers,$buyin,$totalchips,$averagechips,$id]);

    $result = [
      'total' => number_format($totalplayers),
      'ave' => number_format($averagechips),
      'tchips' => number_format($totalchips)
    ];
    echo json_encode($result);

    exit;
  }

  public function minusplayer(Request $request)
  {
    $id = 101;
    $ebuyin = EBuyin::firstOrFail();
    $player = $ebuyin->etotalplayers;
    $totalchips = $ebuyin->etotalchips;

    $minusplayer = (int)$request->input('mplayers');
    $newtotalplayer = ($player-$minusplayer);

    $averagechips = ($totalchips/$newtotalplayer);

    DB::update('update ebuyin set etotalplayers = ?, eaveragechips = ? where id = ?' ,[$newtotalplayer,$averagechips,$id]);

    $result = [
      'total' => number_format($newtotalplayer),
      'ave' => number_format($averagechips),
      'tchips' => number_format($totalchips)
    ];

    echo json_encode($result);
    exit;
  }

  public function rebuy(Request $request)
  {
    $id = 101;
    $ebuyin = EBuyin::firstOrFail();
    $defbuyin = $ebuyin->ebuyinamount;
    $buyin = (int)$defbuyin;

    $ebuyin = EBuyin::firstOrFail();
    $erebuy = $ebuyin->etotalbuyer;
    $newrebuy = (int)$request->input('totalrebuys');
    $totalrebuys = ($erebuy+$newrebuy);

    $totalbuyin = ($buyin*$newrebuy);

    $eprize = EverydayPrize::firstOrFail();
    $tprize = $eprize->totalprize;
 
    $totalpotmoney = ($tprize+$totalbuyin);

    DB::update('update everydayprize set totalprize = ? where id = ?' ,[$totalpotmoney,$id]);

    $ebuyin = EBuyin::firstOrFail();
    $players = $ebuyin->etotalplayers;
    $tchips = $ebuyin->etotalchips;
    $tplayers = ($players+$totalrebuys);

    $totalchips = ($tchips+$totalbuyin);
    $averagechips = ($totalchips/$players);

    DB::update('update ebuyin set etotalbuyer = ?,  etotalchips = ?, eaveragechips = ? where id = ?' ,[$totalrebuys,$totalchips,$averagechips,$id]);

    $prizemoney = EverydayPrizeMoney::all();

    $percent1 = $prizemoney[0]->amount;
    $total101 = ($totalpotmoney*$percent1);

    $percent2 = $prizemoney[1]->amount;
    $total102 = ($totalpotmoney*$percent2);

    $percent3 = $prizemoney[2]->amount;
    $total103 = ($totalpotmoney*$percent3);

/*return results as json*/
    $result = [
      'total' => $totalrebuys,
      'ave' => number_format($averagechips),
      'tchips' => number_format($totalchips),
      'potmoney' => 'Php'.' '.number_format($totalpotmoney),
      'total101' => 'Php'.' '.number_format($total101),
      'total102' => 'Php'.' '.number_format($total102),
      'total103' => 'Php'.' '.number_format($total103)

    ];
    echo json_encode($result);
    exit;
  }
/*END DAILY TOURNAMENT FUNCTIONS*/




/*SATURDAY TOURNAMENT FUNCIONS*/
  public function saturdaytournament(Request $request)
  {
    $timertournament = DB::select("Select * from tournament");
    $prizemoney = PrizeMoney::all();
    $prize = Prize::firstOrFail();
    $buyin = Buyin::firstOrFail();
    $chips = Chips::all();
    return view('/saturdaytournament', compact(
      'timertournament',
      'prizemoney',
      'prize',
      'buyin',
      'chips'
    ));
  }
/*END SATURDAY TOURNAMENT FUNCTIONS*/


   
}
