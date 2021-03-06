<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstProduct;
use App\Models\ProdCategory;
use App\Models\ProductOffering;
use App\Models\ImgProduct;
use App\Models\User;
use App\Models\StockProduct;
use App\Models\Wishlist;
use App\Models\MstCompany;
use App\Models\UserMitra;
use App\Models\ProductHistory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Exception;
use File;
use Carbon\Carbon;


class ProductController extends Controller
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

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $productlist = MstProduct::with('stock', 'image','category')->where('company_id', $profile->company_id)->get();

        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id"=> Crypt::encryptString($value->id),
                "product_name"=> $value->product_name,
                "product_descriptions"=> $value->product_descriptions,
                "product_size"=> $value->product_size,
                "product_price"=> 'Rp '.''. number_format($value->product_price),
                "product_item"=> $value->product_item,
                "wishlist_status"=> $value->wishlist_status,
                "company_id"=> $value->company_id,
                "created_at"=> $value->created_at,
                "stock"=> $value->stock->qty,
                "image"=> $value->image[0]->img_file,
                "category"=> $value->category->name,
                'min_order'=> $value->minimum_order
            ];
        }

        $producthistory=ProductHistory::where('company_id', $profile->company_id)->get();
        $history=[];
        foreach ($producthistory as $key => $value) {
            $history[]=[
                'id'=>$value->id,
                'buyer_id'=>$value->user_id,
                'buyer_company'=>getcompany(users($value->user_id)->company_id),
                'buyer_name'=>users($value->user_id)->name,
                'product_id'=>$value->product_id,
                'product_name'=>productlist($value->product_id)->product_name,
                'product_image'=>prod_image($value->product_id),
                'company_id'=>$value->company_id,
                'counting'=>$value->counting,
                'created_at'=>$value->created_at,
            ];
        }
        // return $history;


        return view('product.product', ['productlisting' => $productlisting,'history'=>$history]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $select_category = ProdCategory::where('company_id', $profile->company_id)->get();

        return view('product.productadd', ['category_list' => $select_category]);
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

        // *findcompany_id *//
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $mstprodcuct = new MstProduct;
        $mstprodcuct->product_name          = $request->prod_name;
        $mstprodcuct->product_descriptions  = $request->prod_desc;
        $mstprodcuct->product_size          = $request->prod_size;
        $mstprodcuct->product_price         = $request->prod_price;
        $mstprodcuct->product_item          = $request->prod_item;
        $mstprodcuct->product_category_id   = $request->prod_category;
        $mstprodcuct->wishlist_status       = 0;
        $mstprodcuct->company_id            = $profile->company_id;
        $mstprodcuct->minimum_order         = $request->min_order;
        $mstprodcuct->price_coret           = $request->price_coret;
        $mstprodcuct->save();

        $productstock = new StockProduct;
        $productstock->product_id   = $mstprodcuct->id;
        $productstock->qty          = $request->prod_qty;
        $productstock->save();

        if ($request->hasfile('prod_img')) {
            foreach ($request->file('prod_img') as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
            }
        }

        foreach ($data as $key => $value) {
            $producimage = new ImgProduct;
            $producimage->product_id    = $mstprodcuct->id;
            $producimage->img_file      = $value;
            $producimage->save();
        }

        return redirect()->route('products.index')->with('success', 'Successfully Add Data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orig_id = Crypt::decryptString($id);
        $productlist = MstProduct::with('stock', 'image')->where('id', $orig_id)->get();

        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size"=> $value->product_size,
                "product_price"=> $value->product_price,
                "product_item"=> $value->product_item,
                "wishlist_status"=> $value->wishlist_status,
                "company_id"=> $value->company_id,
                "created_at"=> $value->created_at,
                "price_coret"=> $value->price_coret,
                "stock"=> $value->stock->qty,
                "image"=> $this->urlimg . $value->image[0]->img_file,
            ];
        }
        return view('product.product', ['productlisting' => $productlisting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        
        $orig_id = Crypt::decryptString($id);
        $productlist = MstProduct::with('stock', 'image', 'category')->where('id', $orig_id)->first();

        $category_id = $productlist->product_category_id;
        $temp_category = ProdCategory::where('id', $category_id)->first();
        $category_name = $temp_category->name;

        $category_list = ProdCategory::where('company_id', $profile->company_id)->get();

        $productlisting = [
            "id"=> $productlist->id,
            "product_name"=> $productlist->product_name,
            "product_descriptions"=> $productlist->product_descriptions,
            "product_size"=> $productlist->product_size,
            "product_price"=> $productlist->product_price,
            "product_item"=> $productlist->product_item,
            "id_category"=> $productlist->product_category_id,
            "product_category"=> $category_name,
            "min_order" => $productlist->minimum_order,
            "wishlist_status"=> $productlist->wishlist_status,
            "company_id"=> $productlist->company_id,
            "created_at"=> $productlist->created_at,
            "price_coret"=> $productlist->price_coret,
            "stock"=> $productlist->stock->qty,
            // "image" => $this->urlimg.$value->image[0]->img_file,
        ];        

        // return dd($productlisting->toJson(200, [], JSON_UNESCAPED_SLASHES));
        return view('product.productedit', ['productlisting' => $productlisting, 'category_list' => $category_list]);
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
        date_default_timezone_set('Asia/Jakarta'); 

        // $id = base64_decode($id);
        $mstprodcuct = MstProduct::find($id);
        $mstprodcuct->product_name = $request->prod_name;
        $mstprodcuct->product_descriptions = $request->prod_desc;
        $mstprodcuct->product_size = $request->prod_size;
        $mstprodcuct->product_price = $request->prod_price;
        $mstprodcuct->product_item = $request->prod_item;
        $mstprodcuct->product_category_id = $request->prod_category;
        $mstprodcuct->minimum_order = $request->min_order;
        $mstprodcuct->price_coret = $request->price_coret;
        $mstprodcuct->save();

        $productstock = StockProduct::where('product_id', $id)->first();
        $productstock->qty = $request->prod_qty;
        $productstock->save();

        return redirect()->route('products.index')->with('success', 'Successfully Update Data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set('Asia/Jakarta'); 
        
        $orig_id = Crypt::decryptString($id);        

        $product = MstProduct::where('id', $orig_id)->first();
        
        $StockProduct = StockProduct::where('product_id', $orig_id)->first();
        $StockProduct->delete();

        $image_list = ImgProduct::where('product_id', $orig_id)->get();

        foreach ($image_list as $key => $value) {
            File::delete(public_path().'/files/'. $value->img_file);

            $temp_img = ImgProduct::where('product_id', $value->product_id)->first();
            $temp_img->delete();
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Successfully Delete Data.');
    }


    /******************** For New Public Function At Here ********************/
    /* Not Used
    public function editimage($id)
    {
        $orig_id = Crypt::decryptString($id);
        $temp_image = ImgProduct::where('product_id', $orig_id)->get();

        $image_list = [];    
        foreach ($temp_image as $key => $value) {
            $image_list[] = [
                "id"            => $value->id,
                "product_id"    => $value->product_id,
                "image_name"    => $value->img_file
            ];
        }
        
        $count_img = $temp_image->count();

        return view('product.productimage', ['image_list' => $image_list, 'count_img' => $count_img, 'product_id' => $orig_id]);
    }

    public function updateImage(Request $request)
    {                
        if ($request->hasfile('prod_img')) {

            foreach ($request->file('prod_img') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
            }
        }

        foreach ($data as $key => $value) {    
            $ImgProduct = ImgProduct::find($request->product_id);                    
            $ImgProduct->img_file      = $value;
            $ImgProduct->save();
        }
    }
    */

    public function imagelist()
    {
        //
        $productlist = MstProduct::with('stock', 'image','category')->get();


        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" => 'Rp '.''.$value->product_price,
                "product_item" => $value->product_item,
                "wishlist_status" => $value->wishlist_status,
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $value->image[0]->img_file,
                "category"=>$value->category->name
            ];
        }

        return $productlisting;

        // return view('product.product', ['productlisting' => $productlisting]);
    }

    public function edit_history($id)
    {

        $producthistory = ProductHistory::where('id', $id)->first();

        $productlist=[];

        $productlist=[
                "id"=> $producthistory->id,
                "buyer_id" => $producthistory->user_id,
                "buyer_name" => users($producthistory->user_id)->name,
                "product_id" => $producthistory->product_id,
                "product_name" => productlist($producthistory->product_id)->product_name,
                "product_price" => productlist($producthistory->product_id)->product_price,


        ];

        return view('product.productdetail', ['productlist'=>$productlist]);      

      
    }

    public function update_history(Request $request, $id){
     $profile = UserMitra::where('email', Auth::user()->email)->first();
     $history = ProductHistory::where('id', $id)->get();
       // return $history;

     $mstprodoffer = new ProductOffering;
     $mstprodoffer->title         = $request->title;
     $mstprodoffer->descriptions  = $request->descriptions;
     $mstprodoffer->buyer_id      = $history->user_id;    
     $mstprodoffer->company_id    = $profile->company_id;
     $mstprodoffer->product_id    = $history->product_id;    
     $mstprodoffer->price_offering   = $request->price_offering;
     $mstprodoffer->price_quotation  = $request->price_quotation;
     $mstprodoffer->save();
       // return $mstprodoffer;

     return redirect()->route('products.index')->with('success', 'Successfully Update Data Offering.');

 }

}
