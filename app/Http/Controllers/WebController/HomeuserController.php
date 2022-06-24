<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class HomeuserController extends Controller
{
    public function __construct()
    {
        $this->urlimg = 'https://ik.imagekit.io/1002kxgfmea/';

        function pay_counting($data)
        {

            if ($data == null) {
                $seelcounting = 0;
            } else {
                $seelcounting = $data;
            }
            return $seelcounting;
        }

        function getwishlist($prod_id)
        {
            $cekwislist = Wishlist::where('user_id', $prod_id[0])->where('product_id', $prod_id[1])->first();
            if ($cekwislist) {
                $status = true;
            } else {
                $status = false;
            }
            return $status;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index2()
    {

        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $cartlistbyuserid = Cart::with('image', 'product')->where('user_id', $profile->id)->get();
        \Session::put('countingcart', count($cartlistbyuserid));
        $wishlist = Wishlist::where('user_id', $profile->id)->get();

        \Session::put('wishlist', count($wishlist));


        // *PRODUCT RANDOM* 
        $random = MstProduct::with('stock', 'image')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $productrandom = [];
        foreach ($random as $key => $value) {
            $productrandom[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" => 'Rp' . number_format((float)$value->product_price, 0, ',', '.'),
                "product_item" => $value->product_item,
                "wishlist_status" => getwishlist([$profile->id, $value->id]),
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $value->image[0]->img_file,
                "min_order" => $value->minimum_order,


            ];
        }

        // **NEW PRODUCT**
        $productlist = MstProduct::with('stock', 'image', 'category')
            ->inRandomOrder()
            ->limit(8)
            ->orderBy('created_at', 'DESC')
            ->get();

        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" => 'Rp' . number_format((float)$value->product_price, 0, ',', '.'),
                "product_item" => $value->product_item,
                "wishlist_status" => getwishlist([$profile->id, $value->id]),
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $value->image[0]->img_file,
                "product_category" => $value->category->name,
                "pay_counting" => pay_counting($value->pay_counting),
                "min_order" => $value->minimum_order,


            ];
        }

        // **PRODUCT TERLARIS
        $productmaxpay = MstProduct::with('stock', 'image', 'category')
            ->inRandomOrder()
            ->limit(8)
            ->orderBy('pay_counting', 'DESC')
            ->get();

        $product_max_pay = [];
        foreach ($productmaxpay as $key => $value) {
            $product_max_pay[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" => 'Rp' . number_format((float)$value->product_price, 0, ',', '.'),
                "product_item" => $value->product_item,
                "wishlist_status" => getwishlist([$profile->id, $value->id]),
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $value->image[0]->img_file,
                "product_category" => $value->category->name,
                "pay_counting" => pay_counting($value->pay_counting),
                "min_order" => $value->minimum_order,


            ];
        }
        return view('frontEnd.home.homeweb', ['productrandom' => $productrandom, 'productlisting' => $productlisting, 'product_max_pay' => $product_max_pay]);
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
    }
}
