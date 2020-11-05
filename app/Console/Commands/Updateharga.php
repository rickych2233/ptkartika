<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Updateharga extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:harga';

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
     * @return mixed
     */
    public function handle()
    {
        $now = date('Y-m-d');
        $temp = DB::table('historyharga')->where('tanggalberlaku','=',$now)->get();
        foreach($temp as $key)
        {
            DB::table('barang')->where('kodebarang','=',$key->kodebarang)->update(['harga'=>$key->hargajual]);
        }
        echo count($temp);
    }
}
