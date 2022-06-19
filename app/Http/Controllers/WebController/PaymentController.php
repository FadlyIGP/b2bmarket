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
use Illuminate\Support\Facades\Session;

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
        $getmax = MstTransaction::select('order_number')
            ->whereMonth('created_at', $this->month)
            ->max("order_number");

        $order_number = [];
        if ($getmax == null) {
            $this->order_number = 'TRX' . '-' . $this->monthyear . '-' . '00001';
        } else {
            $getmax = MstTransaction::select('invoice_number')
                ->whereMonth('created_at', $this->month)
                ->max("invoice_number");
            $order_number = (int) substr($getmax, 11, 16);
            $order_number++;
            $this->order_number = 'TRX' . '-' . $this->monthyear . '-' . sprintf('%05s', $order_number);
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
        $getrek = MstRekening::where('company_id', $chekedcart[0]->company_id)
            ->join('bank_code', 'bank_code.bank_code', '=', 'mst_rekening.bank_code')
            ->get();
        // return $getrek;

        $totalcheked = [];
        $listchecked = [];
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
        $countqty = array_sum($qty_total);


        return view('frontEnd.payment.payment', ['total_price' => $total_price, 'listchecked' => $listchecked, 'completeaddress' => $completeaddress, 'address' => $address, 'countqty' => $countqty, 'getrek' => $getrek]);
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
        // return $request->all();
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $address = Address::where('user_id', $profile->id)->where('primary_address', 1)->first();
        $chekedcart = Cart::with('product')->where('user_id', $profile->id)->where('status', 1)->get();
        // $this->order_number
        return $chekedcart;

        $payment = new Payment();  
        $payment->external_id = $createVA['external_id'];
        $payment->name = $name;
        $payment->email = $email;
        $payment->user_id = $user_id;
        $payment->status = '2'; 
        $payment->currency = $createVA['currency'];  
        $payment->bank_code = $request->data['bank_code'];  
        $payment->payment_chanel = 'Virtual Account';  
        $payment->expected_amount = $ammount;
        $payment->va_id = $createVA['id'];  
        $payment->order_number = $this->order_number;  
        $payment->account_number = $createVA['account_number'];  
        $payment->expiration_date = $createVA['expiration_date']; 
        $payment->save();

        $trasaction = new Transactions();  
        $trasaction->order_number = $this->order_number;
        $trasaction->payment_chanel = 'Virtual Account';
        $trasaction->user_id = $user_id; 
        $trasaction->createdby = $user_id;  
        $trasaction->invoice_number = $this->invoice_number;
        $trasaction->status = '2';
        $trasaction->useraddress = $address[0]->id;
        $trasaction->id_delivery = $request->id_delivery;
        $trasaction->save();

        $getdataproduct = CartBuyer::with('productmarket')->where('user_id', $user_id)->where('status',1)->get();
        foreach ($getdataproduct as $key => $value) {
            $dataitems[]=[
                "transaction_id"=>$trasaction->id,
                "product_id"=>$value->product_id,
                "product_name"=>$value->productmarket->name,
                "product_image"=>$value->productmarket->picture_1,
                "product_price"=>$value->productmarket->price,
                "product_item"=>$value->productmarket->satuan,
                "product_qty"=>$value->qty,
                "price_total"=>$value->price,
                "status"=>2,
                "size"=>$value->productmarket->size,
                "owner"=>$value->productmarket->owner,
                "status"=>2,
                "product_sku"=>$value->productmarket->sku,
                "product_type"=>producttype($value->productmarket->typeProd_id),
            ];
        }

        foreach ($dataitems as $key => $value) {
           TransactionItem::create($value);
        }

        $trasactionitem = new TransactionHistory();  
        $trasactionitem->transaction_id = $trasaction->id;
        $trasactionitem->status = 2;
        $trasactionitem->save();
       
        $cart = CartBuyer::where('user_id', $user_id)->where('status', 1)->delete();



        //         use App\Models\Payment;
        //         use App\Models\MstTransaction;
        // use App\Models\TransactionItem;
        // use App\Models\TransactionHistory
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
}
