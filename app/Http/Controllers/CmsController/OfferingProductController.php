<?php

namespace App\Http\Controllers\CmsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OfferingProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $email='fadlya17@gmail.com';
         $to = [];
         $cc = [];
         array_push($to, $email);
       
         // $tgl=$data['tanggal'];
         $noantri='Offering Product';
         // $nama=$data['nama'];
         // $tgl_antri=$tglbesok;
         // $jam=$jam_panggil;

         \Mail::send('mail.mailsubmit', compact('noantri'), function ($m) use ($to,$cc,$noantri) {
             $m->to($to)->cc($cc)->subject($noantri);
         });   

         return 'success';

         // \Mail::to('emailpenerima@gmail.com')->send(new \App\Mail\MyTestMail($details));

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
