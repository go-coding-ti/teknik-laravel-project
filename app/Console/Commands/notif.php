<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Dosen;
use App\TmtKepangkatanFungsional;
use App\Notification;
use Carbon\Carbon;

class notif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:notif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserting Data';

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
    public function handle(){
        date_default_timezone_set("Asia/Makassar");
            $tmt = Carbon::now()->subYears(2);
            $datebatas = Carbon::parse($tmt)->format('Y-m-d');
            $curdate = Carbon::now();
            $convert = Carbon::parse($curdate)->format('Y-m-d');
            $tmtdos = TmtKepangkatanFungsional::where('tmt_pangkat/golongan', $datebatas)
                    ->join('tb_dosen','tb_dosen.nip','=','tmt_kepangkatan_fungsional.nip')
                    ->select('tb_dosen.chat_id','tb_dosen.nip','tmt_kepangkatan_fungsional.id_tmt_kepangkatan_fungsional')
                    ->get();
            if(isset($tmtdos)){
                foreach ($tmtdos as $tmtd){
                    $cek = Notification::where('id_kepangkatan', $tmtd['id_tmt_kepangkatan_fungsional'])
                    ->select('nip_dosen')
                    ->first();
                    if($cek==NULL){
                        $not = new Notification();
                        $not->nip_dosen = $tmtd['nip'];
                        $not->id_kepangkatan = $tmtd['id_tmt_kepangkatan_fungsional'];
                        $not->chat_id = $tmtd['chat_id'];
                        $not->cek_hari = $convert;
                        $not->save();
                        $this->info("Masuk");
                    }else{
                        $this->info("Tidak Masuk");
                    }
                }
            }
    }
}
