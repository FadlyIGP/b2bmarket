<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;
use App\Models\ProductOffering;
use App\Models\ProductHistory;
use App\Models\ProdCategory;
use App\Models\ImgProduct;
use App\Models\MstProduct;
use App\Models\User;
use App\Models\MstCompany;
use App\Models\UserMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class OfferingProductController extends Controller
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

        $data=ProductOffering::where('company_id', $profile->company_id)->get();

        $listdata=[];
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
        return view('productoffering.index', ['listdata' => $listdata]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $profile = UserMitra::where('email', Auth::user()->email)->first();
     $productlist=MstProduct::where('company_id', $profile->company_id)->get();
     $mitra=UserMitra::all();


     return view('productoffering.create',['productlist'=>$productlist,'mitra'=>$mitra]);
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       date_default_timezone_set('Asia/Jakarta'); 
       $profile = UserMitra::where('email', Auth::user()->email)->first();

       $mstprodoffer = new ProductOffering;
       $mstprodoffer->title          = $request->title;
       $mstprodoffer->descriptions  = $request->descriptions;
       $mstprodoffer->buyer_id          = $request->buyer_id;
       $mstprodoffer->company_id         = $profile->company_id;
       $mstprodoffer->product_id          = $request->product_id;
       $mstprodoffer->price_offering   = $request->price_offering;
       $mstprodoffer->price_quotation       = $request->price_quotation;
       $mstprodoffer->save();

       return redirect()->route('offeringproducts.index')->with('success', 'Successfully Add Data.');
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
