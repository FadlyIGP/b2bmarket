<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
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
    public function homepage()
    {
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
                "product_price" =>'Rp'. number_format((float)$value->product_price, 0, ',', '.'),
                "product_item" => $value->product_item,
                "wishlist_status" => $value->wishlist_status,
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $value->image[0]->img_file,
                "min_order" => $value->minimum_order,
                

            ];
        }

        // **NEW PRODUCT**
        $productlist = MstProduct::with('stock', 'image','category')
            ->orderBy('created_at', 'DESC')
            ->get();

        $productlisting = [];
        foreach ($productlist as $key => $value) {
            $productlisting[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" =>'Rp'. number_format((float)$value->product_price, 0, ',', '.'),
                "product_item" => $value->product_item,
                "wishlist_status" => $value->wishlist_status,
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
        $productmaxpay = MstProduct::with('stock', 'image','category')
            ->orderBy('pay_counting', 'DESC')
            ->get();

        $product_max_pay = [];
        foreach ($productmaxpay as $key => $value) {
            $product_max_pay[] = [
                "id" => $value->id,
                "product_name" => $value->product_name,
                "product_descriptions" => $value->product_descriptions,
                "product_size" => $value->product_size,
                "product_price" =>'Rp'. number_format((float)$value->product_price, 0, ',', '.'),
                "product_item" => $value->product_item,
                "wishlist_status" => $value->wishlist_status,
                "company_id" => $value->company_id,
                "created_at" => $value->created_at,
                "stock" => $value->stock->qty,
                "image" => $value->image[0]->img_file,
                "product_category" => $value->category->name,
                "pay_counting" => pay_counting($value->pay_counting),
                "min_order" => $value->minimum_order,


            ];
        }

        return view('welcome',['productrandom' => $productrandom,'productlisting'=>$productlisting,'product_max_pay'=>$product_max_pay]);
        // return view('frontEnd.home.homeweb', ['productrandom' => $productrandom,'productlisting'=>$productlisting,'product_max_pay'=>$product_max_pay]);
    }
}
