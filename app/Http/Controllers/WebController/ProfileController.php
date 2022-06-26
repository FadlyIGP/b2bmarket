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
use App\Models\MstTransaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserSetupRequest;
use App\Http\Requests\StoreAddressRequest;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use File;



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
        // return $profile[0]->id;
        // return $profile;

        // $address_list=Address::find($profile->address_id);
        $address_list=Address::where('user_id', $profile->id)
        ->where('primary_address',1)
        ->get();
        // return $address_list;

        $company_list=MstCompany::find($profile->company_id);
        $transaction_finished = MstTransaction::where('status',3);
        $count_finished = $transaction_finished->count();

        $transaction_failed = MstTransaction::where('status', 99);
        $count_failed = $transaction_failed->count();

        $address_all=Address::where('user_id', $profile->id)->get();
        // return $address_all; 

        return view('frontEnd.profiles.profiles',['profile' => $profile, 'company_list'=>$company_list,'address_list'=>$address_list,'count_finished' => $count_finished, 'count_failed'=> $count_failed, 'address_all'=>$address_all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
       $profile = UserMitra::where('email',Auth::user()->email)->first();
       $address= new Address;
       $address->name = $request->name;
       $address->user_id = $profile->id;
       $address->company_id = $profile->id;
       $address->contact = $request->contact;
       $address->provinsi = $request->provinsi;
       $address->kabupaten = $request->kabupaten;
       $address->kecamatan = $request->kecamatan;
       $address->kelurahan = $request->kelurahan;
       $address->complete_address = $request->complete_address;
       $address->patokan = $request->patokan;
       $address->postcode = $request->postcode;
       $address->primary_address = 0;
       $address->save();
       return redirect()->route('profiles.index')->with('success', 'Successfully Add Data Address.');
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

    }

    public function updateAddress(Request $request)
    {
        // return $request->all();
       date_default_timezone_set('Asia/Jakarta'); 
       $MstAddress = Address::find($request->id_address);
       $MstAddress->name               = $request->name;
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
       if ($MstAddress) {
            Alert::success('Success', 'Successfully Update Data.');
            return back();
        }
        else {
            Alert::error('Failed', 'Failed');
            return back();
        }

       return redirect()->route('profiles.index')->with('success', 'Successfully Update Data.');

    }

    public function changePassword(Request $request)
    {

       $validator = Validator::make($request->all(), [
         'password' => 'required|confirmed|min:6',
     ]);

       if ($validator->fails()) {
        $out = [
            "message" => $validator->messages()->all(),
        ];
        Alert::error('Failed', $out['message'][0]);
        return back();
    }

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

        $mitra = UserMitra::find($usermitra->id);
        if ($request->hasfile('user_foto')) {
          $request->validate([
            'user_foto' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
          ]);

          //delete foto
          File::delete(public_path().'/files/'.$mitra->user_foto);

          //add foto
          $imageName = $request->user_foto->getClientOriginalName();
          $request->user_foto->move(public_path('files'),$imageName);

          //modif foto
          $mitra->user_foto = $imageName;
          $mitra->save();
        }

        $user = User::where('email', Auth::user()->email)->first();
        $user->name = $request->name;
        $user->save();

        if ($user) {
            Alert::success('Success', 'Successfully Update Data.');
            return back();
        }
        else {
            Alert::error('Failed', 'Failed');
            return back();
        }

        return redirect()->route('profiles.index')->with('success', 'Successfully Update Data.');
    }

    public function updatePrimary(Request $request){
        // return $request->all();
       $profile=UserMitra::where('email', Auth::user()->email)->first();
       $address_all=Address::where('user_id', $profile->id)
       ->where('primary_address', 1)
       ->update(['primary_address'=>0]);

        //update menjadi 1
       $MstAddress = Address::find($request->address_id);
       $MstAddress->primary_address = 1;
       $MstAddress->save();
       if ($MstAddress) {
            Alert::success('Success', 'Successfully Update Data.');
            return back();
        }
        else {
            Alert::error('Failed', 'Failed');
            return back();
        }
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
