<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use App\Models\ImgProduct;
use App\Models\MstCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class InfoProductController extends Controller
{

    public function __construct()
    {
        function pay_counting($data){

                if ($data==null) {
                    $seelcounting=0;
                } else {
                    $seelcounting=$data;
                }
                return $seelcounting;
        }

        function getcompany($id){
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

        $product = MstProduct::with('stock', 'image','category')
            ->where('id',$id)->first();
        $productimage=ImgProduct::where('product_id', $product->id)->get();
        $productdetail = [];
        $productdetail = [
            "id" => $product->id,
            "product_name" => $product->product_name,
            "product_descriptions" => $product->product_descriptions,
            "product_size" => $product->product_size,
            "product_price" =>'Rp'. number_format((float)$product->product_price, 0, ',', '.'),
            "product_item" => $product->product_item,
            "wishlist_status" => $product->wishlist_status,
            "company_id" => $product->company_id,
            "created_at" => $product->created_at,
            "stock" => $product->stock->qty,
            "image" => $product->image[0]->img_file,
            "product_category" => $product->category->name,
            "pay_counting" => pay_counting($product->pay_counting),
            "minimum_order"=> $product->minimum_order,
            "company_name"=> getcompany($product->company_id),
        ];

        return view('frontEnd.home.productdetail', ['productdetail' => $productdetail,'productimage'=>$productimage]);
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
