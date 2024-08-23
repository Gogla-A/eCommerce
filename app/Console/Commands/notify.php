<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;

class notify extends Command
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
    protected $description = 'Send Email Notify For Studends Every Day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       // $user = User::select('email')->get();
        $email = User::pluck('email')->toArray();
        $data = ['title'=>'programming', 'body'=>'php'];
        foreach ($email as $email) {
            Mail::To($email)->send(new NotifyEmail($data));
        }
    }
}
