<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\MstTransaction;
use App\Models\MstProduct;

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
            $transactions = MstTransaction::all();
            $summ_transaction = $transactions->count();

            $products = MstProduct::whereNull('deleted_at')->get();
            $summ_product = $products->count();

            return view('home', ['summ_transaction' => $summ_transaction, 'summ_product' => $summ_product]);
        }
        return redirect()->route('home.buyer');
    }
}
