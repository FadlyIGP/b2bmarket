<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use App\Models\ImgProduct;
use App\Models\MstCompany;
use App\Models\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontEnd.address.addressform');
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
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        // $getprodiuctdata = MstProduct::where('id', $request->product_id)->first();
        // return $getprodiuctdata;
        $cart = new Address;
        $cart->name = $request->name;
        $cart->user_id = $profile->id;
        $cart->company_id = $profile->company_id;
        $cart->contact = $request->contact;
        $cart->provinsi =$request->provinsi;
        $cart->kabupaten = $request->kabupaten;
        $cart->kecamatan = $request->kecamatan;
        $cart->kelurahan = $request->kelurahan;
        $cart->complete_address = $request->komplit;
        $cart->patokan = $request->patokan;
        $cart->postcode = $request->kodepost;
        $cart->primary_address = $request->prmary;
        $cart->save();
        $message='Succes add new address';

        return \Redirect::back()->withErrors(['message' => $message]);
      
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
