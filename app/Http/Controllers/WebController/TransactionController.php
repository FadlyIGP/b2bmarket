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
use App\Models\MstRekening;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use File;


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
               $statuspayment='Waiting Payment';
           } elseif($status==1) {
               $statuspayment='In Process';
               
           }elseif($status==2) {
               $statuspayment='On Delivery';
               
           }elseif($status==3) {
               $statuspayment='Received';
           }elseif($status==99){
               $statuspayment='Cancle';
           }else{
               $statuspayment='Unknown';
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
        // return $payment;
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

        $paymentwaiting = Payment::with(['transaction','transactionitem'])
                  ->where('user_id', $profile->id)
                  ->where('status',0)
                  ->orderBy('created_at','DESC')->get();
        $menunggupembayaran=[];
        foreach ($paymentwaiting as $key => $value) {
           $menunggupembayaran[]=[
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

        $paymentproses = Payment::with(['transaction','transactionitem'])
                   ->where('user_id', $profile->id)
                   ->where('status', 1)
                   ->orderBy('created_at','DESC')->get();
        $diprosespenjual=[];
        foreach ($paymentproses as $key => $value) {
           $diprosespenjual[]=[
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

        // return $paymentproses;

        $paymenkirim = MstTransaction::with(['payment','item'])
                   ->where('user_id', $profile->id)
                   ->where('status', 2)
                   ->orderBy('created_at','DESC')->get();


        $sedangdikirim=[];
        foreach ($paymenkirim as $key => $value) {
           $sedangdikirim[]=[
            "transaction_id"=> $value->id,
            "user_id"=> $value->user_id,
            "expected_ammount"=>'Rp '. number_format((float)$value->expected_ammount, 0, ',', '.'),
            "currency"=> $value->payment->payment,
            "bank_code"=> $value->payment->bank_code,
            "paid_at"=> $value->payment->paid_at,
            "payment_chanel"=> $value->payment->payment_chanel,
            "status"=> getstatus($value->status),
            "created_at"=> $value->created_at,
            "updated_at"=> $value->updated_at,
            "payment_method"=> $value->payment->payment_method,
            "payment_picture"=> $value->payment->payment_picture,
            "invoice_number"=> $value->invoice_number,
            "product_id"=> $value->item[0]->product_id,
            "product_image"=> getimage($value->item[0]->product_id),
            "product_name"=> $value->item[0]->product_name,

           ];
        }

        $diterima = MstTransaction::with(['payment','item'])
                   ->where('user_id', $profile->id)
                   ->where('status', 3)
                   ->orderBy('created_at','DESC')->get();

        $dikirim=[];
        foreach ($diterima as $key => $value) {
           $dikirim[]=[
            "transaction_id"=> $value->id,
            "user_id"=> $value->user_id,
            "expected_ammount"=>'Rp '. number_format((float)$value->expected_ammount, 0, ',', '.'),
            "currency"=> $value->payment->payment,
            "bank_code"=> $value->payment->bank_code,
            "paid_at"=> $value->payment->paid_at,
            "payment_chanel"=> $value->payment->payment_chanel,
            "status"=> getstatus($value->status),
            "created_at"=> $value->created_at,
            "updated_at"=> $value->updated_at,
            "payment_method"=> $value->payment->payment_method,
            "payment_picture"=> $value->payment->payment_picture,
            "invoice_number"=> $value->invoice_number,
            "product_id"=> $value->item[0]->product_id,
            "product_image"=> getimage($value->item[0]->product_id),
            "product_name"=> $value->item[0]->product_name,

           ];
        }
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
        if ($request->hasFile('transfer_img')) {

           $image = $request->file('transfer_img');
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path('paymentpicture');
           $image->move($destinationPath, $image_name);
           $tr_image = Payment::where('transaction_id',$request->tr_id)->first();
           $tr_image->payment_picture = $image_name;
           $tr_image->status = 1;
           $tr_image->save();
          
        }else {
            Alert::error('Failed', 'Upload failed');
            return back();
        }

        if ($tr_image) {
            Alert::success('Success', 'Struk berhasil diupload, tunggu dichedk admin');
            return back();
        }
        else {
            Alert::error('Failed', 'Upload failed');
            return back();
        }

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
        $payment = MstTransaction::with(['item','payment'])
                    ->where('user_id', $profile->id)
                    ->where('id', $id)
                    ->orderBy('created_at','DESC')
                    ->first();
        if ($payment->payment_chanel=='tunai') {
             $getrek ='';
        } else {
            $getrek = MstRekening::where('company_id', $payment->company_id)->where('bank_code',$payment->payment->bank_code)
            ->first();
        }

       
        $listpesanan=[];
        foreach ($payment['item'] as $key => $value) {
           $listpesanan[]=[
            "transaction_id"=> $payment->id,
            "product_image"=> getimage($value->product_id),
            "product_name"=> $value->product_name,
            "product_qty"=>$value->product_qty,
            "price_total"=>'Rp '. number_format((float)$value->price_total, 0, ',', '.'),
           ];
        }

        $expected_ammount='Rp '. number_format((float)$payment->expected_ammount, 0, ',', '.');

        return view('frontEnd.transaction.transactiondetail', ['listpesanan' => $listpesanan,'payment'=>$payment,'getrek'=>$getrek,'expected_ammount'=>$expected_ammount]);       


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
        $date=Carbon::now()->format('Y-m-d H:i:s');
        $trasaction = MstTransaction::find($id);  
        $trasaction->status = 3;
        $create_trasaction=$trasaction->save();

        $trasactionitem = new TransactionHistory();  
        $trasactionitem->transaction_id = $id;
        $trasactionitem->status = 3;
        $trasactionitem->transaction_date = $date;
        $trasactionitem->save();

        if ($trasactionitem) {
            Alert::success('Success', 'Barang telah diterima');
            return back();
        }
        else {
            Alert::error('Failed', 'Gagal konfirm');
            return back();
        }
       
     
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
