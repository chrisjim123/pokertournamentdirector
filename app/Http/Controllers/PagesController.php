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
use Session;


//Daily Tournament Databases
use App\EBuyin;
use App\EverydayTournament;
use App\EverydayPrizeMoney;
use App\EverydayPrize;

//Saturday Tournament Databases
use App\Duration;
use App\Buyin;
use App\Tournament;
use App\Prizemoney;
use App\Prize;


class PagesController extends Controller
{


  protected $posts_per_page = 6;


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

  public function eplayersview()
  {

    $ebuyin = EBuyin::firstOrFail();
    return view('dailytournament.eplayers', compact('ebuyin'));
  }   
  public function ebuyinview()
  {
     $ebuyin = EBuyin::firstOrFail();
    return view('dailytournament.ebuyin', compact('ebuyin'));
  } 
  public function echipsview()
  {
    return view('dailytournament.echips');
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

  public function updatelevel(Request $request)
  {
    if(isset($_POST['updatelevel']))
    {
    $id = $_POST['updatelevel'];
    $elevels = $request->input('elevels');
    $eblinds = $request->input('eblinds');
    $etime  = (int)$request->input('etime');
    $inseconds = ($etime*60);
    DB::update('update everydaytournament set level = ?, blinds = ?, in_seconds = ? where id = ?' ,[$elevels,$eblinds,$inseconds,$id]);

    session()->flash('status', $elevels.'Record has been updated successfully.');
    return redirect()->back();
   }
    //return redirect()->back();
  }

 	public function dailytournament(Request $request)
 	{
    $posts = EverydayTournament::paginate($this->posts_per_page);
    $etournament = EverydayTournament::firstOrFail();
    $etournaments = EverydayTournament::all();
    $eprizemoney = EverydayPrizeMoney::all();
    $eprize = EverydayPrize::firstOrFail();
    $ebuyin = EBuyin::firstOrFail();

    $timertournament = DB::select("Select * from everydaytournament");

    return view('/dailytournament', compact(
      'etournaments',
      'etournament',
      'eprizemoney',
      'eprize',
      'posts',
      'ebuyin',
      'timertournament'
    ));
  }


  public function addplayer(Request $request)
  {
    $id = 101;
    $defbuyin = 150;
    $buyin = (int)$defbuyin;

    $ebuyin = EBuyin::firstOrFail();
    $eplayers = $ebuyin->etotalplayers;
    $tplayers = (int)$request->input('totalplayers');
    $totalplayers = ($eplayers+$tplayers);

    $totalchips = ($buyin*$totalplayers);
    $averagechips = ($totalchips/$totalplayers);

    DB::update('update ebuyin set etotalplayers = ?, ebuyinamount = ?, etotalchips = ?, eaveragechips = ? where id = ?' ,[$totalplayers,$buyin,$totalchips,$averagechips,$id]);

    $return['new_data'] = \App\EBuyin::findOrFail($id);
    echo json_encode($return);
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

     return redirect()->back();
  }

  public function rebuy(Request $request)
  {
    $id = 101;
    $defbuyin = 150;
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

    return redirect()->back();
  }

  public function saturdaytournament(Request $request)
  {
    
    $posts = Tournament::paginate($this->posts_per_page);
    $duration = Duration::firstOrFail();
    $firstTournament = Tournament::firstOrFail();
    $tournaments = Tournament::all();
    $prizemoney = Prizemoney::all();
    $prize = Prize::firstOrFail();

    $temp = explode('/', $firstTournament->blinds);
    $blindParts = [
      'big' => $temp[1],
      'small' => $temp[0]
    ];

    $allBlinds = [];
    foreach ($tournaments as $tournament) {
      $temp = explode('/', $tournament->blinds);
      $allBlinds[] = [
        'small' => (int)$temp[0],
        'big' => (int)$temp[1]
      ];  
    }

    return view('/saturdaytournament', compact(
      'prizemoney',
      'firstTournament', 
      'tournaments',
      'blindParts',
      'allBlinds',
      'duration',
      'prize',
      'posts'
    ));
  }

 public function fetchNextPostsSet($page) {

 }

   
 public function search(Request $request)
 {
 
   		$search = Input::get('search');
        if($search != ''){
        	$data = Masterfile::where('firstname', 'LIKE', '%'.$search.'%')
        					->orWhere('middlename', 'LIKE', '%'.$search.'%')
        					->orWhere('lastname', 'LIKE', '%'.$search.'%')
        					->paginate(3)
        					->setpath('');
            $data->appends(array('search' => Input::get('search'),));
			if(count($data)>0){
				return view('/home')->withData($data);
			}	
			return view('/home')->withMessage("No Results found!");
        }
       	else{
       		$result =DB::table('masterfile')->paginate(3);
        	return view('/home', ["data"=>$result]);
       	}
 	}

 	public function destroy($id) {
      DB::delete('delete from manpower where id = ?',[$id]);
      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect('/home');
   }


}
