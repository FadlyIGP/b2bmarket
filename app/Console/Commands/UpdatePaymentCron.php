<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\MstTransaction;
use App\Models\TransactionHistory;

date_default_timezone_set('Asia/Jakarta');



class UpdatePaymentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatepayment:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            $date=Carbon::now()->format('Y-m-d H:i:s');
            $expired = Carbon::now()->addHours(2)->format('Y-m-d H:i:s');

            $get = Payment::where('expiration_date','<=',$date)->where('status', 0)->first();
            if ($get) {
                $gettrbyid=MstTransaction::find($get->transaction_id);
                if ($gettrbyid) {
                    $trasactionitem = new TransactionHistory();  
                    $trasactionitem->transaction_id = $gettrbyid->id;
                    $trasactionitem->status = 99;
                    $trasactionitem->transaction_date = $date;
                    $trasactionitem->save();

                    $gettrbyid->status=99;
                    $gettrbyid->save();

                    $get->status=99;
                    $get->save();

                } 

                \Log::info("Cron is working fine!");

            } else {

                \Log::info("Cron is working nothing!");
            }

        }catch (\Exception $e){
                
                \Log::info("Cron is working failed!");

        }
    }
}
