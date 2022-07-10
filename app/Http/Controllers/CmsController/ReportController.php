<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\MstCompany;
use App\Models\MstTransaction;
use App\Models\TransactionItem;
use App\Models\UserMitra;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function transactionjournallist()
    {
        $from_date = date('m/01/Y');
        $to_date = date('m/d/Y');        

        return view('report.rpt_transactionjournal', ['from_date' => $from_date, 'to_date' => $to_date]);
    }    


    public function loadjournallist(Request $request)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $fromdate = date('Y-m-d', strtotime($request->fromdate));
        $todate = date('Y-m-d', strtotime($request->todate));
        $input_status = $request->status;

        // return $fromdate;
        if ($input_status == 'ALL') {
            $get_journal = TransactionItem::join('mst_transaction', 'mst_transaction.id', '=', 'transaction_item.transaction_id')
                ->where('mst_transaction.seller_company_id', $profile->company_id)
                // ->join('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
                ->get([
                    'transaction_item.created_at as created_date', 
                    'mst_transaction.invoice_number', 
                    'mst_transaction.status as trans_status',
                    'transaction_item.product_name', 
                    'transaction_item.product_price', 
                    'transaction_item.product_qty',
                    'transaction_item.price_total'
                ]);                                        

            $tot_qty = 0;
            $count_total = 0;

            $journal_list = [];
            foreach ($get_journal as $key => $value) {

                if ($value->trans_status == 0) {
                    $status = 'New Order';
                }else if ($value->trans_status == 1) {
                    $status = 'Processing';
                }else if ($value->trans_status == 2) {
                    $status = 'On Delivery';
                }else if ($value->trans_status == 3) {
                    $status = 'Finished';
                }                                             

                $created_date = substr($value->created_date, 0, 10);                
                if ($created_date >= $fromdate AND $created_date <= $todate AND $value->trans_status != 99) {
                    
                    $tot_qty = $tot_qty + $value->product_qty;
                    $count_total = $count_total + $value->price_total;

                    $journal_list[] = [
                        "date"          => $created_date,
                        "invoice"       => $value->invoice_number,
                        "status_trans"  => $status, 
                        "product"       => $value->product_name,
                        "price"         => 'Rp '.number_format($value->product_price),                
                        "qty"           => $value->product_qty,  
                        "total"         => 'Rp '.number_format($value->price_total),
                        'time'          => substr($value->created_date, 11)               
                    ];   
                }                     
            }     

            $grand_total = 'Rp '.number_format($count_total);
            return view('report.rpt_journallist', ['journal_list' => $journal_list, 'tot_qty' => $tot_qty, 'grand_total' => $grand_total]);
        }else {
            $get_journal = TransactionItem::join('mst_transaction', 'mst_transaction.id', '=', 'transaction_item.transaction_id')
                ->where('mst_transaction.seller_company_id', $profile->company_id)
                // ->join('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
                ->get([
                    'transaction_item.created_at as created_date', 
                    'mst_transaction.invoice_number', 
                    'mst_transaction.status as trans_status',
                    'transaction_item.product_name', 
                    'transaction_item.product_price', 
                    'transaction_item.product_qty',
                    'transaction_item.price_total'
                ]);                                        

            $tot_qty = 0;
            $count_total = 0;

            $journal_list = [];
            foreach ($get_journal as $key => $value) {

                if ($value->trans_status == 0) {
                    $status = 'New Order';
                }else if ($value->trans_status == 1) {
                    $status = 'Processing';
                }else if ($value->trans_status == 2) {
                    $status = 'On Delivery';
                }else if ($value->trans_status == 3) {
                    $status = 'Finished';
                }                                             

                $created_date = substr($value->created_date, 0, 10);                
                if ($created_date >= $fromdate AND $created_date <= $todate AND $value->trans_status == $input_status) {
                    
                    $tot_qty = $tot_qty + $value->product_qty;
                    $count_total = $count_total + $value->price_total;

                    $journal_list[] = [
                        "date"          => $created_date,
                        "invoice"       => $value->invoice_number,
                        "status_trans"  => $status, 
                        "product"       => $value->product_name,
                        "price"         => 'Rp '.number_format($value->product_price),                
                        "qty"           => $value->product_qty,  
                        "total"         => 'Rp '.number_format($value->price_total),
                        'time'          => substr($value->created_date, 11)               
                    ];   
                }                     
            }     

            $grand_total = 'Rp '.number_format($count_total);
            return view('report.rpt_journallist', ['journal_list' => $journal_list, 'tot_qty' => $tot_qty, 'grand_total' => $grand_total]);
        }
    }

    public function cancellationjournal()
    {
        $from_date = date('m/01/Y');
        $to_date = date('m/d/Y');        

        return view('report.rpt_cancellationjournal', ['from_date' => $from_date, 'to_date' => $to_date]);
    }

    public function loadcancellationjournal(Request $request)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $fromdate = date('Y-m-d', strtotime($request->fromdate));
        $todate = date('Y-m-d', strtotime($request->todate));   

        $get_journal = TransactionItem::join('mst_transaction', 'mst_transaction.id', '=', 'transaction_item.transaction_id')
            ->where('mst_transaction.seller_company_id', $profile->company_id)
            // ->join('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
            ->get([
                'transaction_item.created_at as created_date', 
                'mst_transaction.invoice_number', 
                'mst_transaction.status as trans_status',
                'transaction_item.product_name', 
                'transaction_item.product_price', 
                'transaction_item.product_qty',
                'transaction_item.price_total',
                'mst_transaction.cancel_reason'
            ]);                                        

        $tot_qty = 0;
        $count_total = 0;

        $journal_list = [];
        foreach ($get_journal as $key => $value) {

            if ($value->trans_status == 99) {
                $status = 'Cancel Order';                                          
            }
            
            $created_date = substr($value->created_date, 0, 10);                
            if ($created_date >= $fromdate AND $created_date <= $todate AND $value->trans_status == 99) {
                
                $tot_qty = $tot_qty + $value->product_qty;
                $count_total = $count_total + $value->price_total;

                $journal_list[] = [
                    "date"          => $created_date,
                    "invoice"       => $value->invoice_number,
                    "status_trans"  => $status, 
                    "product"       => $value->product_name,
                    "price"         => 'Rp '.number_format($value->product_price),                
                    "qty"           => $value->product_qty,  
                    "total"         => 'Rp '.number_format($value->price_total),
                    'time'          => substr($value->created_date, 11),
                    'reason'        => $value->cancel_reason               
                ];   
            }                     
        }     

        $grand_total = 'Rp '.number_format($count_total);
        return view('report.rpt_cancellationlist', ['journal_list' => $journal_list, 'tot_qty' => $tot_qty, 'grand_total' => $grand_total]);
    }

    /* Print Transaction Journal*/
    public function transactionprint(Request $request)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $fromdate = date('Y-m-d', strtotime($request->from_date));
        $todate = date('Y-m-d', strtotime($request->to_date));
        $input_status = $request->status;

        $f_date = date('d/m/Y', strtotime($request->from_date));
        $t_date = date('d/m/Y', strtotime($request->to_date));

        if ($input_status == 'ALL') {
            $get_journal = TransactionItem::join('mst_transaction', 'mst_transaction.id', '=', 'transaction_item.transaction_id')
                ->where('mst_transaction.seller_company_id', $profile->company_id)
                // ->join('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
                ->get([
                    'transaction_item.created_at as created_date', 
                    'mst_transaction.invoice_number', 
                    'mst_transaction.status as trans_status',
                    'transaction_item.product_name', 
                    'transaction_item.product_price', 
                    'transaction_item.product_qty',
                    'transaction_item.price_total'
                ]);                                        

            $tot_qty = 0;
            $count_total = 0;

            $journal_list = [];
            foreach ($get_journal as $key => $value) {

                if ($value->trans_status == 0) {
                    $status = 'New Order';
                }else if ($value->trans_status == 1) {
                    $status = 'Processing';
                }else if ($value->trans_status == 2) {
                    $status = 'On Delivery';
                }else if ($value->trans_status == 3) {
                    $status = 'Finished';
                }                                             

                $created_date = substr($value->created_date, 0, 10);                
                if ($created_date >= $fromdate AND $created_date <= $todate AND $value->trans_status != 99) {
                    
                    $tot_qty = $tot_qty + $value->product_qty;
                    $count_total = $count_total + $value->price_total;

                    $journal_list[] = [
                        "date"          => $created_date,
                        "invoice"       => $value->invoice_number,
                        "status_trans"  => $status, 
                        "product"       => $value->product_name,
                        "price"         => 'Rp '.number_format($value->product_price),                
                        "qty"           => $value->product_qty,  
                        "total"         => 'Rp '.number_format($value->price_total),
                        'time'          => substr($value->created_date, 11)               
                    ];   
                }                     
            }                 

            $grand_total = 'Rp '.number_format($count_total);
            return view('report.print_transactionjournal', ['journal_list' => $journal_list, 'tot_qty' => $tot_qty, 'grand_total' => $grand_total, 'from_date' => $f_date, 'to_date' => $t_date, 'status' => 'ALL']);
        }else {
            $get_journal = TransactionItem::join('mst_transaction', 'mst_transaction.id', '=', 'transaction_item.transaction_id')
                ->where('mst_transaction.seller_company_id', $profile->company_id)
                // ->join('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
                ->get([
                    'transaction_item.created_at as created_date', 
                    'mst_transaction.invoice_number', 
                    'mst_transaction.status as trans_status',
                    'transaction_item.product_name', 
                    'transaction_item.product_price', 
                    'transaction_item.product_qty',
                    'transaction_item.price_total'
                ]);                                        

            $tot_qty = 0;
            $count_total = 0;

            $journal_list = [];
            foreach ($get_journal as $key => $value) {

                if ($value->trans_status == 0) {
                    $status = 'New Order';
                }else if ($value->trans_status == 1) {
                    $status = 'Processing';
                }else if ($value->trans_status == 2) {
                    $status = 'On Delivery';
                }else if ($value->trans_status == 3) {
                    $status = 'Finished';
                }                                             

                $created_date = substr($value->created_date, 0, 10);                
                if ($created_date >= $fromdate AND $created_date <= $todate AND $value->trans_status == $input_status) {
                    
                    $tot_qty = $tot_qty + $value->product_qty;
                    $count_total = $count_total + $value->price_total;

                    $journal_list[] = [
                        "date"          => $created_date,
                        "invoice"       => $value->invoice_number,
                        "status_trans"  => $status, 
                        "product"       => $value->product_name,
                        "price"         => 'Rp '.number_format($value->product_price),                
                        "qty"           => $value->product_qty,  
                        "total"         => 'Rp '.number_format($value->price_total),
                        'time'          => substr($value->created_date, 11)               
                    ];   
                }                     
            }     

            $grand_total = 'Rp '.number_format($count_total);
            return view('report.print_transactionjournal', ['journal_list' => $journal_list, 'tot_qty' => $tot_qty, 'grand_total' => $grand_total, 'from_date' => $f_date, 'to_date' => $t_date, 'status' => $status]);
        }
    }

    /* Print Cancellation Journal */
    public function cancellationprint(Request $request)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        
        $fromdate = date('Y-m-d', strtotime($request->from_date));
        $todate = date('Y-m-d', strtotime($request->to_date)); 

        $f_date = date('d/m/Y', strtotime($request->from_date));
        $t_date = date('d/m/Y', strtotime($request->to_date));

        $get_journal = TransactionItem::join('mst_transaction', 'mst_transaction.id', '=', 'transaction_item.transaction_id')
            ->where('mst_transaction.seller_company_id', $profile->company_id)
            // ->join('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
            ->get([
                'transaction_item.created_at as created_date', 
                'mst_transaction.invoice_number', 
                'mst_transaction.status as trans_status',
                'transaction_item.product_name', 
                'transaction_item.product_price', 
                'transaction_item.product_qty',
                'transaction_item.price_total',
                'mst_transaction.cancel_reason'
            ]);                                        

        $tot_qty = 0;
        $count_total = 0;

        $print_list = [];
        foreach ($get_journal as $key => $value) {

            if ($value->trans_status == 99) {
                $status = 'Cancel Order';                                          
            }
            
            $created_date = substr($value->created_date, 0, 10);                
            if ($created_date >= $fromdate AND $created_date <= $todate AND $value->trans_status == 99) {
                
                $tot_qty = $tot_qty + $value->product_qty;
                $count_total = $count_total + $value->price_total;

                $print_list[] = [
                    "date"          => $created_date,
                    "invoice"       => $value->invoice_number,
                    "status_trans"  => $status, 
                    "product"       => $value->product_name,
                    "price"         => 'Rp '.number_format($value->product_price),                
                    "qty"           => $value->product_qty,  
                    "total"         => 'Rp '.number_format($value->price_total),
                    'time'          => substr($value->created_date, 11),
                    'reason'        => $value->cancel_reason               
                ];   
            }                     
        }     

        $grand_total = 'Rp '.number_format($count_total);
        
        return view('report.print_cancellationjournal', ['print_list' => $print_list, 'from_date' => $f_date, 'to_date' => $t_date]);
    }
}
