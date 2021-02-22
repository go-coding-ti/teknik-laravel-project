<?php

namespace App\Console;

use App\Dosen;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function (){
            date_default_timezone_set("Asia/Makassar");
            $tmt = Carbon::now()->subYears(2);
            $datebatas = Carbon::parse($tmt)->format('Y-m-d');
            $dosen = Dosen::where('tmt_keaktifan', '>', $datebatas)->get();
            if(!is_null($dosen)){
                foreach($dosen as $item){
                    $url = 'https://api.telegram.org/bot1612136099:AAHceVlIADjGbVvdbiO498tMUb4ezFVKqpU/sendMessage?text=%22stfu%22&chat_id=643313177';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $response = curl_exec ($ch);
                    $err = curl_error($ch); 
                    curl_close ($ch);
                    return $response;
                }
            }
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
