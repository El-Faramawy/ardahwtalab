<?php

namespace App\Console\Commands;

use App\Models\Advs;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Carbon\Carbon ;
class Inspire  extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // App\Jobs::create([
        //     'name' => "obaida" ,
        //     'email' => "obaida@obaida.com" ,
        //     'mobile' => "123457890" ,
        //     'file' => "asdasd" ,
        //     'notes' => "asdadsa" ,
        //     ]);

        $advs = Advs::where('active' , 1)->where('end_date' , "<=" , Carbon::now())->get()->each(function($data){
            // dd($data);
            $data->update([
                'active' => 0]);
        });
        // foreach($advs as $adv){

        // }

        $this->info('command successfully');
    }

}
