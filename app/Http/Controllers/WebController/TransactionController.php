<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\ProdCategory;
use App\Models\ImgProduct;
use App\Models\User;
use App\Models\Address;
use App\Models\StockProduct;
use App\Models\Wishlist;
use App\Models\MstCompany;
use App\Models\UserMitra;
use App\Models\MstTransaction;
use App\Models\TransactionItem;
use App\Models\TransactionHistory;
use App\Models\Payment;        
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{

    public function __construct()
    {
        function gencompany($id){
            $company=MstCompany::find($id);
            return $company->company_name;
        }

        function getimage($id){
            $img=ImgProduct::where('product_id',$id)->first();
            return $img->img_file;
        }

        function getstatus($status){
           if ($status==0) {
               $statuspayment='Menunggu Pembayaran';
           } elseif($status==1) {
               $statuspayment='Diproses Penjual';
               
           }elseif($status==2) {
               $statuspayment='Sedang Dikirim';
               
           }elseif($status==3) {
               $statuspayment='Diterima';
           }

           return $statuspayment;
           
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $payment = Payment::with(['transaction','transactionitem'])->where('user_id', $profile->id)->orderBy('created_at','DESC')->get();
        $listpesanan=[];
        foreach ($payment as $key => $value) {
           $listpesanan[]=[
            "transaction_id"=> $value->transaction_id,
            "user_id"=> $value->user_id,
            "currency"=> $value->currency,
            "bank_code"=> $value->bank_code,
            "expected_ammount"=>'Rp '. number_format((float)$value->expected_ammount, 0, ',', '.'),
            "paid_at"=> $value->paid_at,
            "payment_chanel"=> $value->payment_chanel,
            "status"=> getstatus($value->status),
            "created_at"=> $value->created_at,
            "updated_at"=> $value->updated_at,
            "payment_method"=> $value->payment_method,
            "payment_picture"=> $value->payment_picture,
            "invoice_number"=> $value->transaction->invoice_number,
            "product_id"=> $value->transactionitem->product_id,
            "product_image"=> getimage($value->transactionitem->product_id),
            "product_name"=> $value->transactionitem->product_name,

           ];
        }

        $menunggupembayaran=[];
        $diprosespenjual=[];
        $sedangdikirim=[];
        $dikirim=[];

        // return $listpesanan;

        return view('frontEnd.transaction.transactionlist',['listpesanan'=>$listpesanan,'menunggupembayaran'=>$menunggupembayaran,'diprosespenjual'=>$diprosespenjual,'sedangdikirim'=>$sedangdikirim,'dikirim'=>$dikirim,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $payment = Payment::with(['transaction','transactionitem'])
                    ->where('user_id', $profile->id)
                    ->where('transaction_id', $id)
                    ->orderBy('created_at','DESC')
                    ->get();
        $listpesanan=[];
        foreach ($payment as $key => $value) {
           $listpesanan[]=[
            "transaction_id"=> $value->transaction_id,
            "user_id"=> $value->user_id,
            "currency"=> $value->currency,
            "bank_code"=> $value->bank_code,
            "expected_ammount"=>'Rp '. number_format((float)$value->expected_ammount, 0, ',', '.'),
            "paid_at"=> $value->paid_at,
            "payment_chanel"=> $value->payment_chanel,
            "status"=> getstatus($value->status),
            "created_at"=> $value->created_at,
            "updated_at"=> $value->updated_at,
            "payment_method"=> $value->payment_method,
            "payment_picture"=> $value->payment_picture,
            "invoice_number"=> $value->transaction->invoice_number,
            "product_id"=> $value->transactionitem->product_id,
            "product_image"=> getimage($value->transactionitem->product_id),
            "product_name"=> $value->transactionitem->product_name,

           ];
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
