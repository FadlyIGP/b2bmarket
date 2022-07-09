<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\ProductOffering;
use App\Models\ProdCategory;
use App\Models\ImgProduct;
use App\Models\MstProduct;
use App\Models\User;
use App\Models\MstCompany;
use App\Models\UserMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OfferingMessageController extends Controller
{

    public function __construct()
    {
        function productlist($prod_id)
        {
            $data = MstProduct::find($prod_id);
            if ($data) {
                $productdata = $data;
            } else {
                $productdata = null;
            }
            return $productdata;
        }

        function users($user_id)
        {
            $data = UserMitra::find($user_id);
            if ($data) {
                $usertdata = $data;
            } else {
                $usertdata = null;
            }
            return $usertdata;
        }

        function getcompany($id){
            $company=MstCompany::find($id);
            return $company->company_name;
        }

        function prod_image($id){
            $image=ImgProduct::where('product_id',$id)->first();
            return $image->img_file;
        }

        function prod_category($id){
            $category=ProdCategory::find($id);
            return $category;
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

        $data=ProductOffering::where('buyer_id', $profile->id)->get();

        foreach ($data as $key => $value) {
            $listdata[]=[
                'id'=> $value->id,
                'title'=> $value->title,
                'descriptions'=> $value->descriptions,
                'buyer_id'=> $value->buyer_id,
                'buyer_name'=> users($value->buyer_id)->name,
                'buyer_company'=> getcompany(users($value->buyer_id)->company_id),
                'company_id'=> $value->company_id,
                'company_name'=> getcompany($value->company_id),
                'product_id'=> $value->product_id,
                'product_name'=> productlist($value->product_id)->product_name,
                'product_category'=>prod_category(productlist($value->product_id)->product_category_id)->name,
                'product_image'=> prod_image($value->product_id),
                'product_price'=> productlist($value->product_id)->product_price,
                'price_offering'=> $value->price_offering,
                'price_quotation'=> $value->price_quotation,
                'approval_buyer'=> $value->approval_buyer,
                'approval_seller'=> $value->approval_seller,
                'created_at'=> $value->created_at,
            ];
        }
        // return $listdata;
        return view('frontEnd.productoffering.index', ['listdata' => $listdata]);
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
