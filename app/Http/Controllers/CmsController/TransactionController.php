<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\MstCompany;
use App\Models\MstTransaction;
use App\Models\TransactionItem;
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
        /* Automatic Cancel If H+1 From Order Date, Buyer No Payment */
        $neworder_list = MstTransaction::where('mst_transaction.status', 0)
            ->leftjoin('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
            ->get(['mst_transaction.id', 'payment.transaction_id as id_pay', 'mst_transaction.created_at']);

        $curr_date = date('Y-m-d H:m:s');
        
        foreach ($neworder_list as $key => $value) {
            $day_cancel = Carbon::create($value->created_at)->addDays(1);
            $auto_cancel_date = substr($day_cancel, 0, 10).' '.substr($day_cancel, 11, 8);

            if ($auto_cancel_date <= $curr_date AND $value->id_pay == null) {
                $mstTransaction = MstTransaction::find($value->id);
                $mstTransaction->status = 99;
                $mstTransaction->cancel_reason = '**No Payment After Day +1 Confirm Order**';
                $mstTransaction->save();
            }
        }
        /*End*/

        $transaction = MstTransaction::join('mst_company', 'mst_company.id', '=', 'mst_transaction.company_id')
            ->join('user_mitra', 'user_mitra.id', '=', 'mst_transaction.user_id')
            ->leftjoin('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
            ->get(['mst_transaction.id', 'mst_transaction.invoice_number', 'user_mitra.name', 'mst_company.company_name',
                'mst_transaction.status', 'mst_transaction.expected_ammount', 'mst_transaction.created_at', 'payment.id as id_payment']);       

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
        $msttransaction = MstTransaction::find($request->idtrans);
        $msttransaction->status = $request->radiostat;
        $msttransaction->save();        

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
                'payment.status', 'payment.expiration_date', 'user_mitra.email']);

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
            'buyer_email'       => $payment['email']
        ];
       
        return view('transaction.viewpayment', ['payment_list' => $payment_list]);       
    }

    public function payupdatestatus(Request $request)
    {        
        $payment = Payment::find($request->recidpay);
        $payment->status = 2; /*Success Payment*/
        $payment->save();       

        $msttransaction = MstTransaction::find($request->recidtrans);
        $msttransaction->status = 1; /*Proccessing*/
        $msttransaction->save();

        return redirect()->route('transaction.index')->with('success', 'Successfully Update Status To Success Payment.');
    } 

    public function statuscancel(Request $request)
    {        
        $payment = Payment::find($request->recidpay);
        $payment->status = 99; /*Cancelled Payment*/       
        $payment->save();

        $msttransaction = MstTransaction::find($request->recidtrans);
        $msttransaction->status = 99; /*Cancel Order*/
        $msttransaction->cancel_reason = $request->cancelreason;
        $msttransaction->save();

        return redirect()->route('transaction.index')->with('success', 'Successfully Update Status To Cancellation Payment & Order.');
    } 
}
