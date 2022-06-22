<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\MstProduct;
use App\Models\ProdCategory;
use App\Models\ImgProduct;
use App\Models\User;
use App\Models\StockProduct;
use App\Models\Wishlist;
use App\Models\MstCompany;
use App\Models\UserMitra;
use Exception;
use Carbon\Carbon;
use File;


class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp_img = ImgProduct::join('mst_product', 'mst_product.id', '=', 'product_image.product_id')
            ->get(['product_image.id', 'product_image.product_id', 'mst_product.product_name',
                'product_image.img_file', 'product_image.created_at']);

        $image_list = [];
        foreach ($temp_img as $key => $value) {
            $image_list[] = [
                "id"                    => Crypt::encryptString($value->id),
                "product_id"            => $value->product_id,
                "product_name"          => $value->product_name,
                "img_file"              => $value->img_file,                
                'created_at'            => $value->created_at
            ];
        }

        return view('product.productimagelist', ['image_list' => $image_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_list = MstProduct::orderBy('mst_product.product_name')->get();

        return view('product.createproductimage', ['product_list' => $product_list]);
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

        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);        

        $temp_img   = ImgProduct::where('product_id', $request->product)->get();
        $count_img  = $temp_img->count();     

        /*Maximum 5 image*/
        if ($count_img == 5) {
            return redirect()->route('productimages.create')
                ->with('warning', 'Selected product already have a 5 image. Adding image again not possible!');
        }

        $imageName = time().'_'.$request->image_name->getClientOriginalName();  

        $request->image_name->move(public_path('files'), $imageName);

        $ImgProduct             = new ImgProduct;
        $ImgProduct->product_id = $request->product;
        $ImgProduct->img_file   = $imageName;
        $ImgProduct->save();

        return redirect()->route('productimages.index')->with('success', 'Successfully Add Image.');
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
        $orig_id    = Crypt::decryptString($id);
        $image_list = ImgProduct::find($orig_id);
        
        $id_prod        = $image_list->product_id;
        $tmep_product   = MstProduct::find($id_prod);
        $product_name   = $tmep_product->product_name;

        return view('product.Modifyproductimage', ['image_list' => $image_list, 'id_prod' => $id_prod, 'product_name' => $product_name]);
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

        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]); 

        $ImgProduct = ImgProduct::find($id);
        
        /*Delete Image*/
        File::delete(public_path().'/files/'. $ImgProduct->img_file);

        /*Add New Image*/
        $imageName = time().'_'.$request->image_name->getClientOriginalName();  
        $request->image_name->move(public_path('files'), $imageName);

        /*Modify Image Name*/
        $ImgProduct->img_file   = $imageName;
        $ImgProduct->save();

        return redirect()->route('productimages.index')->with('success', 'Successfully Update Image.');
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
        
        $orig_id    = Crypt::decryptString($id);
        $ImgProduct = ImgProduct::find($orig_id);

        $temp_img   = ImgProduct::where('product_id', $ImgProduct->product_id)->get();
        $count_img  = $temp_img->count();

        /*Minimum 1 Image*/
        if ($count_img == 1) {
            return redirect()->route('productimages.index')
                ->with('warning', 'Deleting not possible. You have already minimum image (1) !');   
        }
        
        /*Delete Image*/
        File::delete(public_path().'/files/'. $ImgProduct->img_file);

        /*Delete Data*/
        $ImgProduct->delete();

        return redirect()->route('productimages.index')->with('success', 'Successfully Delete Image.');
    }
}
