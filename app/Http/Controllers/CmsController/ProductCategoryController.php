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
use App\Models\ProdCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    
    public function __construct()
    {
        function gencompany($id){
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
        $category = ProdCategory::all();
        foreach ($category as $key => $value) {
            $categorylist[]=[
                'id'=>$value->id,
                'name'=>$value->name,
                'company_name'=>gencompany($value->company_id),
                'created_at'=>$value->created_at,
            ];
        }
        return view('productcategory.productcategorylist', ['categorylist' => $categorylist]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productcategory.addcategory');

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
        $productcategory = new ProdCategory;
        $productcategory->name = $request->category_name;
        $productcategory->company_id = $profile->company_id;
        $productcategory->save();

        return redirect()->route('productcategories.index');


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

    public function showview(Request $request)
    {
        //
        return view('productcategory.listajax');
    }

    public function sendtoajax()
    {
        //
        $category = ProdCategory::all();
        foreach ($category as $key => $value) {
            $categorylist[]=[
                'id'=>$value->id,
                'name'=>$value->name,
                'company_name'=>gencompany($value->company_id),
                'created_at'=>$value->created_at,
            ];
        }
        return $categorylist;


    }
}
