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
use App\Models\MstRekening;
use App\Models\Payment;
use App\Models\MstTransaction;
use App\Models\TransactionItem;
use App\Models\TransactionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
date_default_timezone_set('Asia/Jakarta');


class PaymentController extends Controller
{

    public function __construct()
    {
        function gencompany($id)
        {
            $company = MstCompany::find($id);
            return $company->company_name;
        }

        $this->monthyear = Carbon::now()->format('mY');
        $this->month = Carbon::now()->format('m');
        $this->year = Carbon::now()->format('Y');

        //**order_number formating**//
        $getmax = MstTransaction::select('invoice_number')
            ->whereMonth('created_at', $this->month)
            ->max("invoice_number");

        $invoice_number = [];
        if ($getmax == null) {
            $this->invoice_number = 'TRX' . '-' . $this->monthyear . '-' . '00001';
        } else {
            $getmax = MstTransaction::select('invoice_number')
                ->whereMonth('created_at', $this->month)
                ->max("invoice_number");
            $invoice_number = (int) substr($getmax, 11, 16);
            $invoice_number++;
            $this->invoice_number = 'TRX' . '-' . $this->monthyear . '-' . sprintf('%05s', $invoice_number);
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
        $address = Address::where('user_id', $profile->id)->where('primary_address', 1)->first();
        if ($address) {
            $completeaddress = $address->kelurahan . " " . $address->kecamatan . " " . $address->kabupaten . " " . $address->provinsi . " , " . $address->postcode;
        } else {
            $completeaddress = null;
        }

        $cartlistbyuserid = Cart::with('image', 'product')->where('user_id', $profile->id)->get();
        $chekedcart = Cart::with('product')->where('user_id', $profile->id)->where('status', 1)->get();

        if (count($chekedcart)==0) {
            $getrek=[];
        } else {
            $getrek = MstRekening::where('mst_rekening.company_id', $chekedcart[0]->company_id)
            ->join('bank_code', 'bank_code.bank_code', '=', 'mst_rekening.bank_code')
            ->get();
        }       

        $totalcheked = [];
        $listchecked = [];
        $qty_total=[];
        foreach ($chekedcart as $key => $value) {
            $totalcheked[] = $value->total_price;
            $qty_total[] = $value->product_qty;

            $listchecked[] = [
                'id' => $value->id,
                'product_id' => $value->product_id,
                'product_qty' => $value->product_qty,
                'product_price' => number_format((float)$value->product_price, 0, ',', '.'),
                'total_price' => 'Rp' . " " . number_format((float)$value->total_price, 0, ',', '.'),
                'status' => $value->status,
                'user_id' => $value->user_id,
                'product_name' => $value->product->product_name,
                'product_descriptions' => $value->product->product_descriptions,
                'product_image' => $value->image[0]->img_file,
                'product_size' => $value->product->product_size,
            ];
        }

        $total_price = number_format((float)array_sum($totalcheked), 0, ',', '.');
        $total_bayar = array_sum($totalcheked);
        $countqty = array_sum($qty_total);

        return view('frontEnd.payment.payment', ['total_bayar'=>$total_bayar,'total_price' => $total_price, 'listchecked' => $listchecked, 'completeaddress' => $completeaddress, 'address' => $address, 'countqty' => $countqty, 'getrek' => $getrek]);
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
        $date=Carbon::now()->format('Y-m-d H:i:s');
        $expired = Carbon::now()->addHours(2);
        $expired_date=Carbon::parse($expired)->format('Y-m-d H:i:s');


        $validator = Validator::make($request->all(), [
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            $out = [
            "message" => $validator->messages()->all(),
            ];
            return response()->json($out, 422);
        }

        if ($request->payment_method=='tunai') {
            $bank_code='';
        } else {
            $bank_code=$request->bank_code;
        }
      
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $company = MstCompany::where('id', $profile->company_id)->first();
        $address = Address::where('user_id', $profile->id)->where('primary_address', 1)->first();
        $chekedcart = Cart::with('product','image')->where('user_id', $profile->id)->where('status', 1)->get();
        $chekedcart_list = Cart::with('product','image')->where('user_id', $profile->id)->where('status', 1)->first();
        
        $get_seller_id = $chekedcart_list->company_id;

        $trasaction = new MstTransaction();  
        $trasaction->invoice_number = $this->invoice_number;
        // $trasaction->payment_chanel = $request->payment_method;
        $trasaction->user_id = $profile->id; 
        // $trasaction->company_id = $chekedcart[0]->company_id;  
        $trasaction->company_id = $company->id;
        $trasaction->seller_company_id = $get_seller_id;
        $trasaction->invoice_number = $this->invoice_number;
        $trasaction->status = 0;
        $trasaction->address_id = $address->id;
        $trasaction->expected_ammount = $request->ammount;
        $create_trasaction=$trasaction->save();
       
        $payment = new Payment();  
        $payment->external_id = " ";
        $payment->transaction_id = $trasaction->id;
        $payment->name = Auth::user()->name;
        $payment->email = Auth::user()->email;
        $payment->user_id = $profile->id;
        $payment->status = 0; 
        $payment->currency = "IDR";  
        $payment->bank_code = $bank_code;  
        $payment->payment_chanel = $request->payment_method;  
        $payment->expected_ammount = $request->ammount;
        $payment->payment_method = $request->payment_method;  
        $payment->account_number = "";  
        $payment->expiration_date = $expired_date; 
        $payment->save();

        foreach ($chekedcart as $key => $value) {
            $dataitems[]=[
                "transaction_id"=>$trasaction->id,
                "product_id"=>$value->product_id,
                "product_name"=>$value->product->product_name,
                "product_image"=>$value->image[0]->picture_1,
                "product_price"=>$value->product->product_price,
                "product_item"=>$value->product->product_item,
                "product_qty"=>$value->product_qty,
                "price_total"=>$value->total_price,
                "product_size"=>$value->product->product_size,
            ];
        }

        foreach ($dataitems as $key => $value) {
           TransactionItem::create($value);

           /*Update Stock Product*/
           $StockProduct = StockProduct::where('product_id', $value['product_id'])->first();
           $StockProduct->qty = $StockProduct->qty - $value['product_qty'];
           $StockProduct->save();
        }

        $trasactionitem = new TransactionHistory();  
        $trasactionitem->transaction_id = $trasaction->id;
        $trasactionitem->status = 0;
        $trasactionitem->transaction_date = $date;
        $trasactionitem->save();
        $cart = Cart::where('user_id', $profile->id)->where('status', 1)->delete();

        if ($trasactionitem) {
            Alert::success('Success', 'Success create new orders');
            return back();
        }
        else {
            Alert::error('Failed', 'Orders failed');
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

    public function checkpaymentexpired()
    {
       $date=Carbon::now()->format('Y-m-d H:i:s');
       $expired = Carbon::now()->addHours(2)->format('Y-m-d H:i:s');

       $get = Payment::where('expiration_date','<=',$date)->where('status', 0)->first();
       if ($get) {
            $gettrbyid=MstTransaction::find($get->transaction_id);
            if ($gettrbyid) {
                $trasactionitem = new TransactionHistory();  
                $trasactionitem->transaction_id = $gettrbyid->id;
                $trasactionitem->status = 99;
                $trasactionitem->transaction_date = $date;
                $trasactionitem->save();

                $gettrbyid->status=99;
                $gettrbyid->save();

                $get->status=99;
                $get->save();

            } 
       } 
       
       return $get;

    }
}
