<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;

use App\Models\MstProduct;
use App\Models\ImgProduct;
use App\Models\User;
use App\Models\StockProduct;
use App\Models\Wishlist;
use App\Models\MstCompany;
use App\Models\UserMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->urlimg = 'https://ik.imagekit.io/1002kxgfmea/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productlist = MstProduct::with('stock', 'image')->get();

        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" => $value->product_price,
                "product_item" => $value->product_item,
                "wishlist_status" => $value->wishlist_status,
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $this->urlimg . $value->image[0]->img_file,
            ];
        }
        return view('product.product', ['productlisting' => $productlisting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.productadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return count($request->file('prod_img'));

        // foreach ($request->file('prod_img') as $key => $value) {
        //     $img[]=$value;
        // }
        // return $img;
        // *findcompany_id *//
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $mstprodcuct = new MstProduct;
        $mstprodcuct->product_name = $request->prod_name;
        $mstprodcuct->product_descriptions = $request->prod_desc;
        $mstprodcuct->product_size = $request->prod_size;
        $mstprodcuct->product_price = $request->prod_price;
        $mstprodcuct->product_item = $request->prod_item;
        $mstprodcuct->wishlist_status = 0;
        $mstprodcuct->company_id = $profile->company_id;
        $mstprodcuct->save();

        $productstock = new StockProduct;
        $productstock->product_id = $mstprodcuct->id;
        $productstock->qty = $request->prod_qty;
        $productstock->save();

        // if ($request->hasFile('prod_img')) {
        //     $prod_img = $request->file('prod_img');
        //     $namefile = rand(1000, 9999) . $prod_img->getClientOriginalName();
        //     $prod_img->move('storage/image', $namefile);
        // } else {
            $namefile = '';
        // }

        $producimage = new ImgProduct;
        $producimage->product_id = $mstprodcuct->id;
        $producimage->img_file = $namefile;
        $producimage->save();


        return redirect()->route('products.index');
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
        $productlist = MstProduct::with('stock', 'image')->where('id', $id)->get();
        return $productlist;
        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" => $value->product_price,
                "product_item" => $value->product_item,
                "wishlist_status" => $value->wishlist_status,
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $this->urlimg . $value->image[0]->img_file,
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
        //
        $productlist = MstProduct::with('stock', 'image')->where('id', $id)->first();

        $productlisting = [
            "id" => $productlist->id,
            "product_name" => $productlist->product_name,
            "product_descriptions" => $productlist->product_descriptions,
            "product_size" => $productlist->product_size,
            "product_price" => $productlist->product_price,
            "product_item" => $productlist->product_item,
            "wishlist_status" => $productlist->wishlist_status,
            "company_id" => $productlist->company_id,
            "created_at" => $productlist->created_at,
            "stock" => $productlist->stock->qty,
            // "image" => $this->urlimg.$value->image[0]->img_file,
        ];

        return view('product.productedit',['productlisting' => $productlisting]);
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
        $id=base64_decode($id);
        $mstprodcuct = MstProduct::find($id);
        $mstprodcuct->product_name = $request->prod_name;
        $mstprodcuct->product_descriptions = $request->prod_desc;
        $mstprodcuct->product_size = $request->prod_size;
        $mstprodcuct->product_price = $request->prod_price;
        $mstprodcuct->product_item = $request->prod_item;
        $mstprodcuct->save();

        $productstock = StockProduct::where('product_id', $id);
        $productstock->qty = $request->prod_qty;
        $productstock->save();

        return redirect()->route('products.index');
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
