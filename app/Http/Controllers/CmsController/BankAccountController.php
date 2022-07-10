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
use App\Models\MstRekening;
use App\Models\BankCode;
use Exception;
use Carbon\Carbon;
use File;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $account_list = MstRekening::where('company_id', $profile->company_id)->get();

        $bankcode_list = BankCode::where('company_id', $profile->company_id)->get();        

        return view('bankaccount.bankaccount', ['account_list' => $account_list, 'bankcode_list' => $bankcode_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $bankcode_list = BankCode::where('company_id', $profile->company_id)->get();

        return view('bankaccount.createbankaccount', ['bankcode_list' => $bankcode_list]);
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

        date_default_timezone_set('Asia/Jakarta');

        $MstRekening = new MstRekening;
        $MstRekening->company_id = $profile->company_id;
        $MstRekening->bank_code  = $request->bankcode;
        $MstRekening->rek_number = $request->accountno;
        $MstRekening->save();

        return redirect()->route('bankaccount.index')->with('success', 'Successfully Add Bank Account.');
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
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        $account_list  = MstRekening::find($id);
        $bankcode_list = BankCode::where('company_id', $profile->company_id)->get();

        return view('bankaccount.modifybankaccount', ['account_list' => $account_list, 'bankcode_list' => $bankcode_list]);
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
        $account_list = MstRekening::find($id);
        $account_list->bank_code    = $request->bankcode;
        $account_list->rek_number   = $request->accountno;
        $account_list->save();

        return redirect()->route('bankaccount.index')->with('success', 'Successfully Update Bank Account.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account_list = MstRekening::find($id);
        $account_list->delete();

        return redirect()->route('bankaccount.index')->with('success', 'Successfully Delete Bank Account.');   
    }


    /******************** For New Public Function At Here ********************/
    public function bankCodeCreate()
    {
        return view('bankaccount.createbankcode');
    }

    public function bankCodeStore(Request $request)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();

        date_default_timezone_set('Asia/Jakarta');

        $request->validate([
            'banklogo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]); 

        // $profile = UserMitra::where('email', Auth::user()->email)->first();

        $imageName = time().'_'.$request->banklogo->getClientOriginalName();  

        $request->banklogo->move(public_path('files/bank_logo'), $imageName);

        $BankCode = New BankCode;        
        $BankCode->bank_code    = $request->bankcode;
        $BankCode->bank_image   = $imageName;
        $BankCode->company_id   = $profile->company_id;
        $BankCode->save();

        return redirect()->route('bankaccount.index')->with('success', 'Successfully Add Bank Code.');
    }

    public function bankCodeModify($id)
    {
        $profile = UserMitra::where('email', Auth::user()->email)->first();
        $bankcode_list = BankCode::find($id);
        return view('bankaccount.modifybankcode', ['bankcode_list' => $bankcode_list]);
    }

    public function bankCodeUpdate(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $request->validate([
            'banklogo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $BankCode = BankCode::where('id', $request->idbankcode)->first();
        
        /*Delete Image*/
        File::delete(public_path().'/files/bank_logo/'. $BankCode->bank_image);

        /*Add New Image*/
        $imageName = time().'_'.$request->banklogo->getClientOriginalName();  
        $request->banklogo->move(public_path('files/bank_logo'), $imageName);

        /*Modify Bank Code*/
        $BankCode->bank_code    = $request->bankcode;
        $BankCode->bank_image   = $imageName;
        $BankCode->save();

        return redirect()->route('bankaccount.index')->with('success', 'Successfully Update Bank Code.');
    }

    public function bankCodeDelete($id)
    {
        $BankCode = BankCode::find($id);

        /*Delete Image*/
        File::delete(public_path().'/files/bank_logo/'. $BankCode->bank_image);

        /*Delete Data*/
        $BankCode->delete();

        return redirect()->route('bankaccount.index')->with('success', 'Successfully Delete Bank Code.');
    }
}
