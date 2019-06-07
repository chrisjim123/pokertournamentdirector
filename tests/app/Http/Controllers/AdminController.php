  <?php



namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use Session;
 

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
     
}
    
 /*       public function adminhome()
    {

        $result =DB::table('masterfile')->paginate(3);
        return view('adminhome', ["data"=>$result]);
    }
*/

 


}





