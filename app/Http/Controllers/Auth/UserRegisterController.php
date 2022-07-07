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
use Validator;
use Illuminate\Support\Facades\Hash;


class UserRegisterController extends Controller
{
    public function registered(Request $request)
    {

        try{
            $validator = Validator::make($request->all(), [
                 'name' => 'required',
                 'phone' => 'required|unique:user_mitra',
                 'email' => 'required|unique:users',
                 'role_id' => 'required',
                 'password' => 'required|min:6',
                 'company' => 'required',
            ]);

            if ($validator->fails())
               {
                $out = [
                    "message" => $validator->messages()->all(),
                ];
                Alert::error('Failed', $out['message'][0]);
                return back();
            }

            $company = new MstCompany;
            $company->company_name = $request->company;
            $company->company_logo = '';
            $company->company_code = '';
            $company->save();

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->save();

            $usermitra = new UserMitra;
            $usermitra->name = $request->name;
            $usermitra->email = $request->email;
            $usermitra->phone = $request->phone;
            $usermitra->tel_number = $request->phone;
            $usermitra->status = 1;
            $usermitra->company_id = $company->id;
            $usermitra->save();

            if ($user) {
                Alert::success('Success', 'Anda berhasil registrasi');
                return redirect()->route('login');
            }
            else {
                Alert::error('Failed', 'Registrasi gagal');
                return back();
            }

        }catch (\Exception $e){
                
                $response  = [
                    "status"  => false,
                    "message" => $e->getMessage(),
                ];

            Alert::error('Failed', $response['message']);
            return back();

        }
    }

    public function forgotpassword(Request $request)
    {        
        $user = User::where('email', $request->emailfp)->first();
        
        if ($user) {            
            $user->password = Hash::make($request->newpassfp);
            $user->save();

            Alert::success('Success', 'Password berhasil diubah.');
            return redirect()->route('login');
        }else {            
            Alert::error('Failed', 'Email tidak ditemukan!');
            return back();
        }
    }
}
