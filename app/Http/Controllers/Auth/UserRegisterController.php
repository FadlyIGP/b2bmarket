<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMitra;
// use App\Models\Address;
use App\Models\MstCompany;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use RealRashid\SweetAlert\Facades\Alert;


class UserRegisterController extends Controller
{
    public function registered(Request $request)
    {
        //
        // return $request->all();
        // $profile = UserMitra::all();
        // $getprodiuctdata = MstProduct::where('id', $request->product_id)->first();
        // return $getprodiuctdata;
        // $cart = new Address;
        // $cart->name = $request->name;
        // $cart->user_id = $profile->id;
        // $cart->company_id = $profile->company_id;
        // $cart->contact = $request->contact;
        // $cart->provinsi =$request->provinsi;
        // $cart->kabupaten = $request->kabupaten;
        // $cart->kecamatan = $request->kecamatan;
        // $cart->kelurahan = $request->kelurahan;
        // $cart->complete_address = $request->komplit;
        // $cart->patokan = $request->patokan;
        // $cart->postcode = $request->kodepost;
        // $cart->primary_address = $request->prmary;
        // $cart->save();
        // return $request->all(); 
        $company = new MstCompany;
        $company->company_name = $request->company;
        $company->company_logo = '';
        $company->company_code = '';
        $company->save();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();

        $usermitra = new UserMitra;
        $usermitra->name = $request->name;
        $usermitra->email = $request->email;
        $usermitra->phone = $request->phone;
        $usermitra->tel_number = $request->phone;
        $usermitra->status = 1;
        $usermitra->company_id = $company->id;
        $usermitra->address_id = 0;

        $usermitra->save();

        // $message='Berhasil menambahkan alamat';

        if ($user) {
            Alert::success('Success', 'Anda berhasil registrasi');
            return back();
        }
        else {
            Alert::error('Failed', 'Registrasi gagal');
            return back();
        }

        return redirect()->route('/logout')->with('success', 'Successfully Add Data Address.');
    }
}
