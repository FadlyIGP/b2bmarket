<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use App\Models\ImgProduct;
use App\Models\MstCompany;
use App\Models\Wishlist;
use App\Models\ProductHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class InfoProductController extends Controller
{

    public function __construct()
    {
        $this->per_page = 4;

        function pay_counting($data)
        {

            if ($data == null) {
                $seelcounting = 0;
            } else {
                $seelcounting = $data;
            }
            return $seelcounting;
        }

        function getcompany($id)
        {
            $company = MstCompany::find($id);
            return $company->company_name;
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
    public function index(Request $request)
    {
        // return $request->all();
        if (empty($request->page)) {
            $requestpage=1;
        } else {
            $requestpage=$request->page;
        }

        if ($requestpage == 1) {
            $page = 1;
            $limit_page = 0;
        } else {
            $limit_page = ($request->page * $this->per_page) - $this->per_page;
        }

        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $cartlistbyuserid = Cart::with('image', 'product')->where('user_id', $profile->id)->get();
        \Session::put('countingcart', count($cartlistbyuserid));
        $wishlist = Wishlist::where('user_id', $profile->id)->get();
        \Session::put('wishlist', count($wishlist));

        if (empty($request->filterbyname)) {
            // **PRODUCT TERLARIS
            $productmaxpay = MstProduct::with('stock', 'image', 'category')
                            ->offset($limit_page)
                            ->limit($this->per_page)
                            ->orderBy('pay_counting', 'DESC')
                            ->get();

            $count = count(MstProduct::select('*')
                ->get());
        } else {
            // **PRODUCT TERLARIS
            $productmaxpay = MstProduct::with('stock', 'image', 'category')
                            ->where('product_name', 'LIKE', "%{$request->filterbyname}%")
                            ->offset($limit_page)
                            ->limit($this->per_page)
                            ->orderBy('pay_counting', 'DESC')
                            ->get();

            $count = count(MstProduct::select('*')
                    ->get());
        }
        

       

        if ($count / $requestpage <= ($this->per_page)) {
            $islastpage = true;
        } else {
            $islastpage = false;
        }

        $lastPage = ceil($count / $this->per_page);

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

        $response = [
            "status" => true,
            "message" => "Daftar Pesanan Berhasil Ditampilkan...",
            "totaldata" => $count,
            "data" => $product_max_pay,
            "page" => $requestpage,
            "last_page" => $lastPage,
            "is_last_page" => $islastpage
        ];
        $http_code = 200;
        // return response($response, $http_code);

        return view('frontEnd.product.productlisting', ['response' => $response]);
    }

    public function getlistproduct(Request $request)
    {
        // if (empty($request->filter) && empty($request->page)) {
        //     $product = MstProduct::with('stock', 'image','category')
        //     ->where('id',$id)->get();
        // } else {
        //     # code...
        // }

        // $product = MstProduct::with('stock', 'image','category')
        // ->where('id',$id)->first();

        $product = MstProduct::all();
        $data = ['data' => $product];
        return $data;


        return view('frontEnd.product.productlisting');
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
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $getcompany=MstProduct::find($id);
        $checkhistory=ProductHistory::where('user_id',$profile->id)->where('product_id', $id)->first();
        if ($checkhistory) {
           $data =ProductHistory::find($checkhistory->id);
           $data->counting += 1;
           $data->save();
        }else{
           $data = new ProductHistory;
           $data->product_id = $id;
           $data->user_id = $profile->id;
           $data->company_id = $getcompany->company_id;
           $data->counting = 1;
           $data->save();
        }

        $seelcounting=MstProduct::find($id);
        $seelcounting->see_counting+=1;
        $seelcounting->save();
        
        $product = MstProduct::with('stock', 'image', 'category')
            ->where('id', $id)->first();
        $productimage = ImgProduct::where('product_id', $product->id)->get();
        $productdetail = [];
        $productdetail = [
            "id" => $product->id,
            "product_name" => $product->product_name,
            "product_descriptions" => $product->product_descriptions,
            "product_size" => $product->product_size,
            "product_price" => 'Rp' . number_format((float)$product->product_price, 0, ',', '.'),
            "product_item" => $product->product_item,
            "wishlist_status" => getwishlist([$profile->id, $product->id]),
            "company_id" => $product->company_id,
            "created_at" => $product->created_at,
            "stock" => $product->stock->qty,
            "image" => $product->image[0]->img_file,
            "product_category" => $product->category->name,
            "pay_counting" => pay_counting($product->pay_counting),
            "minimum_order" => $product->minimum_order,
            "company_name" => getcompany($product->company_id),
        ];


        return view('frontEnd.home.productdetail', ['productdetail' => $productdetail, 'productimage' => $productimage]);
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
