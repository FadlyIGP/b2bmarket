<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\MstTransaction;
use App\Models\MstProduct;
use App\Models\TransactionItem;
use App\Models\UserMitra;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function index()
    {
        if (Auth::user()->role_id==1) {

            $date = date('Y-m-d');

            $transactions = MstTransaction::where('created_at', 'like', '%'.$date.'%')->get();
            $summ_transaction = $transactions->count();

            $products = MstProduct::whereNull('deleted_at')->get();
            $summ_product = $products->count();

            /*Count Notification*/
            $countnotif = MstTransaction::where('status', 0)->get();
            \Session::put('countnotif', $countnotif->count());

            $notif_list = MstTransaction::where('status', 0)
                ->join('mst_company', 'mst_company.id', '=', 'mst_transaction.company_id')
                ->get();

            \Session::put('notif_list', $notif_list);

            $usermitra = UserMitra::where('email', Auth::user()->email)->first();
            $username = $usermitra->name;

            \Session::put('username', $username);

            $curr_year = date('Y');
            
            /*Get Data For Chart*/
            /************* Transaction Success *************/
            $JAN_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 1)
                ->whereYear('created_at', $curr_year)
                ->get()->count();
            
            $FEB_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 2)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $MAR_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 3)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $APR_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 4)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $MAY_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 5)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $JUN_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 6)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $JUL_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 7)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $AUG_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 8)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $SEP_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 9)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $OCT_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 10)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $NOV_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 11)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $DES_finished = MstTransaction::where('status', 3)
                ->whereMonth('created_at', 12)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            /************** Cancel Transaction **************/
            $JAN_cancelled = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 1)
                ->whereYear('created_at', $curr_year)
                ->get()->count();
            
            $FEB_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 2)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $MAR_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 3)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $APR_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 4)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $MAY_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 5)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $JUN_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 6)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $JUL_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 7)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $AUG_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 8)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $SEP_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 9)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $OCT_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 10)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $NOV_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 11)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $DES_cancelled  = MstTransaction::where('status', 99)
                ->whereMonth('created_at', 12)
                ->whereYear('created_at', $curr_year)
                ->get()->count();

            $data_finished = [
                $JAN_finished,
                $FEB_finished,
                $MAR_finished,
                $APR_finished,
                $MAY_finished,
                $JUN_finished,
                $JUL_finished,
                $AUG_finished,
                $SEP_finished,
                $OCT_finished,
                $NOV_finished,
                $DES_finished
            ]; 

            $data_cancelled = [
                $JAN_cancelled,
                $FEB_cancelled,
                $MAR_cancelled,
                $APR_cancelled,
                $MAY_cancelled,
                $JUN_cancelled,
                $JUL_cancelled,
                $AUG_cancelled,
                $SEP_cancelled,
                $OCT_cancelled,
                $NOV_cancelled,
                $DES_cancelled
            ];    

            $data1 = json_encode($data_finished);
            $data2 = json_encode($data_cancelled);

            return view('home', ['summ_transaction' => $summ_transaction, 'summ_product' => $summ_product, 'data_finished' => $data1, 'data_cancelled' => $data2]);
        }
        return redirect()->route('firstpage');
    }
}
