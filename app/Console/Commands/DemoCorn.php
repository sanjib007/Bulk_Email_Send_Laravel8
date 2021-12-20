<?php

namespace App\Console\Commands;

use App\Models\SendEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DemoCorn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
        $mailInfo = SendEmail::where('confirmedSend', 0)->limit(2)->get();

        foreach ($mailInfo as $aMail){
            $details = [
                'templete'=> $aMail->templete,
                'mailSubject'=> $aMail->mailSubject,
                'fromMail'=> $aMail->fromMail,
                'fromName'=> $aMail->fromName,
                'clientName'=> $aMail->clientName,
            ];

            Mail::to($aMail->clientEmail)->send(new \App\Mail\ClientMail($details));
            $aMail->confirmedSend = true;
            $aMail->update();
        }
        Log::info('Corn send email.');
    }
}
