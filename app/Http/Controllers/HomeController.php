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

            return view('home', ['summ_transaction' => $summ_transaction, 'summ_product' => $summ_product]);
        }
        return redirect()->route('firstpage');
    }
}
