<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function index(){

        $details = [
            'title' => 'Offering Product',
            'body' => 'Kuy Order diskon 99%'
        ];
   
        \Mail::to('fadlya179@gmail.com')->send(new MyTestMail($details));
       
        // return ';
        return 'Email sudah terkirim';

    }
}
