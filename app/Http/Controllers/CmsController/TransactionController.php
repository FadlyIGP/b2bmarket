<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\MstCompany;
use App\Models\MstTransaction;
use App\Models\TransactionItem;
use App\Models\UserMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = MstTransaction::join('mst_company', 'mst_company.id', '=', 'mst_transaction.company_id')
            ->join('users', 'users.id', '=', 'mst_transaction.user_id')
            ->get(['mst_transaction.id', 'mst_transaction.invoice_number', 'users.name', 'mst_company.company_name',
                'mst_transaction.status', 'mst_transaction.expected_ammount', 'mst_transaction.created_at']);       

          
        $transactionlist = [];
        foreach ($transaction as $key => $value) {

            if ($value->status == 0) {
                $status = 'New Order';
            }else if ($value->status == 1) {
                $status = 'Processing';
            }else if ($value->status == 2) {
                $status = 'Delivering';
            }else if ($value->status == 3) {
                $status = 'Done';
            }

            $transactionlist[] = [
                "id"        => $value->id,
                "invoice"   => $value->invoice_number,
                "username"  => $value->name,
                "company"   => $value->company_name,
                "status"    => $status,                
                "amount"    => 'Rp '.''.$value->expected_ammount,               
                "created"   => $value->created_at                
            ];
        }

        return view('transaction.transaction', ['transactionlist' => $transactionlist]);        
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
