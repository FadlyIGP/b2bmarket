<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\User;
use App\Models\MstCompany;
use App\Models\MstTransaction;
use App\Models\TransactionItem;
use App\Models\UserMitra;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('command:AutoCancelOrder')->everyMinute();

        $schedule->call(function () {
            
            date_default_timezone_set('Asia/Jakarta');
            
            /* Automatic Cancel If H+1 From Order Date, Buyer No Payment */
            $neworder_list = MstTransaction::where('mst_transaction.status', 0)
                ->leftjoin('payment', 'payment.transaction_id', '=', 'mst_transaction.id')
                ->get(['mst_transaction.id', 'payment.transaction_id as id_pay', 
                    'mst_transaction.created_at', 'payment.status as pay_status']);

            $curr_date = Carbon::now();            

            foreach ($neworder_list as $key => $value) {
                $day_cancel = Carbon::create($value->created_at)->addDays(1);
                $auto_cancel_date = substr($day_cancel, 0, 10).' '.substr($day_cancel, 11, 8);                

                if ($auto_cancel_date < $curr_date AND /*$value->id_pay == null*/ $value->pay_status == 0) {
                    $mstTransaction = MstTransaction::find($value->id);
                    $mstTransaction->status = 99;
                    $mstTransaction->cancel_reason = '**No Payment After Day +1 Confirm Order**';
                    $mstTransaction->save();

                    $payment = Payment::where('transaction_id', $value->id)->first();
                    $payment->status = 99;
                    $payment->save();
                }
            }
            /*End*/           

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
