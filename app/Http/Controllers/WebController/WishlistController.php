<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\UserMitra;
use App\Models\MstProduct;
use Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->urlimg = 'https://ik.imagekit.io/1002kxgfmea/';

        function pay_counting($data){

                if ($data==null) {
                    $seelcounting=0;
                } else {
                    $seelcounting=$data;
                }
                return $seelcounting;
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
        $cartlistbyuserid=Wishlist::with('image','product')->where('user_id', $profile->id)->get();
        // return $cartlistbyuserid;

        // $chekedcart=Wishlist::with('product')->where('user_id', $profile->id)->where('status', 1)->get();

        foreach ($cartlistbyuserid as $key => $value) {
            $listcart[]=[
                "id" => $value->id,
                "product_name" => $value->product->product_name,
                "product_descriptions" => $value->product->product_descriptions,
                "product_size" => $value->product->product_size,
                "product_price" =>'Rp'. number_format((float)$value->product->product_price, 0, ',', '.'),
                "product_item" => $value->product->product_item,
                "wishlist_status" => $value->status,
                "company_id" => $value->product->company_id,
                "created_at" => $value->created_at,
                "image" => $value->image[0]->img_file,
                "pay_counting" => pay_counting($value->product->pay_counting),
                "min_order" => $value->product->minimum_order,
                "user_id" => $value->user_id
            ];
        }
        // return $listcart;

        return view('frontEnd.wishlist.wishlist',['listcart'=>$listcart]);

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
        $getwishlist = MstProduct::where('id', $request->product_id)->first();
        $wishlist = new Wishlist;
        $wishlist->product_id = $getwishlist->id;
        $wishlist->status = 1;
        $wishlist->user_id = $profile->id;
        $wishlist->save();
        return redirect()->route('firstpage');

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
       $deletelove = Wishlist::find($id);
       $delete=$deletelove->delete();
       return redirect()->back();
    }
}
