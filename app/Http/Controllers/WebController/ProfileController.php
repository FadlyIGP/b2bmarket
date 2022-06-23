<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use App\Models\User;
use App\Models\ImgProduct;
use App\Models\MstCompany;
use App\Models\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=UserMitra::where('email', Auth::user()->email)->first();

        $company=MstCompany::find($profile->company_id);

        $address=Address::where('user_id', $profile->id)->get();
        // return $address;


        // Address
        // return $address;
        return view('frontEnd.profiles.profiles',['profile' => $profile, 'company'=>$company,'address'=>$address]);
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
        // return Auth::user();
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        
        $cariprofile = UserMitra::find($id);
        $cariprofile->name = $request->name;
        $cariprofile->email= $request->email;
        $cariprofile->save();        

        $getuser = User::find(Auth::user()->id);
        $update = $getuser->update($request->all());

        return redirect()->route('profiles')->with('success', 'Successfully Update Data.');
    }

    public function updateAddress(Request $request, $id)
    {
        $address=Address::where('user_id', $profile->id)->get();

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
