<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\MstCompany;
use App\Models\MstTransaction;
use App\Models\StockProduct;
use App\Models\TransactionItem;
use App\Models\TransactionHistory;
use App\Models\UserMitra;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        
        /* Automatic Cancel If H+1 From Order Date, Buyer No Payment => Move to app/console/kernel.php*/
        // $neworder_list = MstTransaction::where('mst_transaction.status', 0)
        //     ->leftjoin('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
        //     ->get(['mst_transaction.id', 'payment.transaction_id as id_pay', 
        //         'mst_transaction.created_at', 'payment.status as pay_status']);

        // $curr_date = date('Y-m-d H:m:s');
        
        // foreach ($neworder_list as $key => $value) {
        //     $day_cancel = Carbon::create($value->created_at)->addDays(1);
        //     $auto_cancel_date = substr($day_cancel, 0, 10).' '.substr($day_cancel, 11, 8);

        //     if ($auto_cancel_date < $curr_date AND /*$value->id_pay == null*/ $value->pay_status == 0) {
        //         $mstTransaction = MstTransaction::find($value->id);
        //         $mstTransaction->status = 99;
        //         $mstTransaction->cancel_reason = '**No Payment After Day +1 Confirm Order**';
        //         $mstTransaction->save();
        //     }
        // }
        /*End*/
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $transaction = MstTransaction::select('mst_transaction.id', 'mst_transaction.invoice_number', 'user_mitra.name', 'mst_company.company_name', 'mst_transaction.status', 'mst_transaction.expected_ammount', 'mst_transaction.created_at', 'payment.id as id_payment')
            ->join('mst_company', 'mst_company.id', '=', 'mst_transaction.company_id')
            ->join('user_mitra', 'user_mitra.id', '=', 'mst_transaction.user_id')
            ->leftjoin('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
            ->where('mst_transaction.seller_company_id', $profile->company_id)
            ->get();       

        $transactionlist = [];
        foreach ($transaction as $key => $value) {

            if ($value->status == 0) {
                $status = 'New Order';
            }else if ($value->status == 1) {
                $status = 'Processing';
            }else if ($value->status == 2) {
                $status = 'On Delivery';
            }else if ($value->status == 3) {
                $status = 'Finished';
            }else if ($value->status == 99) {
                $status = 'Cancel Order';
            }

            if ($value->id_payment == null){
                $id_pay = -1;
            }else {
                $id_pay = $value->id_payment;
            }

            $transactionlist[] = [
                "id"        => $value->id,
                "invoice"   => $value->invoice_number,
                "username"  => $value->name,
                "company"   => $value->company_name,
                "status"    => $status,                
                "amount"    => 'Rp '.''.number_format($value->expected_ammount),               
                "created"   => $value->created_at,
                'time'      => substr($value->created_at, 11) ,
                'id_pay'    => $id_pay              
            ];
        }        

        return view('transaction.transaction', ['transactionlist' => $transactionlist]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        //
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


    /******************** For New Public Function At Here ********************/
    public function viewitem(Request $request, $id)
    {
        $transaction_item = TransactionItem::where('transaction_id', $id)->get();

        return view('transaction.showitem', ['transaction_item' => $transaction_item]);       
    }

    public function updatestatus(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta'); 

        $msttransaction = MstTransaction::find($request->idtrans);
        $msttransaction->status = $request->radiostat;
        $msttransaction->save();        

        $TransactionHist = new TransactionHistory;
        $TransactionHist->transaction_id    = $request->idtrans;
        $TransactionHist->transaction_date  = date("Y-m-d H:m:s");
        $TransactionHist->status            = 2;
        $TransactionHist->save();

        return redirect()->route('transaction.index')->with('success', 'Successfully Update Status.');
    }    

    public function viewpayment(Request $request, $id)
    {
        $payment = Payment::where('payment.transaction_id', $id)
            ->join('mst_transaction', 'mst_transaction.id', '=', 'payment.transaction_id')
            ->join('user_mitra', 'user_mitra.id', '=', 'payment.user_id')
            ->join('mst_company', 'mst_company.id', '=', 'user_mitra.company_id')
            ->first(['payment.id', 'payment.transaction_id', 'mst_transaction.invoice_number',
                'user_mitra.name', 'mst_company.company_name', 'user_mitra.phone', 
                'user_mitra.tel_number', 'payment.payment_method', 'payment.payment_picture',
                'payment.bank_code', 'payment.account_number', 'payment.expected_ammount', 
                'payment.paid_at', 'payment.created_at', 'payment.currency', 
                'payment.status', 'payment.expiration_date', 'user_mitra.email',
                'mst_transaction.status as trans_status']);

        if ($payment['status'] == 0){
            $status = 'Waiting Payment';
        }else if ($payment['status'] == 1){
            $status = 'Payment Check';
        }else if ($payment['status'] == 2){
            $status = 'Success Payment';
        }else if ($payment['status'] == 99){
            $status = 'Cancelled Payment';
        }

        $payment_list = [
            'id'                => $payment['id'],
            'transaction_id'    => $payment['transaction_id'],
            'invoice'           => $payment['invoice_number'],
            'buyer_name'        => $payment['name'],
            'company'           => $payment['company_name'],
            'phone'             => $payment['phone'],
            'tel_number'        => $payment['tel_number'],
            'payment_method'    => $payment['payment_method'],
            'payment_picture'   => $payment['payment_picture'],
            'bank_code'         => $payment['bank_code'],
            'account_number'    => $payment['account_number'],
            'amount'            => number_format($payment['expected_ammount']),
            'paid_at'           => $payment['paid_at'],
            'created_at'        => $payment['created_at'],
            'currency'          => $payment['currency'],
            'status'            => $status,
            'expiration_date'   => $payment['expiration_date'],
            'buyer_email'       => $payment['email'],
            'trans_status'      => $payment->trans_status
        ];
       
        return view('transaction.viewpayment', ['payment_list' => $payment_list]);       
    }

    public function payupdatestatus(Request $request)
    {        
        date_default_timezone_set('Asia/Jakarta'); 

        if ($request->methodpay == 'transfer') {
            $payment = Payment::find($request->recidpay);
            $payment->status = 2; /*Success Payment*/
            $payment->save();       

            $msttransaction = MstTransaction::find($request->recidtrans);
            $msttransaction->status = 1; /*Proccessing*/
            $msttransaction->save();

            $TransactionHist = new TransactionHistory;
            $TransactionHist->transaction_id    = $request->recidtrans;
            $TransactionHist->transaction_date  = date("Y-m-d H:m:s");
            $TransactionHist->status            = 1;
            $TransactionHist->save();

            return redirect()->route('transaction.index')->with('success', 'Successfully Update Status To Success Payment.');
        }else if ($request->methodpay == 'tunai') {            
            $msttransaction = MstTransaction::find($request->recidtrans);

            if ($msttransaction->status == 2) {
                $payment = Payment::find($request->recidpay);
                $payment->status    = 2; /*Success Payment*/
                $payment->paid_at   = date("Y-m-d H:m:s");
                $payment->save();     

                $msttransaction->status = 3; /*Finished*/
                $msttransaction->save();

                $TransactionHist = new TransactionHistory;
                $TransactionHist->transaction_id    = $request->recidtrans;
                $TransactionHist->transaction_date  = date("Y-m-d H:m:s");
                $TransactionHist->status            = 3;
                $TransactionHist->save();
            }else{
                $msttransaction->status = 1; /*Proccessing*/
                $msttransaction->save();

                $TransactionHist = new TransactionHistory;
                $TransactionHist->transaction_id    = $request->recidtrans;
                $TransactionHist->transaction_date  = date("Y-m-d H:m:s");
                $TransactionHist->status            = 1;
                $TransactionHist->save();
            }            
           
            return redirect()->route('transaction.index')->with('success', 'Successfully Update Status To Proccessing Order.');
        }
        
    } 

    public function statuscancel(Request $request)
    {        
        date_default_timezone_set('Asia/Jakarta'); 
        
        $payment = Payment::find($request->recidpay);
        $payment->status = 99; /*Cancelled Payment*/       
        $payment->save();

        $msttransaction = MstTransaction::find($request->recidtrans);
        $msttransaction->status = 99; /*Cancel Order*/
        $msttransaction->cancel_reason = $request->cancelreason;
        $msttransaction->save();

        $TransactionItem = TransactionItem::where('transaction_id', $request->recidtrans)->get();

        foreach ($TransactionItem as $key => $value) {
            /*Update Stock Product*/
           $StockProduct = StockProduct::where('product_id', $value->product_id)->first();
           $StockProduct->qty = $StockProduct->qty + $value->product_qty;
           $StockProduct->save();
        }

        $TransactionHist = new TransactionHistory;
        $TransactionHist->transaction_id    = $request->recidtrans;
        $TransactionHist->transaction_date  = date("Y-m-d H:m:s");
        $TransactionHist->status            = 99;
        $TransactionHist->save();

        return redirect()->route('transaction.index')->with('success', 'Successfully Update Status To Cancellation Payment & Order.');
    } 

    public function printinvoice($id){
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $company_list = MstCompany::find($profile->company_id);
        $company_name = $company_list->company_name;

        $transaction = MstTransaction::where('mst_transaction.id', $id)
            ->join('mst_company', 'mst_company.id', '=', 'mst_transaction.company_id')
            ->join('mst_address', 'mst_address.id', '=', 'mst_transaction.address_id')
            ->leftjoin('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
            ->get(['mst_transaction.id', 'mst_transaction.invoice_number', 'mst_transaction.expected_ammount', 'mst_transaction.created_at', 
                'payment.id as id_payment', 'payment.status as pay_status', 'payment.payment_method', 'payment.paid_at',
                'mst_company.company_name', 'mst_address.complete_address', 'mst_address.contact', 'mst_address.postcode', 'mst_address.patokan']);

        $totqty     = 0;
        $gtotal     = 0;  
        $countprice = 0;      
        $counter    = 1;

        $item_list = TransactionItem::where('transaction_id', $id)->get();            
        $transaction_item = [];
        foreach ($item_list as $key => $value) {   
            $totqty = $totqty + $value->product_qty;
            $countprice = $countprice + $value->price_total;

            $transaction_item[] = [
                "no"            => $counter++,
                "product_name"  => $value->product_name,
                "product_price" => $value->product_price,
                "product_qty"   => $value->product_qty,
                "product_item"  => $value->product_item,
                "price_total"   => $value->price_total
            ];
        }

        $gtotal = 'Rp '.number_format($countprice);

        return view('transaction.printinvoice', ['transactionlist' => $transaction, 'company' => $company_name, 'transaction_item' => $transaction_item, 'gtotal' => $gtotal, 'totqty' => $totqty]);
    }
}
