<?php

namespace App\Console\Commands;

use App\doctor;
use App\patient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteRow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mails to Doctors';

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
        //DB::table('recent_users')->delete();
        $query = patient::select('opd')->distinct()->where('date', Date('Y-m-d',strtotime("tomorrow")))->get();
        foreach ($query as $item) {
            $allMails = doctor::select('email')->where('Department', $item->opd)->get();
            foreach ($allMails as $oneMail) {
                if ($oneMail->email != "") {
                    $sameOpdPatient =  patient::where('opd', $item->opd)->where('date', Date('Y-m-d',strtotime("tomorrow")))->get();
                    echo $oneMail->email . "\n" . $sameOpdPatient;
                    $details = [
                        'title' => 'Online OPD booking List of Patients on '.Date('d-m-Y',strtotime("tomorrow")). ' as follow',
                        'body' => $sameOpdPatient,
                    ];
                    Mail::to($oneMail->email)->send(new \App\Mail\TestMail($details));
                    //Mail::to('gpalve@gmail.com')->send(new \App\Mail\TestMail($details));
                }
            }
        }
        /*  */
    }
}
