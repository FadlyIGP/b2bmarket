<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMitra;
use App\Models\Address;
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
        return $request->all();
        $profile = UserMitra::all();
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
        $message='Berhasil menambahkan alamat';

        if ($trasactionitem) {
            Alert::success('Success', 'Anda berhasil registrasi');
            return back();
        }
        else {
            Alert::error('Failed', 'Registrasi gagal');
            return back();
        }

    }
}
