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
        function gencompany($id){
            $company=MstCompany::find($id);
            return $company->company_name;
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
        $address=Address::where('user_id', $profile->id)->where('primary_address',1)->first();
        if ($address) {
            $completeaddress=$address->kelurahan." ".$address->kecamatan." ".$address->kabupaten." ".$address->provinsi." , ".$address->postcode;
            
        } else {
           $completeaddress=null;
        }
        
        // return $address;
        
        $cartlistbyuserid=Cart::with('image','product')->where('user_id', $profile->id)->get();
        $chekedcart=Cart::with('product')->where('user_id', $profile->id)->where('status', 1)->get();

        $totalcheked=[];
        $listchecked=[];
        foreach ($chekedcart as $key => $value) {
             $totalcheked[]=$value->total_price;
             $qty_total[]=$value->product_qty;

             $listchecked[]=[
                'id'=> $value->id,
                'product_id'=> $value->product_id,
                'product_qty'=> $value->product_qty,
                'product_price'=> number_format((float)$value->product_price, 0, ',', '.'),
                'total_price'=>'Rp'." ".number_format((float)$value->total_price, 0, ',', '.'),
                'status'=> $value->status,
                'user_id'=> $value->user_id,
                'product_name'=> $value->product->product_name,
                'product_descriptions'=> $value->product->product_descriptions,
                 'product_image'=> $value->image[0]->img_file,
                'product_size'=> $value->product->product_size,
            ];
        }
        
        $total_price=number_format((float)array_sum($totalcheked), 0, ',', '.');
        $countqty=array_sum($qty_total);


        return view('frontEnd.payment.payment',['total_price'=>$total_price,'listchecked'=>$listchecked,'completeaddress'=>$completeaddress,'address'=>$address,'countqty'=>$countqty]);
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
}
