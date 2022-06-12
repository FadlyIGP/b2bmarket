<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\ProdCategory;
use App\Models\ImgProduct;
use App\Models\User;
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



class CartController extends Controller
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
        $cartlistbyuserid=Cart::with('image','product')->where('user_id', $profile->id)->get();
        $chekedcart=Cart::with('product')->where('user_id', $profile->id)->where('status', 1)->get();

        $totalcheked=[];
        $listchecked=[];
        foreach ($chekedcart as $key => $value) {
             $totalcheked[]=$value->total_price;
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
                'product_size'=> $value->product->product_size,
            ];
        }
        
        $total_price=number_format((float)array_sum($totalcheked), 0, ',', '.');

        foreach ($cartlistbyuserid as $key => $value) {
            $listcart[]=[
                'id'=> $value->id,
                'product_id'=> $value->product_id,
                'product_qty'=> $value->product_qty,
                'product_price'=>'Rp'." ".number_format((float)$value->product_price, 0, ',', '.'),
                'total_price'=>'Rp'." ".number_format((float)$value->total_price, 0, ',', '.'),
                'status'=> $value->status,
                'user_id'=> $value->user_id,
                'company_name'=> gencompany($value->company_id),
                'product_image'=> $value->image[0]->img_file,
                'product_name'=> $value->product->product_name,
                'product_descriptions'=> $value->product->product_descriptions,
                'product_size'=> $value->product->product_size,
            ];
        }

        return view('frontEnd.cart.listcart',['listcart'=>$listcart, 'total_price'=>$total_price,'listchecked'=>$listchecked]);


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
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $getprodiuctdata = MstProduct::where('id', $request->product_id)->first();
        return $getprodiuctdata;
        $cart = new Cart;
        $cart->product_id = $getprodiuctdata->id;
        $cart->product_qty = 1;
        $cart->product_price = $getprodiuctdata->product_price;
        $cart->total_price = $getprodiuctdata->product_price;
        $cart->status = 0;
        $cart->user_id = $profile->id;
        $cart->company_id = $getprodiuctdata->company_id;
        $cart->save();

        return redirect()->route('home.buyer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        return $request->all();

    }

    public function updateqty(Request $request, $id)
    {
        $cart = Cart::find($id);
        $updatetotalprice=$cart->product_price * $request->param0;
        $cart->product_qty = $request->param0;
        $cart->total_price = $updatetotalprice;
        $cart->save();
        return redirect()->route('carts.index');
    }

    public function chekedcart(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->status = $request->status;
        $cart->save();
        return redirect()->route('carts.index');
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

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
