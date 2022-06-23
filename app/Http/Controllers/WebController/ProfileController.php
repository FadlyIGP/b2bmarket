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
use Illuminate\Support\Facades\Hash;
use App\Http\Request\UpdateAddressRequest;
use App\Http\Request\UpdatePasswordRequest;
use App\Http\Request\UpdateUserSetupRequest;

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

        $address_list=Address::find($profile->address_id);
        $company_list=MstCompany::find($profile->company_id);

        // $address=Address::where('user_id', $profile->id)->get();
        // return $address_list;

        return view('frontEnd.profiles.profiles',['profile' => $profile, 'company_list'=>$company_list,'address_list'=>$address_list]);
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
        // $profile = UserMitra::where('email', Auth::user()->email)->first();

        // $cariprofile = UserMitra::find($id);
        // $cariprofile->name = $request->name;
        // $cariprofile->email= $request->email;
        // $cariprofile->save();        

        // $getuser = User::find(Auth::user()->id);
        // $update = $getuser->update($request->all());

        // return redirect()->route('profiles')->with('success', 'Successfully Update Data.');

    }

    public function updateAddress(UpdateAddressRequest $request)
    {
        // $address=Address::where('user_id', $profile->id)->get();
       date_default_timezone_set('Asia/Jakarta'); 
       $MstAddress = Address::find($request->id_address);
       $MstAddress->contact            = $request->comp_contact;
       $MstAddress->provinsi           = $request->prov;
       $MstAddress->kabupaten          = $request->city;
       $MstAddress->kecamatan          = $request->district;
       $MstAddress->kelurahan          = $request->neighborhoods;
       $MstAddress->complete_address   = $request->compaddr;
       $MstAddress->postcode           = $request->postcode;
       $MstAddress->patokan            = $request->remark;
       $MstAddress->primary_address    = 1;
       $MstAddress->save();

       return redirect()->route('profiles.index')->with('success', 'Successfully Update Data.');

   }

   public function changePassword(UpdatePasswordRequest $request)
   {
    $user = User::where('email',$request->email)->first();
    $user->password = Hash::make($request->new_pass);
    $user->save();

    return redirect()->route('profiles.index')->with('success', 'Successfully Update Data.');
}

public function changeUser(Request $request)
{

    date_default_timezone_set('Asia/Jakarta'); 

    $usermitra = UserMitra::where('email', Auth::user()->email)->first();
    $usermitra->name = $request->name;
    $usermitra->phone = $request->phone;
    $usermitra->tel_number = $request->tel_number;
    $usermitra->save();

    $user = User::where('email', Auth::user()->email)->first();
    $user->name = $request->name;
    $user->save();


    return redirect()->route('profiles.index')->with('success', 'Successfully Update Data.');
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
