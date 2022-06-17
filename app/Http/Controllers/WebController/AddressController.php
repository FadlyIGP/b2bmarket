<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstProduct;
use App\Models\Cart;
use App\Models\UserMitra;
use App\Models\ImgProduct;
use App\Models\MstCompany;
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
        //
        // try {
           // $client = new \GuzzleHttp\Client();
           // $url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi';
           // $request = $client->get($url);
           // $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/provinsi', ['debug' => true]);

            $client = new \GuzzleHttp\Client();
            $responseprovinsi = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/provinsi', [
                    'headers' => [
                        'Accept' => 'application/json'
                    ]
            ]);
            //provinsidetail https://dev.farizdotid.com/api/daerahindonesia/provinsi/32
           $dataprovinsi = json_decode($responseprovinsi->getBody(), true);
           $provinsi= $dataprovinsi;


            $responseprovinsi = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/provinsi', [
                    'headers' => [
                        'Accept' => 'application/json'
                    ]
            ]);
            //provinsidetail https://dev.farizdotid.com/api/daerahindonesia/provinsi/32
            $dataprovinsi = json_decode($responseprovinsi->getBody(), true);
            $provinsi= $dataprovinsi;

           // return $provinsi;

        //    $responsedata = [
        //     'message' =>"Status"." ".$data['status']
        // ];

         
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
