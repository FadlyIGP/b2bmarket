<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;

use App\Models\MstProduct;
use App\Models\ProdCategory;
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
use Illuminate\Support\Facades\Crypt;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->urlimg = env('APP_URL').'/'.'public'.'/'.'files';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productlist = MstProduct::with('stock', 'image','category')->get();

        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id"                    => Crypt::encryptString($value->id),
                "product_name"          => $value->product_name,
                "product_descriptions"  => $value->product_descriptions,
                "product_size"          => $value->product_size,
                "product_price"         => 'Rp '.''. number_format($value->product_price),
                "product_item"          => $value->product_item,
                "wishlist_status"       => $value->wishlist_status,
                "company_id"            => $value->company_id,
                "created_at"            => $value->created_at,
                "stock"                 => $value->stock->qty,
                "image"                 => $value->image[0]->img_file,
                "category"              => $value->category->name
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
        $mstprodcuct->save();

        $productstock = new StockProduct;
        $productstock->product_id   = $mstprodcuct->id;
        $productstock->qty          = $request->prod_qty;
        $productstock->save();

        if ($request->hasfile('prod_img')) {

            foreach ($request->file('prod_img') as $file) {
                $name = $file->getClientOriginalName();
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
                "id"                    => $value->id,
                "product_name"          => $value->product_name,
                "product_descriptions"  => $value->product_descriptions,
                "product_size"          => $value->product_size,
                "product_price"         => $value->product_price,
                "product_item"          => $value->product_item,
                "wishlist_status"       => $value->wishlist_status,
                "company_id"            => $value->company_id,
                "created_at"            => $value->created_at,
                "stock"                 => $value->stock->qty,
                "image"                 => $this->urlimg . $value->image[0]->img_file,
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
        $orig_id = Crypt::decryptString($id);
        $productlist = MstProduct::with('stock', 'image', 'category')->where('id', $orig_id)->first();

        $category_id = $productlist->product_category_id;
        $temp_category = ProdCategory::where('id', $category_id)->first();
        $category_name = $temp_category->name;

        $category_list = ProdCategory::all();

        $productlisting = [
            "id"                    => $productlist->id,
            "product_name"          => $productlist->product_name,
            "product_descriptions"  => $productlist->product_descriptions,
            "product_size"          => $productlist->product_size,
            "product_price"         => $productlist->product_price,
            "product_item"          => $productlist->product_item,
            "id_category"           => $productlist->product_category_id,
            "product_category"      => $category_name,
            "wishlist_status"       => $productlist->wishlist_status,
            "company_id"            => $productlist->company_id,
            "created_at"            => $productlist->created_at,
            "stock"                 => $productlist->stock->qty,
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
        // $id = base64_decode($id);
        $mstprodcuct = MstProduct::find($id);
        $mstprodcuct->product_name          = $request->prod_name;
        $mstprodcuct->product_descriptions  = $request->prod_desc;
        $mstprodcuct->product_size          = $request->prod_size;
        $mstprodcuct->product_price         = $request->prod_price;
        $mstprodcuct->product_item          = $request->prod_item;
        $mstprodcuct->product_category_id   = $request->prod_category;
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
        $orig_id = Crypt::decryptString($id);
        $product = MstProduct::where('id', $orig_id)->first();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Successfully Delete Data.');
    }


    /******************** For New Public Function At Here ********************/
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
        
        return view('product.productimage', ['image_list' => $image_list]);
    }

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
}
