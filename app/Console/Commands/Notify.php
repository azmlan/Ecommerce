<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\NotifyEmail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifieng Studints fot new lectures ';

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
        // $users= User::select('email')->get(); // collection of code 
        $emails = User::pluck('email')->toArray();
        $data=['title'=>'New Laravel Lecture', 'body'=>'Almost finishing the laravel course'];
        foreach($emails as $email)
        {
            Mail::To($email)->send(new NotifyEmail($data));
        }
    }
}
