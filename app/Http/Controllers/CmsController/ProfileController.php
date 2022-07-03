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
use App\Models\Address;
use App\Models\MstTransaction;
use App\Models\TransactionItem;

use Exception;
use Carbon\Carbon;
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
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $address_list = Address::where('user_id',$profile->id)->where('primary_address', 1)->first();
        // return $address_list;
        $company_list = MstCompany::find($profile->company_id);

        $transaction_finished = MstTransaction::where('status', 3);
        $count_finished = $transaction_finished->count();

        $transaction_failed = MstTransaction::where('status', 99);
        $count_failed = $transaction_failed->count();

        return view('sellerprofile', ['company_list' => $company_list, 'address_list' => $address_list, 'count_finished' => $count_finished, 'count_failed' => $count_failed, 'profile' => $profile]);
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

    /******************** For New Public Function At Here ********************/
    public function updateAddress(Request $request)
    {
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

        return redirect()->route('getprofile.index')->with('success', 'Successfully Update Address.');
    }

    public function updateUser(Request $request)
    {        
        date_default_timezone_set('Asia/Jakarta'); 
        
        $usermitra = UserMitra::where('email', Auth::user()->email)->first();
        $usermitra->name        = $request->uname;
        $usermitra->phone       = $request->phone;
        $usermitra->tel_number  = $request->telephone;        
        $usermitra->save();

        $company = MstCompany::find($usermitra->company_id);

        if ($request->hasfile('comp_logo')) {
            $request->validate([
                'image_name' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            /*Delete Logo*/
            File::delete(public_path().'/files/'. $company->company_logo);

            /*Add New Logo*/
            $imageName = $request->comp_logo->getClientOriginalName();  
            $request->comp_logo->move(public_path('files'), $imageName);

            /*Modify Image Name*/
            $company->company_logo   = $imageName;  
            $company->save();
        }

        return redirect()->route('getprofile.index')->with('success', 'Successfully Update User.');
    }
     public function changePassword(Request $request){
         
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->new_pass);
        $user->save();

        return redirect()->route('getprofile.index')->with('success', 'Successfully Change Password.');
     }
}
